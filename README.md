# OpenSocial PHP Client Library

This library is based on the OpenSocial PHP client library and enhanced with
several VZ specific features and settings.

You can find the original library at:

http://code.google.com/p/opensocial-php-client/

## Using the library

Everything needed to use the library in a project is included in the 
{CLIENT ROOT}/src directory.  To use the library, make sure that the contents
of this directory are somewhere in your php include path and then place the
following line in your php script:

    require_once "osapi.php";


If you need to fudge your include path, sometimes it's handy to do something 
like

    set_include_path(get_include_path() . PATH_SEPARATOR . "path/to/library");

if you don't have easy access to php.ini.  Note that the samples use this 
method since they're meant to be run directly from a fresh and clean SVN
checkout.

The {CLIENT ROOT}/www directory includes any static files that are used e.g. for
the OAuth2 user agent flow.

## Samples

Example pages using the library are located in {CLIENT ROOT}/examples.  You
should be able to run them directly by unzipping or checking out the project
to a directory served by your PHP-enabled web server and inserting your consumer
credentials into the example scripts.

Usually you have to modify these lines that are on top of each example file:

    $consumerKey    = 'CONSUMER_KEY';
    $consumerSecret = 'CONSUMER_SECRET';
    $callbackUrl    = 'CALLBACK_URL';

Then just navigate to each  sample in a browser.


## Tests

Tests are meant to be run through a php command line, and not called directly
through the web browser. To run the unit tests from the command line:

    $ cd /path/to/client
    $ phpunit AllTests test/AllTests.php
  
(You need PHPUnit http://www.phpunit.de/ for the tests to run.)

For pretty reports, run:

    $ phpunit --coverage-html report AllTests test/AllTests.php
  
Then your reports will be in {CLIENT ROOT}/reports/index.html.
(You need Xdebug http://www.xdebug.org/ to generate pretty reports)

## Documentation

For full documentation on the VZ OpenSocial API, OAuth 1.0a and OAuth 2.0
authorization and VZ-Login go to:

http://developer.studivz.net/wiki