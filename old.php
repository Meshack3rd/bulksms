<?php

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

require __DIR__ . "/vendor/autoload.php";


function sms($a, $b){
	$baseUrl="ggx5k8.api.infobip.com";

	$ch = curl_init($baseUrl);
	$data= array('api_key' =>'3dd493c8d0c8bb1e77ef96d71cbb81e3-b45fb368-17d9-4c02-86eb-683162fbe304' ,
	'username' =>'meshackomwoyo' ,
	//'sender_id' =>'123456' ,
	'message' =>$a ,
	'phone' =>$b );
	$payload = json_encode($data);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	echo "Result ".$result;
	curl_close($ch);
	
}

switch($action) {
	case 'bulky':
	$fileName = $_FILES["myfile"]["tmp_name"];

	if ($_FILES["myfile"]["size"] > 0) {
		
		$file = fopen($fileName, "r");

		set_time_limit(300);
		
		while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

			if($column[1] == "1"){
				$column[1] = 0;
				}
			$to = $column[1];
			sms($msg, $to);
		}
	echo '<script language="javascript">';
	echo 'alert("Marks added successfully")';
	echo '</script>';
	}
	
	break;
	
	case 'single':
		$to = $_POST['phone'];
		sms($msg, $to);
	break;
}
		
?>


