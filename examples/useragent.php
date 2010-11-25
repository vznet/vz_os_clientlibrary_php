<?php
require_once '../src/osapi.php';
$consumerKey = 'CONSUMER_KEY';
$consumerSecret = 'CONSUMER_SECRET';
$cookieKey = 'vz' . $consumerKey;

// Enable logger.
osapiLogger::setLevel(osapiLogger::INFO);
osapiLogger::setAppender(new osapiConsoleAppender());

$provider = new osapiVzOAuth2Provider(osapiVzOAuth2Provider::STUDIVZ);
$storage = new osapiFileStorage('/tmp/osapi');

$auth = new osapiOAuth2UserAgent($consumerKey, $consumerSecret, $storage, $cookieKey, $provider);

$content = '';

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
}
?>
<html>
    <head>
        <script src="http://static.pe.studivz.net/Js/id/v2/library.js"
            data-authority="platform-redirect.vz-modules.net/r"
            data-authorityssl="platform-redirect.vz-modules.net/r" type="text/javascript"></script>
    </head>
    <body>
        <?php
            echo $content;
        ?>
        <script type="text/javascript">
            function login(c) {
                if (c.error) {
                    alert(c.error);
                    return;
                }

                var parameters = 'access_token=' + c.access_token;
                parameters += '&user_id=' + c.user_id;
                parameters += '&signature=' + c.signature;
                parameters += '&issued_at=' + c.issued_at;

                document.cookie = 'vz' + c.client_id + '=' + encodeURIComponent(parameters);
                window.location.reload();
         }
        </script>
        <script type="vz/login">
           client_id : <?= $consumerKey . PHP_EOL ?>
           redirect_uri : http://localhost:8062/vz_php_os_clientlibrary/www/callback.html
           callback : login
           fields : name,emails
        </script>
    </body>
</html>