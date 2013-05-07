<?php
	// Main voice request TwiML

	require 'twilio-php/Services/Twilio.php';
	$ini_array = parse_ini_file("beacon.ini");
	$auth_code = $ini_array["dial_in_auth_code"];

	$response = new Services_Twilio_Twiml();
	$gather = $response->gather(array('numDigits' => strlen($auth_code), 'action' => 'record.php'));
	if (isset($_GET['failedLogin'])) {
		$gather->say("Wrong code. Please try again.");
	} else {
		$gather->say("Input authorization code.");
	}
	print $response;

?>