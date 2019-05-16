<?
namespace App\Library\Ags;

use Illuminate\Http\Request;
/**
 * ���ϸ� : AGSLib.php
 * ������������ : 2016/10/11
 *
 * �ô�����Ʈ ������ ���̺귯�� �����Դϴ�.
 * Copyright NICEPayments.Co.,Ltd. All rights reserved.	
 *
 */

/* GLOBAL */

//define("PROGRAM", "app\Library\Ags");
define('PROGRAM', "AgsPay40");

define("TYPE", "php");

/* LOG LEVEL */
define("FATAL", 1);
define("ERROR", 2);
define("WARN", 3);
define("INFO", 4);
define("DEBUG", 5);


class Ags
{

	/**************************************************************************************
	*
	* [1] �ô�����Ʈ ������ ����� ���� ��ż��� IP/Port ��ȣ
	*
	* $LOCALADDR	: PG������ ����� ����ϴ� ��ȣȭProcess�� ��ġ�� �ִ� IP
	* $LOCALPORT	: ��Ʈ
	* $ENCRYPT		: 0:�Ƚ�Ŭ��,�Ϲݰ��� 2:ISP
	* $CONN_TIMEOUT : ��ȣȭ ����� ���� ConnectŸ�Ӿƿ� �ð�(��)
	* $READ_TIMEOUT : ������ ���� Ÿ�Ӿƿ� �ð�(��)
	* 
	***************************************************************************************/	
	var $LOCALADDR = "121.133.126.1"; 
	var $LOCALPORT = "29760"; 
	var $ENCTYPE = 0; 
	var $CONN_TIMEOUT = 10; 
	var $READ_TIMEOUT = 30; 

	var $ERRMSG; 
	var $log;
	var $fp;

	var $REQUEST = array();
	var $RESULT = array();

	var $sDataMsg;
	var $sSendMsg;
	var $sRecvMsg;
	var $sRecvLen;
	
	var $SendValArray;
	var $RecvValArray;
	var $TID;




	/*
		Aegis ����/��� ó�� 
	*/

	function startPay()

	{
		$this->ERRMSG = "";
		
		/*
			Log ��� ��ü����						
   		*/
		$this->log = new PayLog( $this->REQUEST );
		if(!$this->log->InitLog()) 
		{
			$this->ERRMSG .= "�α������� ������ �����ϴ�.[".$this->REQUEST["AgsPayHome"]."]" ; 
			$this->RESULT["rSuccYn"] = "n";
			$this->RESULT["rResMsg"] = $this->ERRMSG;
			$this->RESULT["rCancelSuccYn"] = "n";
			$this->RESULT["rCancelResMsg"] = $this->ERRMSG;
			return false;
		}
		
		$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." ".$this->REQUEST["Type"]." Start!" );
		
		if($this->REQUEST["Type"] == "Cancel")
		{
			if($this->REQUEST["AuthTy"] == "virtual" )
			{
				$this->log->WriteLog( WARN, "Cannot Cancel AuthTy[".$this->REQUEST["AuthTy"]."]" );
				$this->log->CloseLog( "AuthTy[".$this->REQUEST["AuthTy"]."] End");
				return false;
			}
		}

		/*
			��û�� �αױ��						
   		*/
		$this->writeLogArray($this->REQUEST);


		//��ҿ�û
		if($this->REQUEST["Type"] == "Cancel")
		{
			if( $this->NetCancel() == false )
			{
				/*
					����� �αױ��						
				*/			
				$this->log->WriteLog( ERROR,$this->REQUEST["AuthTy"]." ".$this->REQUEST["Type"]." Result Value [" );
				$this->writeLogArray($this->RESULT);
				$this->log->WriteLog( ERROR, "]" );

				$this->log->WriteLog( ERROR, $this->REQUEST["AuthTy"]." ".$this->REQUEST["Type"]." Fail End" );
				$this->payQuit();
				return false;
			}

			/*
				����� �αױ��						
			*/			
			$this->log->WriteLog( WARN,$this->REQUEST["AuthTy"]." ".$this->REQUEST["Type"]." Result Value [" );
			$this->writeLogArray($this->RESULT);
			$this->log->WriteLog( WARN, "]" );

			$this->log->WriteLog( WARN, $this->REQUEST["AuthTy"]." ".$this->REQUEST["Type"]."  Success End" );
			//log ��ü �ݱ�
			$this->log->CloseLog( $this->GetResult("rCancelResMsg") );
			return true;
		}
		
		if( empty( $this->REQUEST["StoreId"] ) || $this->REQUEST["StoreId"] == "" )
		{
			$this->ERRMSG .= "No Store Id<br>";		//�������̵�
		}

		if( empty( $this->REQUEST["OrdNo"] ) || $this->REQUEST["OrdNo"] == "" )
		{
			$this->ERRMSG .= "NO Order Number <br>";		//�ֹ���ȣ
		}

		if( empty( $this->REQUEST["ProdNm"] ) || $this->REQUEST["ProdNm"] == "" )
		{
			$this->ERRMSG .= "No Product Name <br>";			//��ǰ��
		}

		if( empty( $this->REQUEST["Amt"] ) || $this->REQUEST["Amt"] == "" )
		{
			$this->ERRMSG .= "No Ammount <br>";			//�ݾ�
		}

		if( empty( $this->REQUEST["DeviId"] ) || $this->REQUEST["DeviId"] == "" )
		{
			$this->ERRMSG .= "�ܸ�����̵� �Է¿��� Ȯ�ο�� <br>";	//�ܸ�����̵�
		}

		if( empty( $this->REQUEST["AuthYn"] ) || $this->REQUEST["AuthYn"] == "" )
		{
			$this->ERRMSG .= "�������� �Է¿��� Ȯ�ο�� <br>";		//��������
		}

		if( strlen($this->ERRMSG) == 0 ){
			
			/* Make Tid */
			if( ($MakeTIDResult = $this->MakeNetCancID()) != true){
				$this->log->WriteLog( FATAL, "Make NetCancelID Fail" );
				$this->payQuit();
				return false;
			}else{
				$this->log->WriteLog( INFO, "Make NetCancelID OK" );
			}

			/* Make Pay Msg */
			if( ($MakeMsgResult = $this->MakeMsg()) != true){
				$this->log->WriteLog( FATAL, "Make Pay Msg Fail" );
				$this->ERRMSG = "������û�������� ����.";
				$this->RESULT["rSuccYn"] = "n";
				$this->RESULT["rResMsg"] = $this->ERRMSG;
				$this->payQuit();
				return false;
			}else{
				$this->log->WriteLog( INFO, "Make Pay Msg OK" );
			}



			/* Send & Recv Msg */				
			if( ($ParseResult = $this->SendRecvMsg()) != true){
				$this->log->WriteLog( FATAL, "Send & Recv Msg Fail" );
				$this->ERRMSG = "������û���� �ۼ��� ����.(���������� �� Ȯ�����ּ���)";
				$this->RESULT["rSuccYn"] = "n";
				$this->RESULT["rResMsg"] = $this->ERRMSG;
				$this->REQUEST["CancelMsg"] = "Send & Recv Msg Fail";
				$this->log->WriteLog( WARN, "NetCancel Call" );
				if( $this->NetCancel() == false )	//�����
				{
					$this->log->WriteLog( FATAL, "NetCancel Fail End" );
					$this->payQuit();
					return false;
				}
				$this->log->WriteLog( INFO, "NetCancel Success End" );
				$this->payQuit();
				return false;
			}else{
				$this->log->WriteLog( INFO, "Send & Recv Msg OK" );
			}
			
			/* RecvMsg Parsing */
			if( ($ParseResult = $this->ParseMsg()) != true){
				$this->log->WriteLog( FATAL, "Msg Parsing Fail" );
				$this->ERRMSG = "����������� ó���� ����.(���������� �� Ȯ�����ּ���)";
				$this->RESULT["rSuccYn"] = "n";
				$this->RESULT["rResMsg"] = $this->ERRMSG;
				$this->REQUEST["CancelMsg"] = "Msg Parsing Fail";
				$this->log->WriteLog( WARN, "NetCancel Call" );
				if( $this->NetCancel() == false )	//�����
				{
					$this->log->WriteLog( FATAL, "NetCancel Fail End" );
					$this->payQuit();
					return false;
				}
				$this->log->WriteLog( INFO, "NetCancel Success End" );
				$this->payQuit();
				return false;
			}else{
				$this->log->WriteLog( INFO, "Msg Parsing OK" );
			}

		}
		else
		{
			$this->RESULT["rSuccYn"] = "n";
			$this->RESULT["rResMsg"] = $this->ERRMSG;
		}

		/*
			����� �αױ��						
   		*/
		
		$this->log->WriteLog( INFO,$this->REQUEST["AuthTy"]." ".$this->REQUEST["Type"]." Result Value [" );
		$this->writeLogArray($this->RESULT);
		$this->log->WriteLog( INFO, "]" );

		//log ��ü �ݱ�
		$this->log->CloseLog( $this->GetResult("rResMsg") );

		return true;

	}	//startPay() End


	/*
		���μ��� ����                       
	*/
 	function payQuit() 
	{
		//log ��ü �ݱ�
		$this->log->CloseLog( $this->GetResult("rResMsg") );
		
		/** ���� close **/
		if($this->fp != false ){
			fclose( $this->fp );
		}

	}

	/*
		���μ��� ����                       
	*/
 	function writeLogArray($array)
	{ 
		foreach ($array as $key => $value) 
		{
			$this->log->WriteLog( INFO, $key.":".$value );
		}
	}

	/*
		������û Msg �۽� �� ��� Msg����                       
	*/
 	function SendRecvMsg() 
	{
		$this->log->WriteLog( INFO, "Send & Recv Msg Start" );

		/****************************************************************************
		* 
		* ��ȣȭProcess�� ������ �ϰ� ���� ������ �ۼ���
		* 
		****************************************************************************/
				
		/** ���� ������ ��ȣȭProcess�� ���� **/
		$this->log->WriteLog( INFO, "Send Data To PG Start [ " );
		$this->SendValArray = array();
		$this->SendValArray = explode( "|", $this->sSendMsg );
		$this->log->WriteLog( INFO, $this->SendValArray);
		$this->log->WriteLog( INFO, "] Send Data To PG End " );
		$this->log->WriteLog( INFO, "SendMsg : [".$this->sSendMsg."]" );	
		
		/** ���� open **/
		$this->log->WriteLog( INFO, "Connect IP:[".$this->LOCALADDR."] Port:[".$this->LOCALPORT."]" );
		$this->fp = fsockopen( $this->LOCALADDR, $this->LOCALPORT , $errno, $errstr, $this->CONN_TIMEOUT );

		
		if( !$this->fp )
		{
			$this->log->WriteLog( ERROR, "Socket Connect Error: [".$errno."-".$errstr."]" );

			/** ���� ���з� ���� ���� �޼��� ���� **/
			if($this->REQUEST["Type"] == "Cancel")
			{
				$this->RESULT["rCancelSuccYn"] = "n";
				$this->RESULT["rCancelResMsg"] = "Socket Connect Fail";
				$this->log->WriteLog( ERROR, $this->RESULT["rCancelResMsg"] );				
			}
			else
			{
				$this->RESULT["rSuccYn"] = "n";
				$this->RESULT["rResMsg"] = "Socket Connect Fail";
				$this->log->WriteLog( ERROR, $this->RESULT["rResMsg"] );
			}
			if($this->fp) fclose( $this->fp );
			return false;
		}
		/** ���ῡ �����Ͽ����Ƿ� �����͸� �޴´�. **/			
		$this->log->WriteLog( INFO, "Socket Open OK" );

		fputs( $this->fp, $this->sSendMsg );
		
		socket_set_timeout($this->fp, $this->READ_TIMEOUT);
		
		/** ���� 6����Ʈ�� ������ ������ ���̸� üũ�� �� �����͸�ŭ�� �޴´�. **/
		/****************************************************************************
		*
		* PHP ������ ���� ���� ������ ���� üũ�� ������������ �߻��� �� �ֽ��ϴ�
		* �����޼���:���� ������(����) üũ ���� ��ſ����� ���� ���� ����
		* ������ ���� üũ ������ �Ʒ��� ���� �����Ͽ� ����Ͻʽÿ�
		* $this->sRecvLen = fgets( $this->fp, 6 );
		* $this->sRecvMsg = fgets( $this->fp, $this->sRecvLen );
		*
		****************************************************************************/
		
		if($this->REQUEST["RecvLen"] == 7)
		{
			$this->sRecvLen = fgets( $this->fp, $this->REQUEST["RecvLen"] );
			$this->sRecvMsg = fgets( $this->fp, $this->sRecvLen + 1 );
		}
		else if($this->REQUEST["RecvLen"] == 6)
		{
			$this->sRecvLen = fgets( $this->fp, $this->REQUEST["RecvLen"] );
			$this->sRecvMsg = fgets( $this->fp, $this->sRecvLen);
		}
		else
		{
			$this->REQUEST["RecvLen"] = 7;
			$this->sRecvLen = fgets( $this->fp, $this->REQUEST["RecvLen"] );
			$this->sRecvMsg = fgets( $this->fp, $this->sRecvLen + 1 );
		}
		
		$this->log->WriteLog( INFO, "RecvMsg Length : [".$this->sRecvLen."]" );
		$this->log->WriteLog( INFO, "RecvMsg : [".$this->sRecvMsg."]" );

		/** ���� close **/			
		fclose( $this->fp );
		$this->log->WriteLog( INFO, "Socket Close OK");
		
		if( strlen( $this->sRecvMsg ) > 0 && strlen( $this->sRecvMsg ) == $this->sRecvLen )
		{
			/** ���� ������(����) üũ ���� **/
			$this->log->WriteLog( INFO, "RecvMsg Length Check OK");
				
			$this->RecvValArray = array();
			$this->RecvValArray = explode( "|", $this->sRecvMsg );
			
			/** null �Ǵ� NULL ����, 0 �� �������� ��ȯ 
			for( $i = 0; $i < sizeof( $this->RecvValArray); $i++ )
			{
				$this->RecvValArray[$i] = trim( $this->RecvValArray[$i] );
				
				if( !strcmp( $this->RecvValArray[$i], "null" ) || !strcmp( $this->RecvValArray[$i], "NULL" ) )
				{
					$this->RecvValArray[$i] = "";
				}
				
				if( IsNumber( $this->RecvValArray[$i] ) )
				{
					if( $this->RecvValArray[$i] == 0 ) $this->RecvValArray[$i] = "";
				}
			} 
			**/
			$this->log->WriteLog( INFO, "Send & Recv Msg End" );
			return true;
		}
		else
		{
			/** ���� ������(����) üũ ������ ��ſ����� ���� ���� ���з� ���� **/
			if($this->REQUEST["Type"] == "Cancel")
			{
				$this->RESULT["rCancelSuccYn"] = "n";
				$this->RESULT["rCancelResMsg"] = "Recv Msg Length Check Errror";
				$this->log->WriteLog( ERROR, $this->RESULT["rCancelResMsg"]." : sRecvLen[".$this->sRecvLen."]"."sRecvMsg Length[".strlen( $this->sRecvMsg )."]");
			}
			else
			{
				$this->RESULT["rSuccYn"] = "n";
				$this->RESULT["rResMsg"] = "Recv Msg Length Check Errror";
				$this->log->WriteLog( ERROR, $this->RESULT["rResMsg"]." : sRecvLen[".$this->sRecvLen."]"."sRecvMsg Length[".strlen( $this->sRecvMsg )."]");
			}

			return false;

		}

	}	//SendMsg() End

	/*
		���� ���� Msg �۽� �� ��� Msg����                       
	*/
 	function SendRecvMsgWeb() 
	{
		//���� �۾�����
		return false;
	}

	/*
		Make Pay Msg                       
	*/
 	function MakeMsg() 
	{
		$this->log->WriteLog( INFO, "Make Msg Start" );
		
		if( strcmp( $this->REQUEST["AuthTy"], "card" ) == 0 )
		{
			if( strcmp( $this->REQUEST["SubTy"], "isp" ) == 0 )
			{

				$this->ENCTYPE = 2;
				$this->sDataMsg = $this->ENCTYPE.
					"plug15"."|".
					$this->REQUEST["StoreId"]."|".
					$this->REQUEST["UserId"]."|".
					$this->REQUEST["Amt"]."|".
					$this->REQUEST["OrdNo"]."|".
					$this->REQUEST["DeviId"]."|".
					$this->REQUEST["RcpNm"]."|".
					$this->REQUEST["RcpPhone"]."|".
					$this->REQUEST["DlvAddr"]."|".
					$this->REQUEST["OrdNm"]."|".
					$this->REQUEST["OrdPhone"]."|".
					$this->REQUEST["Remark"]."|".
					$this->REQUEST["ProdNm"]."|".
					$this->REQUEST["KVP_CURRENCY"]."|".
					$this->REQUEST["partial_mm"]."|".
					$this->REQUEST["noIntMonth"]."|".
					$this->REQUEST["KVP_CARDCODE"]."|".
					$this->REQUEST["KVP_SESSIONKEY"]."|".
					$this->REQUEST["KVP_ENCDATA"]."|".
					$this->REQUEST["KVP_CONAME"]."|".
					$this->REQUEST["UserIp"]."|".
					$this->REQUEST["UserEmail"]."|".
					$this->RESULT["NetCancID"]."|";
		
				$this->sSendMsg = sprintf( "%06d%s", strlen( $this->sDataMsg ), $this->sDataMsg );
				$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]."-".$this->REQUEST["SubTy"]." "."Make MSG OK " );
			}
			else if( ( strcmp( $this->REQUEST["SubTy"], "visa3d" ) == 0 ) || ( strcmp( $this->REQUEST["SubTy"], "normal" ) == 0 ) )
			{
				
				$this->ENCTYPE = 0;

				$this->sDataMsg = $this->ENCTYPE.
					"plug15"."|".
					$this->REQUEST["StoreId"]."|".
					$this->REQUEST["UserId"]."|".
					$this->REQUEST["Amt"]."|".
					$this->REQUEST["OrdNo"]."|".
					$this->REQUEST["DeviId"]."|".
					$this->encrypt_aegis($this->REQUEST["CardNo"])."|".
					$this->encrypt_aegis($this->REQUEST["ExpYear"].$this->REQUEST["ExpMon"])."|".
					$this->REQUEST["Instmt"]."|".
					$this->REQUEST["AuthYn"]."|".
					$this->encrypt_aegis($this->REQUEST["Passwd"])."|".
					$this->encrypt_aegis($this->REQUEST["SocId"])."|".
					$this->REQUEST["RcpNm"]."|".
					$this->REQUEST["RcpPhone"]."|".
					$this->REQUEST["DlvAddr"]."|".
					$this->REQUEST["OrdNm"]."|".
					$this->REQUEST["UserIp"].";".$this->REQUEST["OrdPhone"]."|".
					$this->REQUEST["UserEmail"].";".$this->REQUEST["Remark"]."|".
					$this->REQUEST["ProdNm"]."|".
					$this->REQUEST["MPI_CAVV"]."|".
					$this->REQUEST["MPI_MD64"]."|".
					$this->REQUEST["MPI_ECI"]."|".
					$this->REQUEST["UserEmail"]."|".
					$this->RESULT["NetCancID"]."|";
				
				$this->sSendMsg = sprintf( "%06d%s", strlen( $this->sDataMsg ), $this->sDataMsg );
				$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]."-".$this->REQUEST["SubTy"]." "."Make MSG OK " );
			}
		}
		else if( strcmp( $this->REQUEST["AuthTy"], "iche" ) == 0 && strcmp( $this->REQUEST["ICHE_SOCKETYN"], "Y" ) == 0)
		{	
				$this->ENCTYPE = R;


				$this->sDataMsg = $this->ENCTYPE.
					"RB-PayReq"."|".
					$this->REQUEST["StoreId"]."|".
					$this->REQUEST["OrdNo"]."|".
					$this->REQUEST["ICHE_OUTBANKMASTER"]."|".
					$this->REQUEST["Amt"]."|".
					$this->REQUEST["ICHE_OUTBANKNAME"]."|".
					$this->REQUEST["ICHE_OUTACCTNO"]."|".
					$this->REQUEST["OrdPhone"]."|".
					$this->REQUEST["UserEmail"]."|".
					$this->REQUEST["ProdNm"]."|".
					$this->REQUEST["ICHE_POSMTID"]."|".
					$this->REQUEST["ICHE_FNBCMTID"]."|".
					$this->REQUEST["ICHE_APTRTS"]."|".
					$this->REQUEST["ICHE_CASHYN"]."|".
					$this->REQUEST["UserId"]."|".
					$this->REQUEST["ICHE_CASHGUBUN_CD"]."|".
					$this->REQUEST["ICHE_CASHID_NO"]."|".
					$this->REQUEST["ICHE_ECWYN"]."|".
					$this->REQUEST["ICHE_ECWID"]."|".
					$this->REQUEST["ICHE_ECWAMT1"]."|".
					$this->REQUEST["ICHE_ECWAMT2"]."|".
					$this->RESULT["NetCancID"]."|";
				
				$this->sSendMsg = sprintf( "%06d%s", strlen( $this->sDataMsg ), $this->sDataMsg );
				$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." "."Make MSG OK " );
		}
		else if( strcmp( $this->REQUEST["AuthTy"], "iche" ) == 0 && strcmp( $this->REQUEST["ICHEARS_SOCKETYN"], "Y" ) == 0)
		{

				$this->ENCTYPE = B;
		
				$this->sDataMsg = $this->ENCTYPE.
					"TB-PayReq"."|".
					$this->REQUEST["StoreId"]."|".
					$this->REQUEST["OrdNo"]."|".
					$this->REQUEST["ICHEARS_POSMTID"]."|".
					$this->REQUEST["ICHEARS_ADMNO"]."|".
					$this->REQUEST["ICHEARS_CENTERCD"]."|".
					$this->REQUEST["Amt"]."|".
					$this->REQUEST["ICHE_OUTACCTNO"]."|".
					$this->REQUEST["ICHE_OUTBANKMASTER"]."|".
					$this->REQUEST["ICHEARS_HPNO"]."|".
					$this->REQUEST["UserEmail"]."|".
					$this->REQUEST["ProdNm"]."|".
					$this->REQUEST["ICHE_ECWYN"]."|".
					$this->REQUEST["ICHE_ECWID"]."|".
					$this->REQUEST["ICHE_ECWAMT1"]."|".
					$this->REQUEST["ICHE_ECWAMT2"]."|".
					$this->REQUEST["ICHE_CASHYN"]."|".
					$this->REQUEST["ICHE_CASHGUBUN_CD"]."|".
					$this->REQUEST["ICHE_CASHID_NO"]."|".
					$this->RESULT["NetCancID"]."|";
				
				$this->sSendMsg = sprintf( "%06d%s", strlen( $this->sDataMsg ), $this->sDataMsg );
				$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." "."Make MSG OK " );

		}
		else if( strcmp( $this->REQUEST["AuthTy"], "virtual" ) == 0 ) //��������߰�
		{
			/****************************************************************************
			*
			* [3] ������� ����
			* 
			* -- �̺κ��� ���� ó���� ���� ��ȣȭProcess�� Socket����ϴ� �κ��̴�.
			* ���� �ٽ��� �Ǵ� �κ��̹Ƿ� �����Ŀ��� �׽�Ʈ�� �Ͽ��� �Ѵ�.
			* -- ������ ���̴� �Ŵ��� ����
			* 
			* -- ���� ��û ���� ����
			* + �����ͱ���(6) + ��ȣȭ ����(1) + ������
			* + ������ ����(������ ������ "|"�� �Ѵ�.)
			* ��������(10)		| ��üID(20)		| �ֹ���ȣ(40)	 	| �����ڵ�(4)			| ������¹�ȣ(20) |
			* �ŷ��ݾ�(13)		| �Աݿ�����(8)	| �����ڸ�(20)		| �ֹι�ȣ(13)		| 
			* �̵���ȭ(21)		| �̸���(50)		| �������ּ�(100)		| �����ڸ�(20)		|
			* �����ڿ���ó(21)	| ������ּ�(100)	| ��ǰ��(100)		| ��Ÿ�䱸����(300)	| ���� ������(50)	 |	���� ������(100)|
			* 
			****************************************************************************/
			
			$this->ENCTYPE = "V";
			
			/****************************************************************************
			* 
			* ���� ���� Make
			* 
			****************************************************************************/
			
			$this->sDataMsg = $this->ENCTYPE.
				/* $this->REQUEST["AuthTy"]."|". */
				"vir_n|".
				$this->REQUEST["StoreId"]."|".
				$this->REQUEST["OrdNo"]."|".
				$this->REQUEST["VIRTUAL_CENTERCD"]."|".
				$this->REQUEST["VIRTUAL_NO"]."|". 
				$this->REQUEST["Amt"]."|".
				$this->REQUEST["VIRTUAL_DEPODT"]."|".
				$this->REQUEST["OrdNm"]."|".
				$this->REQUEST["ZuminCode"]."|".
				$this->REQUEST["OrdPhone"]."|".
				$this->REQUEST["UserEmail"]."|".
				$this->REQUEST["OrdAddr"]."|".
				$this->REQUEST["RcpNm"]."|".
				$this->REQUEST["RcpPhone"]."|".
				$this->REQUEST["DlvAddr"]."|".
				$this->REQUEST["ProdNm"]."|".
				$this->REQUEST["Remark"]."|".
				$this->REQUEST["MallUrl"]."|".
				$this->REQUEST["MallPage"]."|".
				$this->RESULT["NetCancID"]."|";
				
			$this->sSendMsg = sprintf( "%06d%s", strlen( $this->sDataMsg ), $this->sDataMsg );
			$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." "."Make MSG OK " );
		}
		else if( strcmp( $this->REQUEST["AuthTy"], "hp" ) == 0 )
		{
			/****************************************************************************
			* 
			* [4] �ڵ��� ����
			*
			*  �ڵ��� ������ ��������ʴ� ������ AGS_pay.html���� ���ҹ���� �� �ſ�ī��(����)���� ������ �����ñ� �ٶ��ϴ�.
			* 
			*  �̺κ��� ���� ó���� ���� ��ȣȭProcess�� Socket����ϴ� �κ��̴�.
			*  ���� �ٽ��� �Ǵ� �κ��̹Ƿ� �����Ŀ��� �׽�Ʈ�� �Ͽ��� �Ѵ�.
			*  -- ���� ��û ���� ����
			*  + �����ͱ���(6) + �ڵ��������ڵ�(1) + ������
			*  + ������ ����(������ ������ "|"�� �Ѵ�.)
			* 
			****************************************************************************/
				
			$this->ENCTYPE = "h";
			$this->REQUEST["StrSubTy"] = "Bill";
			
			/****************************************************************************
			* 
			* ���� ���� Make
			* 
			****************************************************************************/
			
			$this->sDataMsg = $this->ENCTYPE.
				$this->REQUEST["StrSubTy"]."|".
				$this->REQUEST["StoreId"]."|".
				$this->REQUEST["HP_SERVERINFO"]."|".
				$this->REQUEST["HP_ID"]."|".
				$this->REQUEST["HP_SUBID"]."|".
				$this->REQUEST["OrdNo"]."|".
				$this->REQUEST["Amt"]."|".
				$this->REQUEST["HP_UNITType"]."|".
				$this->REQUEST["HP_HANDPHONE"]."|".
				$this->REQUEST["HP_COMPANY"]."|".
				$this->REQUEST["HP_IDEN"]."|".
				$this->REQUEST["UserId"]."|".
				$this->REQUEST["UserEmail"]."|".
				$this->REQUEST["HP_IPADDR"]."|".
				$this->REQUEST["ProdNm"]."|".
				$this->RESULT["NetCancID"]."|";

			$this->sSendMsg = sprintf( "%06d%s", strlen( $this->sDataMsg ), $this->sDataMsg );
			$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." "."Make MSG OK " );

		}
		else if( strcmp( $this->REQUEST["AuthTy"], "ars" ) == 0 )
		{
			/****************************************************************************
			* 
			* [5] ARS ����
			*
			*  ARS ������ ��������ʴ� ������ AGS_pay.html���� ���ҹ���� �� �ſ�ī��(����)���� ������ �����ñ� �ٶ��ϴ�.
			* 
			*  �̺κ��� ���� ó���� ���� ��ȣȭProcess�� Socket����ϴ� �κ��̴�.
			*  ���� �ٽ��� �Ǵ� �κ��̹Ƿ� �����Ŀ��� �׽�Ʈ�� �Ͽ��� �Ѵ�.
			*  -- ���� ��û ���� ����
			*  + �����ͱ���(6) + ARS�����ڵ�(1) + ������
			*  + ������ ����(������ ������ "|"�� �Ѵ�.)
			* 
			****************************************************************************/
				
			$this->ENCTYPE = "A";
			$this->REQUEST["StrSubTy"] = "ABill";
			
			/****************************************************************************
			* 
			* ���� ���� Make
			* 
			****************************************************************************/

			$this->sDataMsg = $this->ENCTYPE.
				$this->REQUEST["StrSubTy"]."|".
				$this->REQUEST["StoreId"]."|".
				$this->REQUEST["HP_SERVERINFO"]."|".
				$this->REQUEST["HP_ID"]."|".
				$this->REQUEST["HP_UNITType"]."|".
				$this->REQUEST["Amt"]."|".
				$this->REQUEST["ProdNm"]."|".
				$this->REQUEST["UserEmail"]."|".
				$this->REQUEST["HP_SUBID"]."|".
				$this->REQUEST["OrdNo"]."|".
				$this->REQUEST["UserId"]."|".
				$this->REQUEST["ARS_PHONE"]."|".
				$this->REQUEST["HP_IDEN"]."|".
				$this->REQUEST["ARS_NAME"]."|".
				$this->REQUEST["HP_COMPANY"]."|".
				$this->REQUEST["HP_IPADDR"]."|".
				$this->RESULT["NetCancID"]."|";

			$this->sSendMsg = sprintf( "%06d%s", strlen( $this->sDataMsg ), $this->sDataMsg );
			$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." "."Make MSG OK " );
		}else{
			$this->ERRMSG .= "�������� ����. AuthTy:[".$this->REQUEST["AuthTy"]."],SubTy:[".$this->REQUEST["SubTy"]."]";
			$this->log->WriteLog( ERROR, $this->ERRMSG );
			$this->RESULT["rSuccYn"] = "n";
			$this->RESULT["rResMsg"] = $this->ERRMSG;
			
			return false;
		}
		$this->log->WriteLog( INFO, "Make Msg End" );
		return true;
	}	// MakeMsg() End


	/*
		Make Cancel Msg                       
	*/
 	function MakeCancelMsg() 
	{
		$this->log->WriteLog( INFO, "Make Cancel Msg Start" );
		if( strcmp( $this->REQUEST["AuthTy"], "card" ) == 0 )
		{
			if( strcmp( $this->REQUEST["SubTy"], "isp" ) == 0 )
			{
				
				/****************************************************************************
				*
				* [1-1] �ſ�ī�������� - ISP
				*
				* -- �̺κ��� ��� ���� ó���� ���� PG����Process�� Socket����ϴ� �κ��̴�.
				* ���� �ٽ��� �Ǵ� �κ��̹Ƿ� �����Ŀ��� ���� ���������� ������ �׽�Ʈ�� �Ͽ��� �Ѵ�.
				* -- ������ ���̴� �Ŵ��� ����
				*	    
				* -- ��� ���� ��û ���� ����
				* + �����ͱ���(6) + ��ȣȭ����(1) + ������
				* + ������ ����(������ ������ "|"�� �Ѵ�.
				* ��������(6)	| ��ü���̵�(20) 	| ���ι�ȣ(20) 	| ���νð�(8)	| �ŷ�������ȣ(6) |
				*
				* -- ��� ���� ���� ���� ����
				* + �����ͱ���(6) + ������
				* + ������ ����(������ ������ "|"�� �Ѵ�.
				* ��üID(20)	| ���ι�ȣ(20)	| ���νð�(8)	| �����ڵ�(4)	| �ŷ�������ȣ(6)	| ��������(1)	|
				*		   
				****************************************************************************/
				
				$this->ENCTYPE = 2;
				
				/****************************************************************************
				* 
				* ���� ���� Make
				* 
				****************************************************************************/
						
				$this->sDataMsg = $this->ENCTYPE.
				"cancel"."|".
				$this->GetResult("StoreId")."|".
				$this->GetResult("rApprNo")."|".
				substr($this->GetResult("rApprTm"),0,8)."|".
				$this->GetResult("rDealNo")."|".
				$this->GetResult("NetCancID")."|";
 
				$this->sSendMsg = sprintf( "%06d%s", strlen( $this->sDataMsg ), $this->sDataMsg );
				$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]."-".$this->REQUEST["SubTy"]." "."Make Cancel MSG OK " );
			}
			else if( ( strcmp( $this->REQUEST["SubTy"], "visa3d" ) == 0 ) || ( strcmp( $this->REQUEST["SubTy"], "normal" ) == 0 ) )
			{
				/****************************************************************************
				*
				* [1-2] �ſ�ī�������� - VISA3D, �Ϲ�
				*
				* -- �̺κ��� ��� ���� ó���� ���� ��ȣȭProcess�� Socket����ϴ� �κ��̴�.
				* ���� �ٽ��� �Ǵ� �κ��̹Ƿ� �����Ŀ��� ���� ���������� ������ �׽�Ʈ�� �Ͽ��� �Ѵ�.
				*
				* -- ��� ���� ��û ���� ����
				* + �����ͱ���(6) + ��ȣȭ����(1) + ������
				* + ������ ����(������ ������ "|"�� �ϸ� ī���ȣ,��ȿ�Ⱓ,��й�ȣ,�ֹι�ȣ�� ��ȣȭ�ȴ�.)
				* ��������(6)	| ��ü���̵�(20) 	| ���ι�ȣ(8) 	| ���νð�(14) 	| ī���ȣ(16) 	|
				*
				* -- ��� ���� ���� ���� ����
				* + �����ͱ���(6) + ������
				* + ������ ����(������ ������ "|"�� �ϸ� ��ȣȭProcess���� �ص����� �ǵ����͸� �����ϰ� �ȴ�.
				* ��üID(20)	| ���ι�ȣ(8)	| ���νð�(14)	| �����ڵ�(4)	| ��������(1)	|
				* �ֹ���ȣ(20)	| �Һΰ���(2)	| �����ݾ�(20)	| ī����(20)	| ī����ڵ�(4) 	|
				* ��������ȣ(15)	| ���Ի��ڵ�(4)	| ���Ի��(20)	| ��ǥ��ȣ(6)
				*		   
				****************************************************************************/
				
				$this->ENCTYPE = 0;
				
				/****************************************************************************
				* 
				* ���� ���� Make
				* 
				****************************************************************************/

				$this->sDataMsg = $this->ENCTYPE.
				"cancel"."|".
				$this->GetResult("StoreId")."|".
				$this->GetResult("rApprNo")."|".
				substr($this->GetResult("rApprTm"),0,8)."|".
				$this->GetResult("rDealNo")."|".
				$this->GetResult("NetCancID")."|";

				$this->sSendMsg = sprintf( "%06d%s", strlen( $this->sDataMsg ), $this->sDataMsg );
				$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]."-".$this->REQUEST["SubTy"]." "."Make Cancel MSG OK " );
			}
		}else if( strcmp( $this->REQUEST["AuthTy"], "iche" ) == 0 && strcmp( $this->REQUEST["ICHE_SOCKETYN"], "Y" ) == 0){
			
				/****************************************************************************
				* 
				* [2-1] ���ͳݹ�ŷ ������ü(����) ���ó��
				* 
				* -- �̺κ��� ���ͳݹ�ŷ ���� ���ó���� ���� ��ȣȭProcess�� Socket����ϴ� �κ��̴�.
				* ���� �ٽ��� �Ǵ� �κ��̹Ƿ� �����Ŀ��� ���� ���������� ������ �׽�Ʈ�� �Ͽ��� �Ѵ�.
				* -- ������ ���̴� �Ŵ��� ����
				* 
				* -- ���ͳݹ�ŷ ���� ��û ���� ����
				* + �����ͱ���(6) + ��ȣȭ����(1) + ������
				* + ������ ����(������ ������ "|"�� �Ѵ�.)
				* ��������(10)		| ��üID(20)		| MTID(������ü���� �����)		| �����ݾ�(8)		| �����ڵ�(2)
				* 
				****************************************************************************/

				$this->ENCTYPE = R;
				
				/****************************************************************************
				* 
				* ���� ���� Make
				* 
				****************************************************************************/

				$this->sDataMsg = $this->ENCTYPE.
					"RB-CanReq"."|".
					$this->GetResult("StoreId")."|".
					$this->GetResult("ICHE_POSMTID")."|".
					$this->GetResult("Amt")."|".
					$this->GetResult("ICHE_OUTBANKNAME")."|".
					$this->GetResult("NetCancID")."|";
					
				$this->sSendMsg = sprintf( "%06d%s", strlen( $this->sDataMsg ), $this->sDataMsg );
				$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." "."Make Cancel MSG OK " );
		
		}else if( strcmp( $this->REQUEST["AuthTy"], "iche" ) == 0 && strcmp( $this->REQUEST["ICHEARS_SOCKETYN"], "Y" ) == 0){
				
				/****************************************************************************
				* 
				* [2-1] �ڷ���ŷ ������ü(����) ���ó��
				* 
				* -- �̺κ��� �ڷ���ŷ ���� ���ó���� ���� ��ȣȭProcess�� Socket����ϴ� �κ��̴�.
				* ���� �ٽ��� �Ǵ� �κ��̹Ƿ� �����Ŀ��� ���� ���������� ������ �׽�Ʈ�� �Ͽ��� �Ѵ�.
				* -- ������ ���̴� �Ŵ��� ����
				* 
				* -- �ڷ���ŷ ���� ��û ���� ����
				* + �����ͱ���(6) + ��ȣȭ����(1) + ������
				* + ������ ����(������ ������ "|"�� �Ѵ�.)
				* ��������(10)		| ��üID(20)		| MTID(������ü���� �����)		| �����ݾ�(8)		| �����ڵ�(2)
				* 
				****************************************************************************/

				$this->ENCTYPE = B;
				
				/****************************************************************************
				* 
				* ���� ���� Make
				* 
				****************************************************************************/

				$this->sDataMsg = $this->ENCTYPE.
					"TB-CanReq"."|".
					$this->GetResult("StoreId")."|".
					""."|".
					""."|".
					$this->GetResult("NetCancID")."|";
					
				$this->sSendMsg = sprintf( "%06d%s", strlen( $this->sDataMsg ), $this->sDataMsg );
				$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." "."Make Cancel MSG OK " );
		
		}else if( strcmp( $this->REQUEST["AuthTy"], "hp" ) == 0 ){
				
				/****************************************************************************
				* 
				* [3] �ڵ��� ���ó��
				* 
				* -- �̺κ��� �ڵ��� ���� ���ó���� ���� ��ȣȭProcess�� Socket����ϴ� �κ��̴�.
				* ���� �ٽ��� �Ǵ� �κ��̹Ƿ� �����Ŀ��� ���� ���������� ������ �׽�Ʈ�� �Ͽ��� �Ѵ�.
				* -- ������ ���̴� �Ŵ��� ����
				* 
				* -- �ڵ��� ���� ��û ���� ����
				* + �����ͱ���(6) + ��ȣȭ����(1) + ������
				* + ������ ����(������ ������ "|"�� �Ѵ�.)
				* ��������(10)		| ��üID(20)	| NetCancID		|
				* 
				****************************************************************************/

				$this->ENCTYPE = H;
				
				/****************************************************************************
				* 
				* ���� ���� Make
				* 
				****************************************************************************/
				$this->sDataMsg = $this->ENCTYPE.
					"MobileCanReq"."|".
					$this->GetResult("StoreId")."|".
					$this->GetResult("NetCancID")."|";
					
				$this->sSendMsg = sprintf( "%06d%s", strlen( $this->sDataMsg ), $this->sDataMsg );
				$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." "."Make Cancel MSG OK " );
		
		}else if( strcmp( $this->REQUEST["AuthTy"], "ars" ) == 0 ){
				
				/****************************************************************************
				* 
				* [4] ARS ���ó��
				* 
				* -- �̺κ��� ARS ���� ���ó���� ���� ��ȣȭProcess�� Socket����ϴ� �κ��̴�.
				* ���� �ٽ��� �Ǵ� �κ��̹Ƿ� �����Ŀ��� ���� ���������� ������ �׽�Ʈ�� �Ͽ��� �Ѵ�.
				* -- ������ ���̴� �Ŵ��� ����
				* 
				* -- ARS ���� ��û ���� ����
				* + �����ͱ���(6) + ��ȣȭ����(1) + ������
				* + ������ ����(������ ������ "|"�� �Ѵ�.)
				* ��������(10)		| ��üID(20)	| NetCancID		|
				* 
				****************************************************************************/

				$this->ENCTYPE = A;
				
				/****************************************************************************
				* 
				* ���� ���� Make
				* 
				****************************************************************************/
				$this->sDataMsg = $this->ENCTYPE.
					"ARSCanReq"."|".
					$this->GetResult("StoreId")."|".
					$this->GetResult("NetCancID")."|";
					
				$this->sSendMsg = sprintf( "%06d%s", strlen( $this->sDataMsg ), $this->sDataMsg );
				$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." "."Make Cancel MSG OK " );
		
		}else{
			//�ſ�ī��,������ü �̿��� ���������� ��ұ�� ������� ����.
			$this->log->WriteLog( WARN, "Cancel Passed. AuthTy : [".$this->REQUEST["AuthTy"]."-".$this->REQUEST["SubTy"]."] " );
			$this->RESULT["rCancelSuccYn"] = "n";
			$this->RESULT["rCancelResMsg"] = "Cannot Cancel AuthTy[".$this->REQUEST["AuthTy"]."]";					
			return false;
		}
		$this->log->WriteLog( INFO, "Make Cancel Msg End" );
		return true;
	}	//MakeCancelMsg End


	/*
		RecvMsg Parsing                       
	*/
 	function ParseMsg() 
	{
		$this->log->WriteLog( INFO, "Parse Msg Start" );
		/****************************************************************************
		* �� ���� ���� ������ ���� ���� ���� ����
		*
		* �� AuthTy  = "card"		�ſ�ī�����
		*	 - SubTy = "isp"		��������ISP
		*	 - SubTy = "visa3d"		�Ƚ�Ŭ��
		*	 - SubTy = "normal"		�Ϲݰ���
		*
		* �� AuthTy  = "iche"		�Ϲ�-������ü
		* 
		* �� AuthTy  = "virtual"	�Ϲ�-�������(�������Ա�)
		* 
		* �� AuthTy  = "hp"			�ڵ�������
		*
		* �� AuthTy  = "ars"		ARS����
		*
		****************************************************************************/
		
		if( strcmp( $this->REQUEST["AuthTy"], "card" ) == 0 )
		{
			if( strcmp( $this->REQUEST["SubTy"], "isp" ) == 0 )
			{
				/****************************************************************************
				*
				*  [1-1] �ſ�ī�� ��������ISP ó��
				* 
				* 
				* -- ���� ���� ���� ����
				* + �����ͱ���(6) + ������
				* + ������ ����(������ ������ "|"�� �Ѵ�.
				* ��üID(20)		| �����ڵ�(4)		| �ŷ�������ȣ(6)		| ���ι�ȣ(8)		| 
				* �ŷ��ݾ�(12)	| ��������(1)	 	| ���л���(20)		| ���νð�(14)	| 
				* ī����ڵ�(4)	|
				*    
				****************************************************************************/
								
				$this->RESULT["rStoreId"] = $this->RecvValArray[0];
				$this->RESULT["rBusiCd"] = $this->RecvValArray[1];
				$this->RESULT["rOrdNo"] = $this->REQUEST["OrdNo"];
				$this->RESULT["rDealNo"] = $this->RecvValArray[2];
				$this->RESULT["rApprNo"] = $this->RecvValArray[3];
				$this->RESULT["rProdNm"] = $this->REQUEST["ProdNm"];
				$this->RESULT["rAmt"] = $this->RecvValArray[4];
				$this->RESULT["rInstmt"] = $this->REQUEST["KVP_QUOTA"];
				$this->RESULT["rSuccYn"] = $this->RecvValArray[5];
				$this->RESULT["rResMsg"] = $this->RecvValArray[6];
				$this->RESULT["rApprTm"] = $this->RecvValArray[7];
				$this->RESULT["rCardCd"] = $this->RecvValArray[8];	
				
				$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]."-".$this->REQUEST["SubTy"]." "."RECV MSG Parsing OK " );
			}
			else if( ( strcmp( $this->REQUEST["SubTy"], "visa3d" ) == 0 ) || ( strcmp( $this->REQUEST["SubTy"], "normal" ) == 0 ) )
			{
				/****************************************************************************
				* 
				* [1-2] �Ƚ�Ŭ�� or �Ϲݰ��� ó�� �������� ��������
				* + �����ͱ���(6) + ������
				* + ������ ����(������ ������ "|"�� �ϸ� ��ȣȭProcess���� �ص����� �ǵ����͸� �����ϰ� �ȴ�.
				* ��üID(20)		| �����ڵ�(4)		 | �ֹ���ȣ(40)	| ���ι�ȣ(8)		| �ŷ��ݾ�(12)  |
				* ��������(1)		| ���л���(20)	 | ī����(20) 	| ���νð�(14)	| ī����ڵ�(4)	|
				* ��������ȣ(15)	| ���Ի��ڵ�(4)	 | ���Ի��(20)	| ��ǥ��ȣ(6)		|
				* 
				****************************************************************************/
				
				$this->RESULT["rStoreId"] = $this->RecvValArray[0];
				$this->RESULT["rBusiCd"] = $this->RecvValArray[1];
				$this->RESULT["rOrdNo"] = $this->RecvValArray[2];
				$this->RESULT["rApprNo"] = $this->RecvValArray[3];
				$this->RESULT["rInstmt"] = $this->REQUEST["Instmt"];
				$this->RESULT["rAmt"] = $this->RecvValArray[4];
				$this->RESULT["rSuccYn"] = $this->RecvValArray[5];
				$this->RESULT["rResMsg"] = $this->RecvValArray[6];
				$this->RESULT["rCardNm"] = $this->RecvValArray[7];
				$this->RESULT["rApprTm"] = $this->RecvValArray[8];
				$this->RESULT["rCardCd"] = $this->RecvValArray[9];
				$this->RESULT["rMembNo"] = $this->RecvValArray[10];
				$this->RESULT["rAquiCd"] = $this->RecvValArray[11];
				$this->RESULT["rAquiNm"] = $this->RecvValArray[12];
				$this->RESULT["rDealNo"] = $this->RecvValArray[13];
				$this->RESULT["rProdNm"] = $this->REQUEST["ProdNm"];
				$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]."-".$this->REQUEST["SubTy"]." "."RECV MSG Parsing OK " );
			}
		}
		else if( strcmp( $this->REQUEST["AuthTy"], "iche" ) == 0 && strcmp( $this->REQUEST["ICHE_SOCKETYN"], "Y" ) == 0)
		{
			/****************************************************************************
			* 
			* [2-1] ������ü ���Ϲ��(���ͳݹ�ŷ) ���� ��û ���� ���� ����
			* + �����ͱ���(6) + ������
			* + ������ ����(������ ������ "|"�� �ϸ� ��ȣȭProcess���� �ص����� �ǵ����͸� �����ϰ� �ȴ�.
			* ��������(10)		| �������̵�(20)	| �ֹ���ȣ(40)	| �̿����ֹ���ȣ(50)	| ����ڵ�(4)  | ����޽���(300)  |
			* 
			****************************************************************************/
				
			$this->RESULT["rStoreId"] = $this->RecvValArray[1];
			$this->RESULT["rOrdNo"] = $this->RecvValArray[2];
			$this->RESULT["rMTid"] = $this->RecvValArray[3];
			$this->RESULT["ES_SENDNO"] = $this->RecvValArray[4];
			$this->RESULT["rSuccYn"] = $this->RecvValArray[5];
			$this->RESULT["rResMsg"] = $this->RecvValArray[6];
			$this->RESULT["rAmt"] = $this->REQUEST["Amt"];
			$this->RESULT["rProdNm"] = $this->REQUEST["ProdNm"];
			$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." "."RECV MSG Parsing OK " );
		}
		else if( strcmp( $this->REQUEST["AuthTy"], "iche" ) == 0 && strcmp( $this->REQUEST["ICHEARS_SOCKETYN"], "Y" ) == 0)
		{
			/****************************************************************************
			* 
			* [2-2] ������ü �ڷ���ŷ ó��
			*
			* -- �ڷ���ŷ ���� ��û ���� ���� ����
			* + �����ͱ���(6) + ������
			* + ������ ����(������ ������ "|"�� �ϸ� ��ȣȭProcess���� �ص����� �ǵ����͸� �����ϰ� �ȴ�.
			* ��������(10)	| �������̵�(20)	| �ֹ���ȣ(40)	| �̿����ֹ���ȣ(50)	| ����ڵ�(4)  | ����޽���(300)  |* 
			*
			****************************************************************************/
			
			$this->RESULT["rStoreId"] = $this->RecvValArray[1];
			$this->RESULT["rOrdNo"] = $this->RecvValArray[2];
			$this->RESULT["rMTid"] = $this->RecvValArray[3];
			$this->RESULT["rSuccYn"] = $this->RecvValArray[4];
			$this->RESULT["rResMsg"] = $this->RecvValArray[5];
			$this->RESULT["rAmt"] = $this->REQUEST["Amt"];
			$this->RESULT["rProdNm"] = $this->REQUEST["ProdNm"];
			$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." "."Parse MSG Passed " );
				
			$pos = strpos($this->RESULT["rResMsg"],':');
			if( $pos !== false ) 
			{
				$this->RESULT["ES_SENDNO"] = substr($this->RESULT["rResMsg"],$pos+1,6) ;
				$this->log->WriteLog( INFO, "ES_SENDNO : [".$this->RESULT["ES_SENDNO"]."] ");
			}				
							
		}
		else if( strcmp( $this->REQUEST["AuthTy"], "virtual" ) == 0 ) 
		{
			/****************************************************************************
			*
			* [3] �������(�������Ա�) ó��
			* 
			* -- ���� ���� ���� ����
			* + �����ͱ���(6) + ��ȣȭ ����(1) + ������
			* + ������ ����(������ ������ "|"�� �Ѵ�.
			* ��������(10)	| ��üID(20)		| ��������(14)	| ������¹�ȣ(20)	| ����ڵ�(1)		| ����޽���(100)	 | 
			*
			****************************************************************************/
			
			$this->RESULT["rAuthTy"]    = $this->RecvValArray[0];
			$this->RESULT["rStoreId"]   = $this->RecvValArray[1];
			$this->RESULT["rApprTm"]    = $this->RecvValArray[2];
			$this->RESULT["rVirNo"]     = $this->RecvValArray[3];
			$this->RESULT["rSuccYn"]    = $this->RecvValArray[4];
			$this->RESULT["rResMsg"]    = $this->RecvValArray[5];
			
			$this->RESULT["rOrdNo"] = $this->REQUEST["OrdNo"];
			$this->RESULT["rProdNm"] = $this->REQUEST["ProdNm"];
			$this->RESULT["rAmt"] = $this->REQUEST["Amt"];
			
			$pos = strpos($this->RESULT["rResMsg"],':');
			if( $pos !== false ) 
			{
				$this->RESULT["ES_SENDNO"] = substr($this->RESULT["rResMsg"],$pos+1,6) ;
				$this->log->WriteLog( INFO, "ES_SENDNO : [".$this->RESULT["ES_SENDNO"]."] ");
			}
			$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." "."RECV MSG Parsing OK " );
			
		}
		else if( strcmp( $this->REQUEST["AuthTy"], "hp" ) == 0 )
		{
			/****************************************************************************
			* 
			* [4] �ڵ��� ����
			*
			*  -- ���� ���� ���� ����
			*  + �����ͱ���(6) + ������
			*  + ������ ����(������ ������ "|"�� �Ѵ�.)
			* ��üID(20)	| ����ڵ�(1)	| ����޽���(100)	 | �ڵ���������(8)	 | �ڵ������� TID(12)	 | �ŷ��ݾ�(12)	 | �ֹ���ȣ(40)	 |
			*
			****************************************************************************/
			
			$this->RESULT["rStoreId"] = $this->RecvValArray[0];	
			$this->RESULT["rSuccYn"] = $this->RecvValArray[1];
			$this->RESULT["rResMsg"] = $this->RecvValArray[2];
			$this->RESULT["rHP_DATE"] = $this->RecvValArray[3];
			$this->RESULT["rHP_TID"] = $this->RecvValArray[4];
			$this->RESULT["rAmt"] = $this->REQUEST["Amt"];
			$this->RESULT["rOrdNo"] = $this->REQUEST["OrdNo"];
			$this->RESULT["rProdNm"] = $this->REQUEST["ProdNm"];
			$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." "."RECV MSG Parsing OK " );

		}
		else if( strcmp( $this->REQUEST["AuthTy"], "ars" ) == 0 )
		{
			/****************************************************************************
			* 
			* [5] ARS ����
			*
			*  -- ���� ���� ���� ����
			*  + �����ͱ���(6) + ������
			*  + ������ ����(������ ������ "|"�� �Ѵ�.)
			* ��üID(20)	| ����ڵ�(1)	| ����޽���(100)	 | ARS������(8)	 | ARS���� TID(12)	 | �ŷ��ݾ�(12)	 | �ֹ���ȣ(40)	 |
			*
			****************************************************************************/
			
			$this->RESULT["rStoreId"] = $this->RecvValArray[0];	
			$this->RESULT["rSuccYn"] = $this->RecvValArray[1];
			$this->RESULT["rResMsg"] = $this->RecvValArray[2];
			$this->RESULT["rHP_DATE"] = $this->RecvValArray[3];
			$this->RESULT["rHP_TID"] = $this->RecvValArray[4];
			$this->RESULT["rAmt"] = $this->REQUEST["Amt"];
			$this->RESULT["rOrdNo"] = $this->REQUEST["OrdNo"];
			$this->RESULT["rProdNm"] = $this->REQUEST["ProdNm"];
			$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." "."RECV MSG Parsing OK " );
		}else{
			$this->log->WriteLog( FATAL, "Unknown AuthTy. AuthTy:[".$this->REQUEST["AuthTy"]."],SubTy:[".$this->REQUEST["SubTy"]."]");
			return false;
		}
		$this->log->WriteLog( INFO, "Parse Msg End" );
		return true;
		
	}	//ParseMsg() End


	/*
		RecvCancelMsg Parsing                       
	*/
 	function ParseCancelMsg() 
	{
		$this->log->WriteLog( INFO, "Parse Cancel Msg Start" );
		if( strcmp( $this->REQUEST["AuthTy"], "card" ) == 0 )
		{
			if( strcmp( $this->REQUEST["SubTy"], "isp" ) == 0 )
			{
				/* [1-1] ��������ISP ó�� */					

				$this->RESULT["rStoreId"] = $this->RecvValArray[0];
				$this->RESULT["rApprNo"] = $this->RecvValArray[1];
				$this->RESULT["rApprTm"] = $this->RecvValArray[2];
				$this->RESULT["rBusiCd"] = $this->RecvValArray[3];
				$this->RESULT["rDealNo"] = $this->RecvValArray[4];
				$this->RESULT["rCancelSuccYn"] = $this->RecvValArray[5];
				$this->RESULT["rCancelResMsg"] = $this->RecvValArray[6];
				
				$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]."-".$this->REQUEST["SubTy"]." "."RECV MSG Parsing OK " );
			}
			else if( ( strcmp( $this->REQUEST["SubTy"], "visa3d" ) == 0 ) || ( strcmp( $this->REQUEST["SubTy"], "normal" ) == 0 ) )
			{
				/* [1-2] �Ƚ�Ŭ�� or �Ϲݰ��� ó�� */	
				$this->RESULT["rStoreId"] = $this->RecvValArray[0];
				$this->RESULT["rApprNo"] = $this->RecvValArray[1];
				$this->RESULT["rApprTm"] = $this->RecvValArray[2];
				$this->RESULT["rBusiCd"] = $this->RecvValArray[3];
				$this->RESULT["rCancelSuccYn"] = $this->RecvValArray[4];
				$this->RESULT["rOrdNo"] = $this->RecvValArray[5];
				$this->RESULT["rInstmt"] = $this->RecvValArray[6];
				$this->RESULT["rAmt"] = $this->RecvValArray[7];
				$this->RESULT["rCardNm"] = $this->RecvValArray[8];
				$this->RESULT["rCardCd"] = $this->RecvValArray[9];
				$this->RESULT["rMembNo"] = $this->RecvValArray[10];
				$this->RESULT["rAquiCd"] = $this->RecvValArray[11];
				$this->RESULT["rAquiNm"] = $this->RecvValArray[12];
				$this->RESULT["rDealNo"] = $this->RecvValArray[13];

				if($this->RESULT["rCancelSuccYn"] == "y")
				{
					$this->RESULT["rCancelResMsg"] = "�������";
				}
				else
				{
					$this->RESULT["rCancelResMsg"] = "��ҽ���";
				}


				$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]."-".$this->REQUEST["SubTy"]." "."RECV MSG Parsing OK " );
			}
		
		}
		else if( strcmp( $this->REQUEST["AuthTy"], "iche" ) == 0 && strcmp( $this->REQUEST["ICHE_SOCKETYN"], "Y" ) == 0)
		{
			/* [2-1] ������ü ���ͳݹ�ŷ ���*/	
			/* 	[RB-CanRes|����ID|posmTid|�ֹ���ȣ|y|��Ҽ���|] */
			$this->RESULT["rStoreId"] = $this->RecvValArray[1];
			$this->RESULT["ICHE_POSMTID"] = $this->RecvValArray[2];
			$this->RESULT["rOrdNo"] = $this->RecvValArray[3];
			$this->RESULT["rCancelSuccYn"] = $this->RecvValArray[4];
			$this->RESULT["rCancelResMsg"] = $this->RecvValArray[5];				

		}
		else if( strcmp( $this->REQUEST["AuthTy"], "iche" ) == 0 && strcmp( $this->REQUEST["ICHEARS_SOCKETYN"], "Y" ) == 0)
		{
			/* [2-2] ������ü �ڷ���ŷ ���*/	
			/* 	[TB-CanRes|����ID|posmTid|�ֹ���ȣ|y|��Ҽ���|] */
			$this->RESULT["rStoreId"] = $this->RecvValArray[1];
			$this->RESULT["rMTid"] = $this->RecvValArray[2];
			$this->RESULT["rCancelSuccYn"] = $this->RecvValArray[3];
			$this->RESULT["rCancelResMsg"] = $this->RecvValArray[4];						
			
		}
		else if( strcmp( $this->REQUEST["AuthTy"], "hp" ) == 0 )
		{
			/****************************************************************************
			*
			* [4] �ڵ��� ���� ���
			*
			* -- ��� ���� ���� ����
			* + �����ͱ���(6) + ������
			* + ������ ����(������ ������ "|"�� �ϸ� ��ȣȭProcess���� �ص����� �ǵ����͸� �����ϰ� �ȴ�.
			* |	MobileCanRes	|	��üID(20)	| ��������(1)	|	����޼���	|	���ó���Ͻ�	|	�̿����ֹ���ȣ	|
			*		   
			****************************************************************************/
			
			/* 	[MobileCanRes|����ID|���(y/n)|����޼���|����Ͻ�|�̿����ֹ���ȣ|] */
			$this->RESULT["rStoreId"] = $this->RecvValArray[1];
			$this->RESULT["rCancelSuccYn"] = $this->RecvValArray[2];
			$this->RESULT["rCancelResMsg"] = $this->RecvValArray[3];
			$this->RESULT["rCancelDate"] = $this->RecvValArray[4];
			$this->RESULT["rTid"] = $this->RecvValArray[5];						
			
		}
		else if( strcmp( $this->REQUEST["AuthTy"], "ars" ) == 0 )
		{
			/****************************************************************************
			*
			* [5] ARS ���� ���
			*
			* -- ��� ���� ���� ����
			* + �����ͱ���(6) + ������
			* + ������ ����(������ ������ "|"�� �ϸ� ��ȣȭProcess���� �ص����� �ǵ����͸� �����ϰ� �ȴ�.
			* |	ArsCanRes	|	��üID(20)	| ��������(1)	|	����޼���	|	���ó���Ͻ�	|	�̿����ֹ���ȣ	|
			*		   
			****************************************************************************/
			
			/* 	[ArsCanRes|����ID|���(y/n)|����޼���|����Ͻ�|�̿����ֹ���ȣ|] */
			$this->RESULT["rStoreId"] = $this->RecvValArray[1];
			$this->RESULT["rCancelSuccYn"] = $this->RecvValArray[2];
			$this->RESULT["rCancelResMsg"] = $this->RecvValArray[3];
			$this->RESULT["rCancelDate"] = $this->RecvValArray[4];
			$this->RESULT["rTid"] = $this->RecvValArray[5];						
			
		}
		else
		{
			$this->log->WriteLog( INFO, $this->REQUEST["AuthTy"]." "."Parse CancelMSG Passed " );
			$this->RESULT["rCancelSuccYn"] = "n";
			$this->RESULT["rCancelResMsg"] = "Cannot Cancel AuthTy[".$this->REQUEST["AuthTy"]."]";	
			return false;
		}
		$this->log->WriteLog( INFO, "Parse Cancel Msg End" );
		return true;
	}


	/*
		����� ��û                       
	*/
 	function NetCancel() 
	{
		$this->log->WriteLog( WARN, $this->REQUEST["AuthTy"]. "-" .$this->REQUEST["SubTy"]." Cancel Start");
		
		if( $this->REQUEST["UseNetCancel"] == "true" || $this->REQUEST["Type"] == "Cancel" )
		{
			$this->log->WriteLog( WARN, "Cancel Reason : ".$this->REQUEST["CancelMsg"]);	
			
			if( !($this->MakeCancelMsg()) )
			{
				$this->log->WriteLog( ERROR, "Make CancelMsg Error");
				return false;
			}
			if( !($this->SendRecvMsg()) )
			{
				$this->log->WriteLog( ERROR, "Send & Recv Msg Error");
				return false;
			}
			if( !($this->ParseCancelMsg()) )
			{
				$this->log->WriteLog( ERROR, "ParseCancelMsg Error");
				return false;
			}
			if( $this->RESULT["rCancelSuccYn"] == "y")
			{
				$this->log->WriteLog( WARN, "Cancel Success");
			}
			else
			{
				$this->log->WriteLog( FATAL, "Cancel FAIL");
			}
		}
		else
		{
			$this->log->WriteLog( WARN, "Cancel Passed (UseNetCancel value Is false)");
		}
		
		$this->log->WriteLog( WARN, $this->REQUEST["AuthTy"]."-".$this->REQUEST["SubTy"]." Cancel End");
		
		if($this->RESULT["rCancelSuccYn"] == "y"){
			//��������� ���з� ����
			$this->SetPayResult( "rSuccYn", "n" );
			$this->SetPayResult( "rResMsg", $this->REQUEST["CancelMsg"] );
			return true;
		}else{
			return false;
		}
		
	}

	/*
		������ Ȯ�ο�û                       
	*/
 	function checkPayResult( $TID ) 
	{
		/*
			Log ��� ��ü����						
   		*/
		$this->log = new PayLog( $this->REQUEST );
		if(!$this->log->InitLog()) 
		{
			$this->ERRMSG .= "�α������� ������ �����ϴ�.[".$this->REQUEST["AgsPayHome"]."]" ; 
			$this->RESULT["rSuccYn"] = "n";
			$this->RESULT["rResMsg"] = $this->ERRMSG;
			$this->RESULT["rCancelSuccYn"] = "n";
			$this->RESULT["rCancelResMsg"] = $this->ERRMSG;
			return false;
		}

		$this->log->WriteLog( INFO, "[".$TID."] Check PayResult Start");
		
		
		//"AEGIS_".$TidTp . $this->REQUEST["StoreId"] . $datestr . rand(100,999);
				
		switch(substr($TID,6,4)){
		  case("ISP_"): 			// �ſ�ī�� ISP
			$this->REQUEST["AuthTy"] = "card" ;
			$this->REQUEST["SubTy"] = "isp" ;
			break;
		  case("VISA"): 			// �ſ�ī�� �Ƚ�Ŭ��/�Ϲ�
			$this->REQUEST["AuthTy"] = "card" ;
			$this->REQUEST["SubTy"] = "visa3d" ;
			break;
		  case("IBK_"): 			// ���ͳݹ�ŷ
			$this->REQUEST["AuthTy"] = "iche" ;
			break;
		  case("TBK_"): 			// �ڷ���ŷ
			$this->REQUEST["AuthTy"] = "iche" ;
			break;
		  case("VIR_"): 			// �������
			$this->REQUEST["AuthTy"] = "virtual" ;
			break;
		  case("HPP_"): 			// �޴��� ����
			$this->REQUEST["AuthTy"] = "hp" ;
			break;
		  case("ARS_"): 			// ARS ��ȭ����
			$this->REQUEST["AuthTy"] = "ars" ;
			break;
		  default: 			// ��Ȯ�� �������
			$this->REQUEST["AuthTy"] = "unknown" ;
			break;
		}  
		
		/****************************************************************************
		* ���� ���� Make
		****************************************************************************/
		$this->ENCTYPE = "I";
		
		$this->sDataMsg = $this->ENCTYPE.
			"PayInfo"."|".
			$this->REQUEST["StoreId"]."|".
			$TID."|";

		$this->sSendMsg = sprintf( "%06d%s", strlen( $this->sDataMsg ), $this->sDataMsg );
		
		if( !($this->SendRecvMsg()) )	//������ ���� �ŷ���� Ȯ��
		{
			if( !($this->SendRecvMsgWeb()) )	//���� ���� �ŷ���� Ȯ��
			{
				
			}
		}
		
		if( !($this->ParseMsg()) )
		{
			$this->log->WriteLog( ERROR, "Parse Check PayResult Error");
			return false;
		}
		
		$this->log->WriteLog( INFO, "[".$TID."] Check PayResult End");
		
		$this->writeLogArray($this->RESULT);

		//log ��ü �ݱ�
		$this->log->CloseLog( $this->GetResult("rResMsg") );

		return true;
	}



 	function SetValue( $key, $val ) 
	{
		$this->REQUEST[$key] = $val;
	}


 	function GetResult( $name ) 
	{
		$result = $this->RESULT[$name];
		if( strlen($result) == 0 || $result == "") $result = $this->REQUEST[$name];
		return $result;

		// if(array_key_exists($name, $this->RESULT))
		// {
		// 	return $this->RESULT[$name];
		// }else{
		// 	return $this->REQUEST[$name];
		// }
	}


 	function SetPayResult( $key, $val ) 
	{
		$this->RESULT[$key] = $val;
	}


	function MakeNetCancID()
	{
		$this->log->WriteLog( INFO, "Make NetCancel ID Start" );
		switch($this->REQUEST["AuthTy"]){
		  case("card"): 			// �ſ�ī��
			if( strcmp( $this->REQUEST["SubTy"], "isp" ) == 0 )	$TidTp = "ISP_"; else  $TidTp = "VISA"; 
			break;
		  case("iche"): 		// ���� ���� ��ü (IBK:���ͳݹ�ŷ, TBK:�ڷ���ŷ)
			if( strcmp( $this->REQUEST["ICHE_SOCKETYN"], "Y" ) == 0 ) $TidTp = "IBK_"; else $TidTp = "TBK_";
			break;
		  case("virtual"): 		// �������
			$TidTp = "VIR_"; break;
		  case("hp"): 			// �޴��� ����
			$TidTp = "HPP_"; break;
		  case("ars"): 			// ARS ��ȭ����
			$TidTp = "ARS_"; break;
		  default:        	
			$TidTp = "UNKW";	//��Ȯ�� �������
		}

		list($usec, $sec) = explode(" ", microtime());
		$datestr = date("YmdHis", $sec).substr($usec,2,3); //YYYYMMDDHHMMSSSSS

		//TID�� �ּ� 31�ڸ� ,�ִ� 51�ڸ��� ���� �ʴ´�.
		$this->RESULT["NetCancID"] = "AEGIS_".$TidTp . $this->REQUEST["StoreId"] . "_" . $datestr . rand(100,999);
		if( (!strlen( $this->RESULT["NetCancID"] ) >= 31 && strlen( $this->RESULT["NetCancID"] ) <= 51) )
		{
			$this->log->WriteLog( ERROR, $this->RESULT["NetCancID"]);
			return false;
		}
		$this->log->WriteLog( INFO, $this->RESULT["NetCancID"]);
		$this->log->WriteLog( INFO, "Make NetCancel ID End" );
		return true;
	}

	function SetErrorMsg($rSuccYn,$rResMsg)
	{	
		$this->log->WriteLog( INFO, "Set Result Msg Start");
		$this->RESULT["rSuccYn"] = $rSuccYn;
		$this->RESULT["rResMsg"] = $rResMsg;
		$this->log->WriteLog( INFO, "Set Result Msg End");
	}


	function encrypt_aegis( $OrgData )
	{
		$this->log->WriteLog( INFO, "Encrypt Start");
		if( empty( $OrgData ) || $OrgData == "" ) 
		{
			$this->log->WriteLog( INFO, "Encrypt End");
			return "";
		}
		
		$temp = "";
		for( $i = 0; $i < strlen( $OrgData ); $i++ )
		{
			$temp .= substr( $OrgData, (strlen( $OrgData ) - 1) - $i, 1 );
		}

		//print "Reverse data : ".$temp."<br>";

		$one_char = "";
		$EncData  = "";
		for( $i = 0; $i < strlen( $temp ); $i++ )
		{
			$one_char = substr( $temp, $i, 1 );
			$EncData  .= ($one_char + $i * 77) % 10 ;
		}

		//print "Enc Data : ".$EncData."<br>";

		$this->log->WriteLog( INFO, "Encrypt End");

		return $EncData;
	}

	/*
		���ڿ� ����
	*/
	function format_string($TSTR,$TLEN,$TAG)
	{
		if ( !isset($TSTR) ) 
		{
			for ( $i=0 ; $i < $TLEN ; $i++ ) 
			{
				if( $TAG == 'Y' ) 
				{
					$TSTR = $TSTR.chr(32);
				} 
				else 
				{
					$TSTR = $TSTR.'+';
				}
			}
		}
		
		$TSTR = trim($TSTR);
		
		$TSTR = stripslashes($TSTR); 
		
		// �Է��ڷᰡ ���̺��� �� ��� �ڸ��� �ѱ�ó��
		
		if ( strlen($TSTR) > $TLEN ) 
		{
			// $flag == 1 �̸� �� ����Ʈ�� �ѱ��� ���� ����Ʈ �̶� �ű���� �ڸ��� �Ǹ� 
			// �ѱ��� ������ �Ǵ� ������ �߻��մϴ�. 
			
			$flag = 0;
			
			for($i=0 ; $i< $TLEN ; $i++) 
			{ 
				$j = ord($TSTR[$i]); // ������ ASCII ���� ���մϴ�. 
									 // ���� ASCII���� 127���� ũ�� �� ����Ʈ�� �ѱ��� ���۹���Ʈ�̰ų� ������Ʈ(?)��� ������. 
				if($j > 127) 
				{ 
					if( $flag ) $flag = 0; // $flag ���� �����Ѵٴ� ���� �̹� ���ڴ� �ѱ��� ������Ʈ�̱� ������ 
										   // $flag �� 0���� ���ݴϴ�. 
					else $flag = 1;        // ���� �������� ������ �ѱ��� ���۹���Ʈ����. �׷��Ƿ� $flag �� 1! 
				}
				else $flag = 0; // �ٸ� ���ڳ� �����϶��� �׳� �Ѿ�� �ǰ���. 
			} 
			if( $flag ) 
			{
				// �̷��� �ؼ� ������ ���ڱ����� $flag�� ����ؼ� $flag�� �����ϸ� 
				$TSTR = substr($TSTR, 0, $TLEN - 1);
				if( $TAG == 'Y' ) 
				{
					$TSTR = $TSTR.chr(32);
				}
				else 
				{
					$TSTR = $TSTR.'+';
				}
			} 
			else 
			{
				// �ѹ���Ʈ�� ���ؼ� �ڸ����� ���� �ڸ����� �ؾ߰���. 
				$TSTR = substr($TSTR, 0, $TLEN); // �ƴ� ����.... 
			}
			
			return $TSTR; // ���� ������ ��Ʈ���� ��ȯ�մϴ�.   
			
			// �Է��ڷᰡ ���̺��� ���� ��� SPACE�� ä���
		} 
		else if ( strlen($TSTR) < $TLEN ) 
		{ 
			$TLENGTH = strlen($TSTR);
			for ( $i=0 ; $i < $TLEN - $TLENGTH; $i++ ) 
			{
				if( $TAG == 'Y' ) 
				{
					$TSTR = $TSTR.chr(32);
				} 
				else 
				{
					$TSTR = $TSTR.'+';
				}
			}
			
			return ($TSTR);
			
			// �Է��ڷᰡ ���̿� �������
		} 
		else if ( strlen($TSTR) == $TLEN ) 
		{
			return ($TSTR);  
		}
	}

	/* 
		�Է��� ���ڰ� ���ھƽ�Ű���� �ش��ϴ��� �Ǵ�.
	*/
	function IsNumber($word)
	{
		
		for($i = 0; $i < strlen($word); $i++)
		{
			$wordNum = ord( substr( $word, $i, 1 ) );

			if( $wordNum < 48 || $wordNum > 57 ) 
			{
				return false;
			}

		}

		return true;
	}
	/* 
		��� �޼���
	*/
	function AlertMsg( $msg , $go=0)
	{

		$msg = str_replace( "\"" ,"'" ,$msg );
		$msg = str_replace( "\n" ,"\\n" ,$msg );
		print "<script language='javascript'>";
		print "alert( '".$msg."' );";
		if( $go < 0 )
			print "history.go( ".$go." );";
		print "</script>";

	}
	function HistoryGo( $go )
	{
		print "<script language='javascript'>";
		print "history.go( ".$go." );";
		print "</script>";
	}

	function AlertExit( $msg )
	{

		AlertMsg( $msg );
		exit;

	}

	function AlertGoBack( $msg )
	{
		
		AlertMsg( $msg, -1);
		exit;
	}

}

/**************************************************************************************
*
* �ô�����Ʈ �����α� ��� Ŭ����
* 
***************************************************************************************/	
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
	var $REQUEST = array();

	function __constructor( $request )
	{	
		return 
		$this->debug_msg = array( "", "FATAL", "ERROR", "WARN", "INFO", "DEBUG"  );
		$this->log = $request["log"];
		$this->logLevel = $request["logLevel"];
		$this->homedir = app_path('Library/Ags');
		$this->StoreId = $request["StoreId"];
		$this->starttime=GetTime();
	}
	function InitLog() 
	{

		if( $this->log == "false" ) return true;

		$logfile = app_path('Library/Ags') . "/log/AgsPay40_php_". $this->StoreId. "_".date("ymd").".log";
		//$logfile = $logfile = storage_path('framework') . "/log/AgsPay40php_".$this->StoreId."_".date("ymd").".log";
		
		$this->log_fd = fopen( $logfile, "a+" );
		if( !$this->log_fd ) return false;
		$this->WriteLog( INFO, "===============================================================" );
		$this->WriteLog( INFO, "START AgsPay40php (OS:". php_uname('s').php_uname('r').",PHP:".phpversion() . ")" );

		return true;
	}
	function WriteLog($debug, $data) 
	{
		if( $this->log == "false" || !$this->log_fd ) return;

		if(strtoupper($this->logLevel) === "FATAL") $logLevel_int = 1;
		if(strtoupper($this->logLevel) === "ERROR") $logLevel_int = 2;
		if(strtoupper($this->logLevel) === "WARN") $logLevel_int = 3;
		if(strtoupper($this->logLevel) === "INFO") $logLevel_int = 4;
		if(strtoupper($this->logLevel) === "DEBUG") $logLevel_int = 5;
		
		if( $debug > 4 ){	return;    	}

		$prefix = $this->debug_msg[$debug]."\t[" . $this->SetTimeStamp() . "] <" . getmypid() . "> ";
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

		$Transaction_time = $this->GetTime() - $this->starttime;
		$this->WriteLog( INFO, "END Pay". $msg ." Transaction time:[".round($Transaction_time,3)."sec]" );
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
?>