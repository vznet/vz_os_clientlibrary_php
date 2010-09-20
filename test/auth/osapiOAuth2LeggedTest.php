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
 * osapiOAuth2Legged test case.
 */
class osapiOAuth2LeggedTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiOAuth2Legged
   */
  private $osapiOAuth2Legged;
  private $consumerKey;
  private $consumerSecret;
  private $accessToken;
  private $userId;
  
  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->consumerKey = 'KEY';
    $this->consumerSecret = 'SECRET';
    $this->accessToken = null;
    $this->userId = 'USER';
    $this->osapiOAuth2Legged = new osapiOAuth2Legged($this->consumerKey, $this->consumerSecret, $this->userId);
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapiOAuth2Legged = null;
    parent::tearDown();
  }
  
  /**
   * Tests osapiOAuth2Legged->sign()
   */
  public function testSignedGet() {
    $params = array('oauth_nonce' => md5(0), 'oauth_timestamp' => 0);
    
    $signed = $this->osapiOAuth2Legged->sign('GET', 'http://opensocial.org', $params);
    
    $this->assertRegExp("/xoauth_requestor_id=USER/", $signed);
    $this->assertRegExp("/oauth_nonce=cfcd208495d565ef66e7dff9f98764da/", $signed);
    $this->assertRegExp("/oauth_version=" . OAuthRequest::$version . "/", $signed);
    $this->assertRegExp("/oauth_consumer_key=KEY/", $signed);
    $this->assertRegExp("/oauth_signature_method=HMAC-SHA1/", $signed);
    $this->assertRegExp("/oauth_signature=0nNXJhu1WYOopsM9etsgIo3HtYw%3D/", $signed);
  }

  /**
   * Tests osapiOAuth2Legged->sign()
   */
  public function testSignedPost() {
    $params = array('oauth_nonce' => md5(0), 'oauth_timestamp' => 0);
    $post = '{"test" : 1}';

    $signed = $this->osapiOAuth2Legged->sign('POST', 'http://opensocial.org', $params, $post);

    $this->assertRegExp("/xoauth_requestor_id=USER/", $signed);
    $this->assertRegExp("/oauth_nonce=cfcd208495d565ef66e7dff9f98764da/", $signed);
    $this->assertRegExp("/oauth_version=" . OAuthRequest::$version . "/", $signed);
    $this->assertRegExp("/oauth_consumer_key=KEY/", $signed);
    $this->assertRegExp("/oauth_signature_method=HMAC-SHA1/", $signed);
    $this->assertRegExp("/oauth_signature=y919lRRlvaX9msr0zC7%2Fg8wkOvU%3D/", $signed);
  }
  
  /**
   * Tests osapiOAuth2Legged->sign() using the body hack method.
   */
  public function testSignedPostWithBodyHack() {
    $params = array('oauth_nonce' => md5(0), 'oauth_timestamp' => 0);
    $post = '{"test" : 1}';

    $this->osapiOAuth2Legged->setUseBodyHack(true);
    $signed = $this->osapiOAuth2Legged->sign('POST', 'http://opensocial.org', $params, $post);
    
    $this->assertRegExp("/xoauth_requestor_id=USER/", $signed);
    $this->assertRegExp("/oauth_nonce=cfcd208495d565ef66e7dff9f98764da/", $signed);
    $this->assertRegExp("/oauth_version=" . OAuthRequest::$version . "/", $signed);
    $this->assertRegExp("/oauth_consumer_key=KEY/", $signed);
    $this->assertRegExp("/oauth_signature_method=HMAC-SHA1/", $signed);
    $this->assertRegExp("/oauth_signature=hRCQb3dBwuD1PiRI8jVT6LHXO9s%3D/", $signed);
  }

  /**
   * Tests body hashed post requests
   */
  public function testHashedPost() {
    $params = array('oauth_nonce' => md5(0), 'oauth_timestamp' => 0);
    $post = '{"test" : 1}';

    $this->osapiOAuth2Legged->setUseBodyHash(true);
    $signed = $this->osapiOAuth2Legged->sign('POST', 'http://opensocial.org', $params, $post);
    
    $this->assertRegExp("/xoauth_requestor_id=USER/", $signed);
    $this->assertRegExp("/oauth_nonce=cfcd208495d565ef66e7dff9f98764da/", $signed);
    $this->assertRegExp("/oauth_version=" . OAuthRequest::$version . "/", $signed);
    $this->assertRegExp("/oauth_consumer_key=KEY/", $signed);
    $this->assertRegExp("/oauth_signature_method=HMAC-SHA1/", $signed);
    $this->assertRegExp("/oauth_signature=QDrz7ZiBsHKK37rhIwabWsOhZVE%3D/", $signed);
    $this->assertRegExp("/oauth_body_hash=" . urlencode(base64_encode(sha1($post, true))) . "/", $signed);
  }
  
  /**
   * Tests osapiOAuth2Legged->mergeParameters()
   */
  public function testMergeParametersWithNull() {
    $osapiOAuth2Legged = new osapiOAuth2Legged($this->consumerKey, $this->consumerSecret);
    
    $signed = $osapiOAuth2Legged->sign('GET', 'http://opensocial.org');
    $this->assertNotRegExp("/xoauth_requestor_id/", $signed);
  }
  
  /**
   * Tests osapiOAuth2Legged->mergeParameters()
   */
  public function testMergeParametersWithCustomUser() {
    $osapiOAuth2Legged = new osapiOAuth2Legged($this->consumerKey, $this->consumerSecret, $this->userId);
    
    $params = array('xoauth_requestor_id' => 'USER2');
    $signed = $osapiOAuth2Legged->sign('GET', 'http://opensocial.org', $params);
    $this->assertRegExp("/xoauth_requestor_id=USER2/", $signed);
  }
}
