<?php
	// Records message and initiates broadcast if auth'd, forwards to intro otherwise. 

	require 'twilio-php/Services/Twilio.php';
	$ini_array = parse_ini_file("beacon.ini");
	$inputted_code = $_POST["Digits"];

	if ($inputted_code == $ini_array["dial_in_auth_code"]) {
		$response = new Services_Twilio_Twiml();
		$record = $response->record(array('action' => 'broadcast.php', 'finishOnKey' => '#', 'playBeep' => true));
		$record->say("After you've inputted your message, press pound.");
	} else {
		header("Location: intro.php?failedLogin=1");
	}

	print $response;

?>