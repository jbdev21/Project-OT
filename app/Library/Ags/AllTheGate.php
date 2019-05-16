<?php 
namespace App\Library\Ags;

use Illuminate\Http\Request;

class AllTheGate {


    protected $serverAddress = "121.133.126.1"; 
	protected $port = "29760"; 
	protected $enctype = 0; 
	protected $connection_timeout = 10; 
    protected $read_timeout = 30; 
    protected $fp;



    function connect()
    {
       $this->fp = fsockopen( $this->serverAddress, $this->port , $errno, $errstr, $this->connection_timeout );
       
       if($this->fp)
       {
           return $this->fp;

       }else{

           return false;
       
        }

    }


    function sendMessage()
    {

        fputs( $this->fp, $this->setMessage() );
		socket_set_timeout($this->fp, $this->read_timeout);
        
    }

    function setMessage(Request $request)
    {
        
        
    }

    function disConnection()
    {
        if($this->fb)
        {
            fclose( $this->fp );
        }
    }





        
}

