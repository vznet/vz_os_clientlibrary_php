<?php
// Require the osapi library
require_once "../src/osapi.php";

// Enable logger.
osapiLogger::setLevel(osapiLogger::INFO);
osapiLogger::setAppender(new osapiConsoleAppender());

$consumerKey    = 'CONSUMER_KEY';
$consumerSecret = 'CONSUMER_SECRET';
$callbackUrl    = 'CALLBACK_URL';

$storage  = new osapiFileStorage('/tmp/osapi');
$provider = new osapiVzOAuth2Provider(osapiVzOAuth2Provider::STUDIVZ);
$auth     = osapiOAuth2::performOAuthLogin($consumerKey, $consumerSecret, $storage, $provider, $callbackUrl,
        'openid',
        array('gender', 'emails', 'thumbnailUrl'),
        'my custom message',
        'state');

var_dump($auth->getAccessToken()->getstate());

$osapi    = new osapi($provider, $auth);

// Start a batch so that many requests may be made at once.
$batch = $osapi->newBatch();

// Fetch the current user.
$self_request_params = array(
  'userId' => '@me',          // Person we are fetching.
  'groupId' => '@self',       // @self for one person.
  'fields' => array()         // Which profile fields to request.
);

$batch->add($osapi->people->get($self_request_params), 'self');

$result = $batch->execute();

var_dump($result);