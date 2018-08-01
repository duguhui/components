<?php

	header("content-type:text/html;charset=utf-8");
	//接收URL传参
	$phoneNum = $_REQUEST['mobile']?$_REQUEST['mobile']:'13488774831';
	$content = $_REQUEST['content']?$_REQUEST['content']:'URL参数有问题';
	try {
    	$client = new SoapClient("http://10.165.223.208:80/SMSG/services/SMS?wsdl");

    	$smsid = 'UE09'.rand(pow(10,(7-1)), pow(10,7)-1).rand(pow(10,(7-1)), pow(10,7)-1).'0';

    	$xml = '<?xml version="1.0" encoding="utf-8"?>
        		<SMS type="send">
        		<Message SmsID="'.$smsid.'" Bid="hdwxwjk" RecvNum="'.$phoneNum.'" Content="'.$content.'" SendLevel="1"/>
        		</SMS>';
    	$code = 'POWERU-SMS';
    	$data = array('in0'=>$code,'in1'=>$xml);

    	$res = $client->AddSMSList($data);
		echo $res; 

	} catch (SOAPFault $e) {
	    print $e;
	}

  



 ?>
