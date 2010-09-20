<?php
/**
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

/**
 * Allows for overwriting the preRequestProcess method on a provider.
 */
class MockProvider extends osapiProvider {
  private $preRequestProcessCallback;

  /**
   * Creates a new MockProvider
   *
   * @param osapiHttpProvider $httpProvider Provider to use.  For unit testing
   *     this is best set as an osapiLocalHttpProvider.
   */
  public function __construct($httpProvider) {
    parent::__construct('http://example.com/OAuthGetRequestToken',
                        'http://example.com/OAuthAuthorizeToken',
                        'http://example.com/OAuthGetAccessToken',
                        'http://example.com/api/',
                        'http://example.com/api/rpc',
                        "Example", true, $httpProvider);
  }

  /**
   * {@inheritdoc}
   */
  public function preRequestProcess(&$request, &$method, &$url, &$headers, osapiAuth &$signer) {
    if (isSet($this->preRequestProcessCallback)) {
      $params = array(&$request, &$method, &$url, &$headers, &$signer);
      call_user_func_array($this->preRequestProcessCallback, $params);
    }
  }

  /**
   * Assigns a preRequestProcess callback function.
   *
   * @param mixed $callback Either a string or an array, as specified in the
   *     call_user_func_array PHP method documentation.
   */
  public function setPreRequestProcess($callback) {
    $this->preRequestProcessCallback = $callback;
  }
}

/**
 * Tests the osapiProvider implementation, mostly to verify that expectations
 * around preRequestProcess and postRequestProcess are met.
 */
class osapiProviderTest extends PHPUnit_Framework_TestCase {
  const TARGET_URL_VALUE = "http://test";
  const TARGET_TITLE_VALUE = "Test Title";
  
  private $httpProvider;
  private $restProvider;
  private $rpcProvider;

  /**
   * Sets up the environment before running a test.
   */
  protected function setUp() {
    $this->httpProvider = new osapiLocalHttpProvider();
    $this->restProvider = new MockProvider($this->httpProvider);
    $this->restProvider->rpcEndpoint = null;    
    $this->rpcProvider = new MockProvider($this->httpProvider);
  }
  
  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->httpProvider = null;
    $this->restProvider = null;
    $this->rpcProvider = null;
    parent::tearDown();
  }

  /**
   * Changes the current request URL.
   */
  public function changeUrl(&$request, &$method, &$url, &$headers, osapiAuth &$signer) {
    $url = self::TARGET_URL_VALUE;
  }

  /**
   * Test that changing the request url in a preProcessRequest handler actually
   * results in a request to the modified URL.
   */
  private function changeUrlInPreRequestProcess($httpProvider, $mockProvider) {
    // Change the url in the preRequestProcess event
    $mockProvider->setPreRequestProcess(array($this, 'changeUrl'));
    $auth = new osapiOAuth2Legged('test', 'data', '12345');
    $osapi = new osapi($mockProvider, $auth);

    // Return a successful response
    $httpProvider->addResponse('[{"data":null}]', 200);

    // Post an activity
    $batch = $osapi->newBatch();
    $activity = new osapiActivity('title', 'body');
    $batch->add($osapi->activities->create(array('userId' => '@me', 'groupId' => '@self', 'activity' => $activity)));
    $result = $batch->execute();

    // Ensure that the URL sent to the HTTP provider was actually changed.
    $request = $httpProvider->getLastRequest();
    $requestDomain = substr($request['url'], 0, strlen(self::TARGET_URL_VALUE));
    $this->assertEquals(self::TARGET_URL_VALUE, $requestDomain);
  }
  
  /**
   * Runs changeUrlInPreRequestProcess for REST.
   */
  public function testRestChangeUrlInPreRequestProcess() {
    $this->changeUrlInPreRequestProcess($this->httpProvider, $this->restProvider);
  }

  /**
   * Runs changeUrlInPreRequestProcess for RPC
   */
  public function testRpcChangeUrlInPreRequestProcess() {
    $this->changeUrlInPreRequestProcess($this->httpProvider, $this->rpcProvider);
  }


 /**
   * Changes the current request URL.
   */
  public function changeActivityParameter(&$request, &$method, &$url, &$headers, osapiAuth &$signer) {
    if (is_array($request)) {
      $req = $request[0];
    } else {
      $req = $request;
    }
    $this->assertArrayHasKey('activity', $req->params);
    $req->params['activity']->setTitle(self::TARGET_TITLE_VALUE);
  }

  /**
   * Test that changing the request body in a preProcessRequest handler actually
   * results in a modified body
   */
  private function changeBodyInPreRequestProcess($httpProvider, $mockProvider) {
    // Change the url in the preRequestProcess event
    $mockProvider->setPreRequestProcess(array($this, 'changeActivityParameter'));
    $auth = new osapiOAuth2Legged('test', 'data', '12345');
    $osapi = new osapi($mockProvider, $auth);

    // Return a successful response
    $httpProvider->addResponse('[{"data":null}]', 200);

    // Post an activity
    $batch = $osapi->newBatch();
    $activity = new osapiActivity('title', 'body');
    $batch->add($osapi->activities->create(array('userId' => '@me', 'groupId' => '@self', 'activity' => $activity)));
    $result = $batch->execute();

    // Ensure that the body was actually changed.
    $request = $httpProvider->getLastRequest();
    $titleIndex = strpos($request['body'], self::TARGET_TITLE_VALUE);

    $this->assertTrue($titleIndex !== false);
    $this->assertGreaterThan(0, $titleIndex);
  }

  /**
   * Runs changeBodyInPreRequestProcess for REST.
   */
  public function testRestChangeBodyInPreRequestProcess() {
    $this->changeBodyInPreRequestProcess($this->httpProvider, $this->restProvider);
  }

  /**
   * Runs changeBodyInPreRequestProcess for RPC
   */
  public function testRpcChangeBodyInPreRequestProcess() {
    $this->changeBodyInPreRequestProcess($this->httpProvider, $this->rpcProvider);
  }
}

