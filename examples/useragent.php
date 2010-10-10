<?php
require_once '../src/osapi.php';
$consumerKey = 'CONSUMER_KEY';
$consumerSecret = 'CONSUMER_SECRET';
$cookieKey = 'vz_' . $consumerKey;

// Enable logger.
osapiLogger::setLevel(osapiLogger::INFO);
osapiLogger::setAppender(new osapiConsoleAppender());

$provider = new osapiVzOAuth2Provider(osapiVzOAuth2Provider::STUDIVZ);
$storage = new osapiFileStorage('/tmp/osapi');

$auth = new osapiOAuth2UserAgent($consumerKey, $consumerSecret, $storage, $cookieKey, $provider);

if ($auth->hasAccessToken()) {
    $osapi = new osapi($provider, $auth);
    var_dump($auth->getAccessToken()->getuser_id());
    // Start a batch so that many requests may be made at once.
    $batch = $osapi->newBatch();

    // Fetch the current user.
    $self_request_params = array(
      'userId' => '@me',        // Person we are fetching.
      'groupId' => '@self',     // @self for one person.
      'fields' => array('addresses')       // Which profile fields to request.
    );

    $batch->add($osapi->people->get($self_request_params), 'self');

    $result = $batch->execute();

    $content = 'Hello ' . $result['self']['result']['displayName'];
} else {
    $content = '<a href="javascript:;" onclick="login()"><img src="../www/VZ_login01.png" border="0" /></a>';
}
?>
<html>
    <head>
        <link rel="stylesheet" href="../www/connect.css" type="text/css" >
    </head>
    <body>
        <?php
            echo $content;
        ?>
        <script type="text/javascript" src="../www/connect.js"></script>
        <script type="text/javascript">
            function login() {
                vz.connect.call(["addresses"],"message","state");
            }
            vz.connect.clientId = '<?= $consumerKey ?>';
            vz.connect.cookieKey = '<?= $cookieKey ?>';
            vz.connect.callbackUrl = 'http://localhost:8062/vz_php_os_clientlibrary/www/callback.html';
        </script>
    </body>
</html>