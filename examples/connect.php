<?php
// Require the osapi library
require_once "../src/osapi.php";

// Enable logger.
osapiLogger::setLevel(osapiLogger::INFO);
osapiLogger::setAppender(new osapiConsoleAppender());

$consumerKey    = 'CONSUMER_KEY';
$consumerSecret = 'CONSUMER_SECRET';
$callbackUrl    = 'CALLBACK_URL';

// needed to scope the access token storage
$localUserId    = '';

$storage  = new osapiFileStorage('/tmp/osapi');
$provider = new osapiVzOAuth2Provider(osapiVzOAuth2Provider::STUDIVZ); 

if (isset($_GET['platform']) && $_GET['platform'] === 'schuelervz') {
    $provider = new osapiVzOAuth2Provider(osapiVzOAuth2Provider::SCHUELERVZ);
}

$auth     = osapiOAuth2::performOAuthLogin($consumerKey, $consumerSecret, $storage, $provider, $callbackUrl,
        'openid',
        array('gender', 'emails', 'thumbnailUrl'),
        'my custom message',
        'state',
        $localUserId);

if ($auth->getAccessToken()->getplatform() === 'schuelervz') {
    $provider = new osapiVzOAuth2Provider(osapiVzOAuth2Provider::SCHUELERVZ);
}

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