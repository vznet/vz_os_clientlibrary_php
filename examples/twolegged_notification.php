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

$initBody  = 'test body';
$initTitle = 'test title';
$notification  = new osapiMessage(array($userId), $initBody, $initTitle, $type = 'NOTIFICATION');


$self_request_params = array(
        'userId' => '@me',
        'groupId' => '@self',
        'message' => $notification,
);

$batch->add($osapi->messages->create($self_request_params), 'requestId');

$return = $batch->execute();

var_dump($return);