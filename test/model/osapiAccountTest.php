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
 * osapiAccount test case.
 */
class osapiAccountTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiAccount
   */
  private $osapiAccount;
  private $domain;
  private $userid;
  private $username;
  private $primary;

  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->domain = true;
    $this->userid = true;
    $this->username = true;
    $this->primary = true;
    $this->osapiAccount = new osapiAccount($this->domain, $this->userid, $this->username, $this->primary);
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapiAccount = null;
    parent::tearDown();
  }

  /**
   * Tests osapiAccount->getDomain()
   */
  public function testGetDomain() {
    $this->assertTrue($this->osapiAccount->getDomain());
  }
  
  /**
   * Tests osapiAccount->getUserid()
   */
  public function testGetUserid() {
    $this->assertTrue($this->osapiAccount->getUserid());
  }
  
  /**
   * Tests osapiAccount->getUsername()
   */
  public function testGetUsername() {
    $this->assertTrue($this->osapiAccount->getUsername());
  }
  
  /**
   * Tests osapiAccount->getPrimary()
   */
  public function testGetPrimary() {
    $this->assertTrue($this->osapiAccount->getPrimary());
  }
  
  /**
   * Tests osapiAccount->getPrimarySubValue()
   */
  public function testGetPrimarySubValue() {
    $this->assertTrue($this->osapiAccount->getPrimarySubValue());
  }
  
  /**
   * Tests osapiAccount->setDomain()
   */
  public function testSetDomain() {
    $this->osapiAccount->setDomain(true);
    $this->assertTrue($this->osapiAccount->domain);
  }
  
  /**
   * Tests osapiAccount->setUserid()
   */
  public function testSetUserid() {
    $this->osapiAccount->setUserid(true);
    $this->assertTrue($this->osapiAccount->userid);
  }
  
  /**
   * Tests osapiAccount->setUsername()
   */
  public function testSetUsername() {
    $this->osapiAccount->setUsername(true);
    $this->assertTrue($this->osapiAccount->username);
  }
  
  /**
   * Tests osapiAccount->setPrimary()
   */
  public function testSetPrimary() {
    $this->osapiAccount->setPrimary(true);
    $this->assertTrue($this->osapiAccount->primary);
  }
}
