<?php 
namespace App\Library\Ags;

class PayLog 
{

	var $log_fd;
	var $log;
	var $logLevel;
	var	$array_key;
	var $debug_msg;
	var $starttime;
	var $homedir;
	var $StoreId;

	
	function __constructor( $request )
	{
		return $logfile = storage_path('framework') . "/log/AgsPay40php_".$this->StoreId."_".date("ymd").".log";
		$this->debug_msg = array( "", "FATAL", "ERROR", "WARN", "INFO", "DEBUG"  );
		$this->log = true;
		$this->logLevel = $request["logLevel"];
		$this->homedir = $request["AgsPayHome"];
		$this->StoreId = $request["StoreId"];
		$this->starttime=GetTime();
	}

	function InitLog() 
	{

		if( $this->log == "false" ) return true;

		//$logfile = $this->homedir. "/log/AgsPay40"_".TYPE."_".$this->StoreId."_".date("ymd").".log";
		$logfile = storage_path('framework') . "/log/AgsPay40php_".$this->StoreId."_".date("ymd").".log";
		
		$this->log_fd = fopen( $logfile, "a+" );
		if( !$this->log_fd ) return false;
		$this->WriteLog( INFO, "===============================================================" );
		$this->WriteLog( INFO, "START ".PROGRAM." ".TYPE." (OS:".php_uname('s').php_uname('r').",PHP:".phpversion().")" );

		return true;
	}
	function WriteLog($debug, $data) 
	{
		if( $this->log == "false" || !$this->log_fd ) return;

		if(strtoupper($this->logLevel) == "FATAL") $logLevel_int = 1;
		if(strtoupper($this->logLevel) == "ERROR") $logLevel_int = 2;
		if(strtoupper($this->logLevel) == "WARN") $logLevel_int = 3;
		if(strtoupper($this->logLevel) == "INFO") $logLevel_int = 4;
		if(strtoupper($this->logLevel) == "DEBUG") $logLevel_int = 5;
		
		if( $debug > $logLevel_int ){	return;    	}

		$prefix = $this->debug_msg[$debug]."\t[" . SetTimeStamp() . "] <" . getmypid() . "> ";
		if( is_array( $data ) )
		{
			foreach ($data as $key => $val)
			{
				fwrite( $this->log_fd, $prefix . $key . ":" . $val . "\r\n");
			}
		}
		else
		{
		   fwrite( $this->log_fd, $prefix . $data . "\r\n" );
		}
		fflush( $this->log_fd );
	}
	function CloseLog($msg)
	{

		if( $this->log == "false" ) return;

		$Transaction_time=GetTime()-$this->starttime;
		$this->WriteLog( INFO, "END ".Request::get("Type")." ".$msg." Transaction time:[".round($Transaction_time,3)."sec]" );
		$this->WriteLog( INFO, "===============================================================" );
		fclose( $this->log_fd );

	}

	function GetTime()
	{
		 return time();
	}

	function SetTimeStamp()
	{
	    $microtm = explode(' ',microtime());
	    list($t_Seconds, $Milliseconds) = array($microtm[1], (int)round($microtm[0]*1000,3));
			return date("Y-m-d H:i:s", $t_Seconds) . ":$Milliseconds";
	} 

	}