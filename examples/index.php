<html>
  <head>
    <title>VZ OpenSocial/Connect PHP Client Library Examples</title>
  </head>
  <body>
    <h1>VZ OpenSocial/Connect PHP Client Library Examples</h1>
    <p>The following examples show how to use the client library with the VZ OpenSocial container.  You can find the source for
       each in the <code>examples</code> directory in the client library distribution.</p>
    <p><strong>Note:</strong> In order to run these tests you have to provide a valid consumerKey, consumerSecret and in
        some cases callback url or OpenSocial User ID to the test.</p>
    <p><strong>Note:</strong> Some tests use 3-legged OAuth, meaning that you may be redirected to a page to enter your
       social network credentials.  Once you enter your credentials, you will be redirected back to the sample, and
       the sample will run with your own data from the social network.  The OpenSocial client libraries do <u>not</u>
       have access to your password, and do not store the information returned by the queries for these examples.</p>
    <h2>List of samples</h2>
    <ul>
      <li><a href="connect.php">OAuth2 Web Flow, retrieving user data</a></li>
      <li><a href="useragent.php">OAuth2 UserAgent Flow, retrieving user data</a></li>
      <li><a href="twolegged_notification.php">OAuth1 Two Legged, sending notification</a></li>
      <li><a href="twolegged_user.php">OAuth1 Two Legged, retrieving user data</a></li>
      <li><a href="threelegged_user.php">OAuth1 Three Legged, retrieving user data</a></li>
    </ul>
  </body>
</html>
