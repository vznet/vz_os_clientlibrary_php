<?php
// Require the osapi library
require_once "../src/osapi.php";

// Enable logger.
osapiLogger::setLevel(osapiLogger::INFO);
osapiLogger::setAppender(new osapiConsoleAppender());

$consumerKey  = 'CONSUMER_KEY';
$consumerSecret = 'CONSUMER_SECRET';
$userId = 'USER_ID';

$provider = new osapiVzOAuthProvider(osapiVzOAuthProvider::STUDIVZ);

$auth = new osapiOAuth2Legged($consumerKey, $consumerSecret, $userId);

$osapi = new osapi($provider, $auth);

$batch = $osapi->newBatch();

// Fetch the current user.
$self_request_params = array(
  'userId' => '@me',              // Person we are fetching.
  'groupId' => '@self',           // @self for one person.
  'fields' => array()             // Which profile fields to request.
);

$batch->add($osapi->people->get($self_request_params), 'self');

$return = $batch->execute();


print_r($return);

