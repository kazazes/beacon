<?php
	include_once('bitly.php');

	require 'twilio-php/Services/Twilio.php';
	$ini_array = parse_ini_file("beacon.ini");


	$message_url = $_POST['RecordingUrl'];
	$shortener = new Bitly($ini_array["bitly_login"], $ini_array["bitly_token"]);
	$bitly_response = $shortener->shorten($message_url);
	$short_url = $bitly_responsep['url'];


	// Twilio REST API version
    $version = "2010-04-01";

    $sid = $ini_array["api_sid"];
    $token = $ini_array["api_token"];

    // Instantiate a new Twilio Rest Client
    $client = new Services_Twilio($sid, $token, $version);

    foreach ($ini_array[contacts] as $number) {
    	$call = $client->account->calls->create(
            $ini_array[authd_phone], // The number of the phone initiating the call
            $number, // The number of the phone receiving call
            $ini_array["application_root"] . 'replay.php' . '?playbackUrl=' . urlencode($message_url)  // The URL Twilio will request when the call is answered
        );

        $sms = $client->account->sms_messages->create (
        	$ini_array["authd_phone"], $number, str_replace("&url", $short_url, $ini_array["sms_text"])
        );
    }

    $response = new Services_Twilio_Twiml();
	$response->say('Sending your message now to ' . count($ini_array[contacts])) . ' people.';
	print $response;
?>