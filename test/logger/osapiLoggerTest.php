<?php
/**
 * Copyright 2009 Google Inc.
 *
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
 * osapiLogger test case.
 *
 * @author Anash P. Oommen
 */
class osapiLoggerTest extends PHPUnit_Framework_TestCase {
  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    parent::tearDown();
  }

  /**
   * Tests osapiLogger::setLevel() and osapiLogger::getLevel()
   */
  public function testGetSetLevel() {
    osapiLogger::setLevel(osapiLogger::WARN);
    $this->assertEquals(osapiLogger::getLevel(), osapiLogger::WARN);
    $this->setExpectedException('osapiLoggerException');
    osapiLogger::setLevel(-1);
    osapiLogger::setLevel(7);
    osapiLogger::setLevel("BOOM!");
    $this->setExpectedException('');
  }

  /**
   * Tests osapiLogger::getAppender(), osapiLogger::setAppender()
   */
  public function testGetSetAppender() {
    $appender = new osapiDummyAppender();
    osapiLogger::setAppender($appender);
    $this->assertEquals(osapiLogger::getAppender(), $appender);
  }

  /**
   * Tests osapiLogger::debug()
   */
  public function testAllLogFunctions() {
    $this->checkLogFunction(
        'debug', osapiLogger::DEBUG,
        array(osapiLogger::ALL, osapiLogger::DEBUG),
        array(osapiLogger::INFO, osapiLogger::WARN,
              osapiLogger::ERROR, osapiLogger::FATAL,
              osapiLogger::NONE));
    $this->checkLogFunction(
        'info', osapiLogger::INFO,
        array(osapiLogger::ALL, osapiLogger::DEBUG,
              osapiLogger::INFO),
        array(osapiLogger::WARN, osapiLogger::ERROR,
              osapiLogger::FATAL, osapiLogger::NONE));
    $this->checkLogFunction(
        'warn', osapiLogger::WARN,
        array(osapiLogger::ALL, osapiLogger::DEBUG,
              osapiLogger::INFO, osapiLogger::WARN),
        array(osapiLogger::ERROR, osapiLogger::FATAL,
              osapiLogger::NONE));
    $this->checkLogFunction(
        'error', osapiLogger::ERROR,
        array(osapiLogger::ALL, osapiLogger::DEBUG,
              osapiLogger::INFO, osapiLogger::WARN,
              osapiLogger::ERROR),
        array(osapiLogger::FATAL, osapiLogger::NONE));
    $this->checkLogFunction(
        'fatal', osapiLogger::FATAL,
        array(osapiLogger::ALL, osapiLogger::DEBUG,
              osapiLogger::INFO, osapiLogger::WARN,
              osapiLogger::ERROR, osapiLogger::FATAL),
        array(osapiLogger::NONE));
  }

  private function checkLogFunction($functionToTest, $levelToTest, $yesLevels,
      $noLevels) {
    $appender = new osapiDummyAppender();
    osapiLogger::setAppender($appender);
    $message = "Hello world";
    $logMessages =
        array("NONE", "DEBUG", "INFO", "WARN", "ERROR", "FATAL", "ALL");
    $oldLevel = osapiLogger::getLevel();

    foreach($yesLevels as $currentLevel) {
      $appender->lastLog = "";
      osapiLogger::setLevel($currentLevel);
      osapiLogger::$functionToTest($message);
      $this->assertEquals($appender->lastLog, "[" . $logMessages[$levelToTest]
          . "][" . date(DATE_RFC822) . "] - $message\n");
    }
    foreach($noLevels as $currentLevel) {
      $appender->lastLog = "";
      osapiLogger::setLevel($currentLevel);
      osapiLogger::$functionToTest($message);
      echo($appender->lastLog);
      $this->assertEquals($appender->lastLog, "");
    }

    osapiLogger::setLevel($oldLevel);
  }
}
