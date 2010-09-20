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
 * osapiError test case.
 */
class osapiErrorTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiError
   */
  private $osapiErrorFail;
  private $errorCode;
  private $errorMessage;
  private $osapiErrorSuccess;
  private $winCode;
  private $winMessage;

  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->errorCode = 400;
    $this->errorMessage = true;
    $this->osapiErrorFail = new osapiError($this->errorCode, $this->errorMessage);
    
    $this->winCode = 200;
    $this->winMessage = true;
    $this->osapiErrorSuccess = new osapiError($this->winCode, $this->winMessage);
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapiErrorFail = null;
    $this->osapiErrorSuccess = null;
    parent::tearDown();
  }

  /**
   * Tests osapiError->getResult()
   */
  public function testGetFailedResult() {
    $this->setExpectedException('osapiException');
    $this->osapiErrorFail->getResult();
  }
  
  /**
   * Tests osapiError->getResult()
   */
  public function testGetSuccessfulResult() {
    $this->osapiErrorSuccess->getResult();
  }
  
  /**
   * Tests osapiError->hadError()
   */
  public function testDoHaveError() {
    $this->assertTrue($this->osapiErrorFail->hadError());
  }
  
  /**
   * Tests osapiError->hadError()
   */
  public function testNotHaveError() {
    $this->assertFalse($this->osapiErrorSuccess->hadError());
  }

  /**
   * Tests osapiError->getErrorMessage()
   */
  public function testGetErrorMessage() {
    $this->assertTrue($this->osapiErrorFail->getErrorMessage());
    $this->assertTrue($this->osapiErrorSuccess->getErrorMessage());
  }
}
