<?php
	// Generates TwiML for broadcast calls based on passed URL

	require 'twilio-php/Services/Twilio.php';
	$ini_array = parse_ini_file("beacon.ini");


	$response = new Services_Twilio_Twiml();
	$response->say($ini_array[call_text]);
	$response->play(urldecode($_GET['playbackUrl']), array("loop" => 0));
	print $response;

?>