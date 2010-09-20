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
 * osapiPerson test case.
 */
class osapiPersonTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiPerson
   */
  private $osapiPerson;

  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->osapiPerson = new osapiPerson('ID', 'NAME');
    $this->osapiPerson->aboutMe = 'ABOUTME';
    $this->osapiPerson->activities = 'ACTIVITIES';
    $this->osapiPerson->addresses = 'ADDRESSES';
    $this->osapiPerson->age = 'AGE';
    $this->osapiPerson->bodyType = 'BODYTYPE';
    $this->osapiPerson->books = 'BOOKS';
    $this->osapiPerson->cars = 'CARS';
    $this->osapiPerson->children = 'CHILDREN';
    $this->osapiPerson->currentLocation = 'CURRENTLOCATION';
    $this->osapiPerson->dateOfBirth = 'DATEOFBIRTH';
    $this->osapiPerson->drinker = 'HEAVILY';
    $this->osapiPerson->emails = 'EMAILS';
    $this->osapiPerson->ethnicity = 'ETHNICITY';
    $this->osapiPerson->fashion = 'FASHION';
    $this->osapiPerson->food = 'FOOD';
    $this->osapiPerson->gender = 'GENDER';
    $this->osapiPerson->happiestWhen = 'HAPPIESTWHEN';
    $this->osapiPerson->hasApp = 'HASAPP';
    $this->osapiPerson->heroes = 'HEROES';
    $this->osapiPerson->humor = 'HUMOR';
    $this->osapiPerson->interests = 'INTERESTS';
    $this->osapiPerson->jobInterests = 'JOBINTERESTS';
    $this->osapiPerson->jobs = 'JOBS';
    $this->osapiPerson->languagesSpoken = 'LANGUAGESSPOKEN';
    $this->osapiPerson->livingArrangement = 'LIVINGARRANGEMENT';
    $this->osapiPerson->lookingFor = 'FRIENDS';
    $this->osapiPerson->movies = 'MOVIES';
    $this->osapiPerson->music = 'MUSIC';
    $this->osapiPerson->networkPresence = 'NETWORKPRESENCE';
    $this->osapiPerson->nickname = 'NICKNAME';
    $this->osapiPerson->pets = 'PETS';
    $this->osapiPerson->phoneNumbers = 'PHONENUMBERS';
    $this->osapiPerson->politicalViews = 'POLITICALVIEWS';
    $this->osapiPerson->profileSong = 'PROFILESONG';
    $this->osapiPerson->profileUrl = 'PROFILEURL';
    $this->osapiPerson->profileVideo = 'PROFILEVIDEO';
    $this->osapiPerson->quotes = 'QUOTES';
    $this->osapiPerson->relationshipStatus = 'RELATIONSHIPSTATUS';
    $this->osapiPerson->religion = 'RELIGION';
    $this->osapiPerson->romance = 'ROMANCE';
    $this->osapiPerson->scaredOf = 'SCAREDOF';
    $this->osapiPerson->schools = 'SCHOOLS';
    $this->osapiPerson->sexualOrientation = 'SEXUALORIENTATION';
    $this->osapiPerson->smoker = 'SMOKER';
    $this->osapiPerson->sports = 'SPORTS';
    $this->osapiPerson->status = 'STATUS';
    $this->osapiPerson->tags = 'TAGS';
    $this->osapiPerson->thumbnailUrl = 'THUMBNAILSURL';
    $this->osapiPerson->timeZone = 'TIMEZONE';
    $this->osapiPerson->turnOffs = 'TURNOFFS';
    $this->osapiPerson->turnOns = 'TURNONS';
    $this->osapiPerson->tvShows = 'TVSHOWS';
    $this->osapiPerson->urls = 'URLS';
    $this->osapiPerson->isOwner = 'ISOWNER';
    $this->osapiPerson->isViewer = 'ISVIEWER';
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapiPerson = null;
    parent::tearDown();
  }

  /**
   * Tests osapiPerson->getAboutMe()
   */
  public function testGetAboutMe() {
    $this->assertEquals('ABOUTME', $this->osapiPerson->getAboutMe());
  }

  /**
   * Tests osapiPerson->getActivities()
   */
  public function testGetActivities() {
    $this->assertEquals('ACTIVITIES', $this->osapiPerson->getActivities());
  }

  /**
   * Tests osapiPerson->getAddresses()
   */
  public function testGetAddresses() {
    $this->assertEquals('ADDRESSES', $this->osapiPerson->getAddresses());
  }

  /**
   * Tests osapiPerson->getAge()
   */
  public function testGetAge() {
    $this->assertEquals('AGE', $this->osapiPerson->getAge());
  }

  /**
   * Tests osapiPerson->getBodyType()
   */
  public function testGetBodyType() {
    $this->assertEquals('BODYTYPE', $this->osapiPerson->getBodyType());
  }

  /**
   * Tests osapiPerson->getBooks()
   */
  public function testGetBooks() {
    $this->assertEquals('BOOKS', $this->osapiPerson->getBooks());
  }

  /**
   * Tests osapiPerson->getCars()
   */
  public function testGetCars() {
    $this->assertEquals('CARS', $this->osapiPerson->getCars());
  
  }

  /**
   * Tests osapiPerson->getChildren()
   */
  public function testGetChildren() {
    $this->assertEquals('CHILDREN', $this->osapiPerson->getChildren());
  }

  /**
   * Tests osapiPerson->getCurrentLocation()
   */
  public function testGetCurrentLocation() {
    $this->assertEquals('CURRENTLOCATION', $this->osapiPerson->getCurrentLocation());
  }

  /**
   * Tests osapiPerson->getDateOfBirth()
   */
  public function testGetDateOfBirth() {
    $this->osapiPerson->setBirthday('10/10/2010');
    $this->assertEquals('2010-10-10', $this->osapiPerson->getBirthday());
  }

  /**
   * Tests osapiPerson->getDrinker()
   */
  public function testGetDrinker() {
    //$drinker = new osapiEnumDrinker('HEAVILY');
    $this->osapiPerson->setDrinker('HEAVILY');
    $this->assertEquals('HEAVILY', $this->osapiPerson->getDrinker());
  }

  /**
   * Tests osapiPerson->getEmails()
   */
  public function testGetEmails() {
    $this->assertEquals('EMAILS', $this->osapiPerson->getEmails());
  
  }

  /**
   * Tests osapiPerson->getEthnicity()
   */
  public function testGetEthnicity() {
    $this->assertEquals('ETHNICITY', $this->osapiPerson->getEthnicity());
  }

  /**
   * Tests osapiPerson->getFashion()
   */
  public function testGetFashion() {
    $this->assertEquals('FASHION', $this->osapiPerson->getFashion());
  
  }

  /**
   * Tests osapiPerson->getFood()
   */
  public function testGetFood() {
    $this->assertEquals('FOOD', $this->osapiPerson->getFood());
  }

  /**
   * Tests osapiPerson->getGender()
   */
  public function testGetGender() {
    $this->osapiPerson->setGender('FEMALE');
    $this->assertEquals('FEMALE', $this->osapiPerson->getGender());
  }

  /**
   * Tests osapiPerson->getHappiestWhen()
   */
  public function testGetHappiestWhen() {
    $this->assertEquals('HAPPIESTWHEN', $this->osapiPerson->getHappiestWhen());
  }

  /**
   * Tests osapiPerson->getHasApp()
   */
  public function testGetHasApp() {
    $this->assertEquals('HASAPP', $this->osapiPerson->getHasApp());
  }

  /**
   * Tests osapiPerson->getHeroes()
   */
  public function testGetHeroes() {
    $this->assertEquals('HEROES', $this->osapiPerson->getHeroes());
  }

  /**
   * Tests osapiPerson->getHumor()
   */
  public function testGetHumor() {
    $this->assertEquals('HUMOR', $this->osapiPerson->getHumor());
  }

  /**
   * Tests osapiPerson->getId()
   */
  public function testGetId() {
    $this->assertEquals('ID', $this->osapiPerson->getId());
  }

  /**
   * Tests osapiPerson->getInterests()
   */
  public function testGetInterests() {
    $this->assertEquals('INTERESTS', $this->osapiPerson->getInterests());
  }

  /**
   * Tests osapiPerson->getIsOwner()
   */
  public function testGetIsOwner() {
    $this->assertEquals('ISOWNER', $this->osapiPerson->getIsOwner());
  
  }

  /**
   * Tests osapiPerson->getIsViewer()
   */
  public function testGetIsViewer() {
    $this->assertEquals('ISVIEWER', $this->osapiPerson->getIsViewer());
  }

  /**
   * Tests osapiPerson->getJobInterests()
   */
  public function testGetJobInterests() {
    $this->assertEquals('JOBINTERESTS', $this->osapiPerson->getJobInterests());
  }

  /**
   * Tests osapiPerson->getLanguagesSpoken()
   */
  public function testGetLanguagesSpoken() {
    $this->assertEquals('LANGUAGESSPOKEN', $this->osapiPerson->getLanguagesSpoken());
  }

  /**
   * Tests osapiPerson->getLivingArrangement()
   */
  public function testGetLivingArrangement() {
    $this->assertEquals('LIVINGARRANGEMENT', $this->osapiPerson->getLivingArrangement());
  }

  /**
   * Tests osapiPerson->getMovies()
   */
  public function testGetMovies() {
    $this->assertEquals('MOVIES', $this->osapiPerson->getMovies());
  }

  /**
   * Tests osapiPerson->getMusic()
   */
  public function testGetMusic() {
    $this->assertEquals('MUSIC', $this->osapiPerson->getMusic());
  }

  /**
   * Tests osapiPerson->getName()
   */
  public function testGetName() {
    $this->assertEquals('NAME', $this->osapiPerson->getName());
  }

  /**
   * Tests osapiPerson->getNetworkPresence()
   */
  public function testGetNetworkPresence() {
    $presence = new osapiEnumPresence('DND');
    $this->osapiPerson->setNetworkPresence('DND');
    $this->assertEquals($presence, $this->osapiPerson->getNetworkPresence());
  }

  /**
   * Tests osapiPerson->getNickname()
   */
  public function testGetNickname() {
    $this->assertEquals('NICKNAME', $this->osapiPerson->getNickname());
  
  }

  /**
   * Tests osapiPerson->getPets()
   */
  public function testGetPets() {
    $this->assertEquals('PETS', $this->osapiPerson->getPets());
  }

  /**
   * Tests osapiPerson->getPhoneNumbers()
   */
  public function testGetPhoneNumbers() {
    $this->assertEquals('PHONENUMBERS', $this->osapiPerson->getPhoneNumbers());
  }

  /**
   * Tests osapiPerson->getPoliticalViews()
   */
  public function testGetPoliticalViews() {
    $this->assertEquals('POLITICALVIEWS', $this->osapiPerson->getPoliticalViews());
  }

  /**
   * Tests osapiPerson->getProfileSong()
   */
  public function testGetProfileSong() {
    $this->assertEquals('PROFILESONG', $this->osapiPerson->getProfileSong());
  }

  /**
   * Tests osapiPerson->getProfileUrl()
   */
  public function testGetProfileUrl() {
    $this->assertEquals('PROFILEURL', $this->osapiPerson->getProfileUrl());
  }

  /**
   * Tests osapiPerson->getProfileVideo()
   */
  public function testGetProfileVideo() {
    $this->assertEquals('PROFILEVIDEO', $this->osapiPerson->getProfileVideo());
  }

  /**
   * Tests osapiPerson->getQuotes()
   */
  public function testGetQuotes() {
    $this->assertEquals('QUOTES', $this->osapiPerson->getQuotes());
  }

  /**
   * Tests osapiPerson->getRelationshipStatus()
   */
  public function testGetRelationshipStatus() {
    $this->assertEquals('RELATIONSHIPSTATUS', $this->osapiPerson->getRelationshipStatus());
  }

  /**
   * Tests osapiPerson->getReligion()
   */
  public function testGetReligion() {
    $this->assertEquals('RELIGION', $this->osapiPerson->getReligion());
  }

  /**
   * Tests osapiPerson->getRomance()
   */
  public function testGetRomance() {
    $this->assertEquals('ROMANCE', $this->osapiPerson->getRomance());
  }

  /**
   * Tests osapiPerson->getScaredOf()
   */
  public function testGetScaredOf() {
    $this->assertEquals('SCAREDOF', $this->osapiPerson->getScaredOf());
  }

  /**
   * Tests osapiPerson->getSexualOrientation()
   */
  public function testGetSexualOrientation() {
    $this->assertEquals('SEXUALORIENTATION', $this->osapiPerson->getSexualOrientation());
  }

  /**
   * Tests osapiPerson->getSmoker()
   */
  public function testGetSmoker() {
    $smoker = new osapiEnumSmoker('OCCASIONALLY');
    $this->osapiPerson->setSmoker('OCCASIONALLY');
    $this->assertEquals($smoker, $this->osapiPerson->getSmoker());
  }

  /**
   * Tests osapiPerson->getSports()
   */
  public function testGetSports() {
    $this->assertEquals('SPORTS', $this->osapiPerson->getSports());
  }

  /**
   * Tests osapiPerson->getStatus()
   */
  public function testGetStatus() {
    $this->assertEquals('STATUS', $this->osapiPerson->getStatus());
  }

  /**
   * Tests osapiPerson->getTags()
   */
  public function testGetTags() {
    $this->assertEquals('TAGS', $this->osapiPerson->getTags());
  }

  /**
   * Tests osapiPerson->getThumbnailUrl()
   */
  public function testGetThumbnailUrl() {
    $this->assertEquals('THUMBNAILSURL', $this->osapiPerson->getThumbnailUrl());
  }

  /**
   * Tests osapiPerson->getTurnOffs()
   */
  public function testGetTurnOffs() {
    $this->assertEquals('TURNOFFS', $this->osapiPerson->getTurnOffs());
  }

  /**
   * Tests osapiPerson->getTurnOns()
   */
  public function testGetTurnOns() {
    $this->assertEquals('TURNONS', $this->osapiPerson->getTurnOns());
  }

  /**
   * Tests osapiPerson->getTvShows()
   */
  public function testGetTvShows() {
    $this->assertEquals('TVSHOWS', $this->osapiPerson->getTvShows());
  }

  /**
   * Tests osapiPerson->getUrls()
   */
  public function testGetUrls() {
    $this->assertEquals('URLS', $this->osapiPerson->getUrls());
  }

  /**
   * Tests osapiPerson->setAboutMe()
   */
  public function testSetAboutMe() {
    $this->osapiPerson->setAboutMe('aboutme');
    $this->assertEquals('aboutme', $this->osapiPerson->aboutMe);
  }

  /**
   * Tests osapiPerson->setActivities()
   */
  public function testSetActivities() {
    $this->osapiPerson->setActivities('activities');
    $this->assertEquals('activities', $this->osapiPerson->activities);
  }

  /**
   * Tests osapiPerson->setAddresses()
   */
  public function testSetAddresses() {
    $this->osapiPerson->setAddresses('addresses');
    $this->assertEquals('addresses', $this->osapiPerson->addresses);
  }

  /**
   * Tests osapiPerson->setAge()
   */
  public function testSetAge() {
    $this->osapiPerson->setAge('age');
    $this->assertEquals('age', $this->osapiPerson->age);
  }

  /**
   * Tests osapiPerson->setBodyType()
   */
  public function testSetBodyType() {
    $this->osapiPerson->setBodyType('bodytype');
    $this->assertEquals('bodytype', $this->osapiPerson->bodyType);
  }

  /**
   * Tests osapiPerson->setBooks()
   */
  public function testSetBooks() {
    $this->osapiPerson->setBooks('books');
    $this->assertEquals('books', $this->osapiPerson->books);
  }

  /**
   * Tests osapiPerson->setCars()
   */
  public function testSetCars() {
    $this->osapiPerson->setCars('cars');
    $this->assertEquals('cars', $this->osapiPerson->cars);
  }

  /**
   * Tests osapiPerson->setChildren()
   */
  public function testSetChildren() {
    $this->osapiPerson->setChildren('children');
    $this->assertEquals('children', $this->osapiPerson->children);
  }

  /**
   * Tests osapiPerson->setCurrentLocation()
   */
  public function testSetCurrentLocation() {
    $this->osapiPerson->setCurrentLocation('currentlocation');
    $this->assertEquals('currentlocation', $this->osapiPerson->currentLocation);
  }

  /**
   * Tests osapiPerson->setDateOfBirth()
   */
  public function testSetDateOfBirth() {
    $this->osapiPerson->setBirthday('10/10/2010');
    $this->assertEquals('2010-10-10', $this->osapiPerson->getBirthday());
  }

  /**
   * Tests osapiPerson->setEmails()
   */
  public function testSetEmails() {
    $this->osapiPerson->setEmails('emails');
    $this->assertEquals('emails', $this->osapiPerson->emails);
  }

  /**
   * Tests osapiPerson->setEthnicity()
   */
  public function testSetEthnicity() {
    $this->osapiPerson->setEthnicity('ethnicity');
    $this->assertEquals('ethnicity', $this->osapiPerson->ethnicity);
  }

  /**
   * Tests osapiPerson->setFashion()
   */
  public function testSetFashion() {
    $this->osapiPerson->setFashion('fashion');
    $this->assertEquals('fashion', $this->osapiPerson->fashion);
  }

  /**
   * Tests osapiPerson->setFood()
   */
  public function testSetFood() {
    $this->osapiPerson->setFood('food');
    $this->assertEquals('food', $this->osapiPerson->food);
  }

  /**
   * Tests osapiPerson->setGender()
   */
  public function testSetGender() {
    $this->osapiPerson->setGender('MALE');
    $this->assertEquals('MALE', $this->osapiPerson->gender);
  }

  /**
   * Tests osapiPerson->setHappiestWhen()
   */
  public function testSetHappiestWhen() {
    $this->osapiPerson->setHappiestWhen('happiestwhen');
    $this->assertEquals('happiestwhen', $this->osapiPerson->happiestWhen);
  }

  /**
   * Tests osapiPerson->setHasApp()
   */
  public function testSetHasApp() {
    $this->osapiPerson->setHasApp('hasapp');
    $this->assertEquals('hasapp', $this->osapiPerson->hasApp);
  }

  /**
   * Tests osapiPerson->setHeroes()
   */
  public function testSetHeroes() {
    $this->osapiPerson->setHeroes('heroes');
    $this->assertEquals('heroes', $this->osapiPerson->heroes);
  }

  /**
   * Tests osapiPerson->setHumor()
   */
  public function testSetHumor() {
    $this->osapiPerson->setHumor('humor');
    $this->assertEquals('humor', $this->osapiPerson->humor);
  }

  /**
   * Tests osapiPerson->setId()
   */
  public function testSetId() {
    $this->osapiPerson->setId('id');
    $this->assertEquals('id', $this->osapiPerson->id);
  }

  /**
   * Tests osapiPerson->setInterests()
   */
  public function testSetInterests() {
    $this->osapiPerson->setInterests('interests');
    $this->assertEquals('interests', $this->osapiPerson->interests);
  }

  /**
   * Tests osapiPerson->setIsOwner()
   */
  public function testSetIsOwner() {
    $this->osapiPerson->setIsOwner('isowner');
    $this->assertEquals('isowner', $this->osapiPerson->isOwner);
  }

  /**
   * Tests osapiPerson->setIsViewer()
   */
  public function testSetIsViewer() {
    $this->osapiPerson->setIsViewer('isviewer');
    $this->assertEquals('isviewer', $this->osapiPerson->isViewer);
  }

  /**
   * Tests osapiPerson->setJobInterests()
   */
  public function testSetJobInterests() {
    $this->osapiPerson->setJobInterests('jobinterests');
    $this->assertEquals('jobinterests', $this->osapiPerson->jobInterests);
  }

  /**
   * Tests osapiPerson->setLanguagesSpoken()
   */
  public function testSetLanguagesSpoken() {
    $this->osapiPerson->setLanguagesSpoken('languagesspoken');
    $this->assertEquals('languagesspoken', $this->osapiPerson->languagesSpoken);
  }

  /**
   * Tests osapiPerson->setLivingArrangement()
   */
  public function testSetLivingArrangement() {
    $this->osapiPerson->setLivingArrangement('livingarrangement');
    $this->assertEquals('livingarrangement', $this->osapiPerson->livingArrangement);
  }

  /**
   * Tests osapiPerson->setLookingFor()
   */
  public function testSetLookingFor() {
    $lookingFor = new osapiEnumLookingFor('FRIENDS');
    $this->osapiPerson->setLookingFor('FRIENDS');
    $this->assertEquals($lookingFor, $this->osapiPerson->getLookingFor());
  }

  /**
   * Tests osapiPerson->setMovies()
   */
  public function testSetMovies() {
    $this->osapiPerson->setMovies('movies');
    $this->assertEquals('movies', $this->osapiPerson->movies);
  }

  /**
   * Tests osapiPerson->setMusic()
   */
  public function testSetMusic() {
    $this->osapiPerson->setMusic('music');
    $this->assertEquals('music', $this->osapiPerson->music);
  }

  /**
   * Tests osapiPerson->setName()
   */
  public function testSetName() {
    $this->osapiPerson->setName('name');
    $this->assertEquals('name', $this->osapiPerson->name);
  }

  /**
   * Tests osapiPerson->setNickname()
   */
  public function testSetNickname() {
    $this->osapiPerson->setNickname('nickname');
    $this->assertEquals('nickname', $this->osapiPerson->nickname);
  }

  /**
   * Tests osapiPerson->setPets()
   */
  public function testSetPets() {
    $this->osapiPerson->setPets('pets');
    $this->assertEquals('pets', $this->osapiPerson->pets);
  }

  /**
   * Tests osapiPerson->setPhoneNumbers()
   */
  public function testSetPhoneNumbers() {
    $this->osapiPerson->setPhoneNumbers('phonenumbers');
    $this->assertEquals('phonenumbers', $this->osapiPerson->phoneNumbers);
  }

  /**
   * Tests osapiPerson->setPoliticalViews()
   */
  public function testSetPoliticalViews() {
    $this->osapiPerson->setPoliticalViews('politicalviews');
    $this->assertEquals('politicalviews', $this->osapiPerson->politicalViews);
  }

  /**
   * Tests osapiPerson->setProfileSong()
   */
  public function testSetProfileSong() {
    $this->osapiPerson->setProfileSong('profilesong');
    $this->assertEquals('profilesong', $this->osapiPerson->profileSong);
  }

  /**
   * Tests osapiPerson->setProfileUrl()
   */
  public function testSetProfileUrl() {
    $this->osapiPerson->setProfileUrl('profileurl');
    $this->assertEquals('profileurl', $this->osapiPerson->profileUrl);
  }

  /**
   * Tests osapiPerson->setProfileVideo()
   */
  public function testSetProfileVideo() {
    $this->osapiPerson->setProfileVideo('profilevideo');
    $this->assertEquals('profilevideo', $this->osapiPerson->profileVideo);
  }

  /**
   * Tests osapiPerson->setQuotes()
   */
  public function testSetQuotes() {
    $this->osapiPerson->setQuotes('quotes');
    $this->assertEquals('quotes', $this->osapiPerson->quotes);
  }

  /**
   * Tests osapiPerson->setRelationshipStatus()
   */
  public function testSetRelationshipStatus() {
    $this->osapiPerson->setRelationshipStatus('relationshipstatus');
    $this->assertEquals('relationshipstatus', $this->osapiPerson->relationshipStatus);
  }

  /**
   * Tests osapiPerson->setReligion()
   */
  public function testSetReligion() {
    $this->osapiPerson->setReligion('religion');
    $this->assertEquals('religion', $this->osapiPerson->religion);
  }

  /**
   * Tests osapiPerson->setRomance()
   */
  public function testSetRomance() {
    $this->osapiPerson->setRomance('romance');
    $this->assertEquals('romance', $this->osapiPerson->romance);
  }

  /**
   * Tests osapiPerson->setScaredOf()
   */
  public function testSetScaredOf() {
    $this->osapiPerson->setScaredOf('scaredof');
    $this->assertEquals('scaredof', $this->osapiPerson->scaredOf);
  }

  /**
   * Tests osapiPerson->setSexualOrientation()
   */
  public function testSetSexualOrientation() {
    $this->osapiPerson->setSexualOrientation('sexualorientation');
    $this->assertEquals('sexualorientation', $this->osapiPerson->sexualOrientation);
  }

  /**
   * Tests osapiPerson->setSports()
   */
  public function testSetSports() {
    $this->osapiPerson->setSports('sports');
    $this->assertEquals('sports', $this->osapiPerson->sports);
  }

  /**
   * Tests osapiPerson->setStatus()
   */
  public function testSetStatus() {
    $this->osapiPerson->setStatus('status');
    $this->assertEquals('status', $this->osapiPerson->status);
  }

  /**
   * Tests osapiPerson->setTags()
   */
  public function testSetTags() {
    $this->osapiPerson->setTags('tags');
    $this->assertEquals('tags', $this->osapiPerson->tags);
  }

  /**
   * Tests osapiPerson->setThumbnailUrl()
   */
  public function testSetThumbnailUrl() {
    $this->osapiPerson->setThumbnailUrl('thumbnailurl');
    $this->assertEquals('thumbnailurl', $this->osapiPerson->thumbnailUrl);
  }

  /**
   * Tests osapiPerson->setTurnOffs()
   */
  public function testSetTurnOffs() {
    $this->osapiPerson->setTurnOffs('turnoffs');
    $this->assertEquals('turnoffs', $this->osapiPerson->turnOffs);
  }

  /**
   * Tests osapiPerson->setTurnOns()
   */
  public function testSetTurnOns() {
    $this->osapiPerson->setTurnOns('turnons');
    $this->assertEquals('turnons', $this->osapiPerson->turnOns);
  }

  /**
   * Tests osapiPerson->setTvShows()
   */
  public function testSetTvShows() {
    $this->osapiPerson->setTvShows('tvshows');
    $this->assertEquals('tvshows', $this->osapiPerson->tvShows);
  }

  /**
   * Tests osapiPerson->setUrls()
   */
  public function testSetUrls() {
    $this->osapiPerson->setUrls('urls');
    $this->assertEquals('urls', $this->osapiPerson->urls);
  }
}
