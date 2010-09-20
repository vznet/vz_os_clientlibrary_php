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
 * osapiMessage test case.
 */
class osapiMessageTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiMessage
   */
  private $osapiMessage;
  private $recipients;

  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->recipients = array('a', 'b');
    $this->osapiMessage = new osapiMessage($this->recipients, 'BODY', 'TITLE', 'NOTIFICATION');
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->recipients = null;
    $this->osapiMessage = null;
    parent::tearDown();
  }
  
  /**
   * Tests osapiMessage->__construct()
   */
  public function test__constructWithoutRecipients() {
    $this->setExpectedException('osapiException');
    $message = new osapiMessage(null, 'BODY', 'TITLE', 'NOTIFICATION');
  }

  /**
   * Tests osapiMessage->getBody()
   */
  public function testGetBody() {
    $this->assertEquals('BODY', $this->osapiMessage->getBody());
  }

  /**
   * Tests osapiMessage->getTitle()
   */
  public function testGetTitle() {
    $this->assertEquals('TITLE', $this->osapiMessage->getTitle());
  }

  /**
   * Tests osapiMessage->getType()
   */
  public function testGetType() {
    $this->assertEquals('NOTIFICATION', $this->osapiMessage->getType());
  }

  /**
   * Tests osapiMessage->sanitizeHTML()
   */
  public function testSanitizeHTML() {
    $this->assertEquals('ABC', $this->osapiMessage->sanitizeHTML('ABC'));
  }

  /**
   * Tests osapiMessage->setBody()
   */
  public function testSetBody() {
    $this->osapiMessage->setBody('body');
    $this->assertEquals('body', $this->osapiMessage->body);
  }

  /**
   * Tests osapiMessage->setTitle()
   */
  public function testSetTitle() {
    $this->osapiMessage->setTitle('title');
    $this->assertEquals('title', $this->osapiMessage->title);
  }

  /**
   * Tests osapiMessage->setType()
   */
  public function testSetType() {
    $this->osapiMessage->setType('EMAIL');
    $this->assertEquals('EMAIL', $this->osapiMessage->type);
  }
}
