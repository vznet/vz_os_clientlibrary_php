<?php
// Require the osapi library
require_once "../src/osapi.php";

$consumerKey    = 'CONSUMER_KEY';
$consumerSecret = 'CONSUMER_SECRET';
$callbackUrl    = 'CALLBACK_UR:';

$storage  = new osapiFileStorage('/tmp/osapi');
$provider = new osapiVzOAuthProvider(osapiVzOAuthProvider::STUDIVZ);
$auth     = osapiOAuth3Legged_10a::performOAuthLogin($consumerKey, $consumerSecret, $storage, $provider);
$osapi    = new osapi($provider, $auth);

// Enable logger.
osapiLogger::setLevel(osapiLogger::INFO);
osapiLogger::setAppender(new osapiConsoleAppender());

// Start a batch so that many requests may be made at once.
$batch = $osapi->newBatch();

// Fetch the current user.
$self_request_params = array(
  'userId' => '@me',              // Person we are fetching.
  'groupId' => '@self',           // @self for one person.
  'fields' => array()             // Which profile fields to request.
);

$batch->add($osapi->people->get($self_request_params), 'self');

$result = $batch->execute();

var_dump($result);