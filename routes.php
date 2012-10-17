<?php
require('vendor/autoload.php');
ini_set('display_errors', 1);


$app = new Slim();

$config = array(
	'twilio_sid'    => '',
	'twilio_token'  => '',
	'twilio_number' => '',
);


$app->get('/', function () use ($app, $config) {

	// create our twiml object
	$response = new Services_Twilio_Twiml();

	// xml output
	header("content-type: text/xml");

	// let's do this
	$response->say('You are being enqueued');
	$response->enqueue('radio-callin-queue');
	

	echo $response;

});


$app->run();