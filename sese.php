<?php

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

require __DIR__ . "/vendor/autoload.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$message = $_POST["message"];
$phoneNumbers = explode("\n",$_POST["phoneNumbers"]);



$apiURL = "ggx5k8.api.infobip.com";
$apiKey = "3dd493c8d0c8bb1e77ef96d71cbb81e3-b45fb368-17d9-4c02-86eb-683162fbe304";

$configuration = new Configuration(host: $apiURL, apiKey:$apiKey);
$api = new SmsApi(config: $configuration);

$destinations = [];
foreach($phoneNumbers as $phoneNumber ){
    $phoneNumber = trim($phoneNumber);
    if(!empty($phoneNumber)){  
        $destination = new SmsDestination(to: $phoneNumber);
    }
}

$theMessage = new SmsTextualMessage(
	destinations: $destinations,
	text: $message,
	from: "meshack omwoyo"
);

$request = new SmsAdvancedTextualRequest(messages: [$theMessage]);
$response = $api->sendSmsMessage($request);

echo 'message sent';


}




?>
