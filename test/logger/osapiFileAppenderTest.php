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
 * osapiFileAppenderTest test case.
 *
 * @author Anash P. Oommen
 */
class osapiFileAppenderTest extends PHPUnit_Framework_TestCase {
  const logFile = "/tmp/logs/osapi_test.log";
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
   * Tests osapiFileAppender::setLogFile() and osapiFileAppender::getLogFile()
   */
  public function testGetSetLogFile() {
    $appender = new osapiFileAppender(self::logFile);
    $this->assertEquals($appender->getLogFile(), self::logFile);

    $appender = new osapiFileAppender();
    $appender->setLogFile(self::logFile);
    $this->assertEquals($appender->getLogFile(), self::logFile);
  }

  /**
   * Tests osapiFileAppender::appendMessage()
   */
  public function testAppendMessage() {
    $fpt = fopen(self::logFile, "w");
    if ($fpt != NULL) {
      fclose($fpt);
    }
    $message = "Hello world";
    $appender = new osapiFileAppender(self::logFile);
    $appender->appendMessage(osapiLogger::INFO, "Hello world");

    $fpt = fopen(self::logFile, "r");
    if ($fpt != NULL) {
      $contents = fread($fpt, filesize(self::logFile));
      $this->assertEquals($contents, "[INFO][" . date(DATE_RFC822) .
          "] - $message\n");
      fclose($fpt);
    }
  }
}
