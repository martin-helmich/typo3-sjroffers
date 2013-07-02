<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2009 Jochen Rau <jochen.rau@typoplanet.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Testcase for the Offer class
 */
class Tx_SjrOffers_Domain_Model_OfferTest extends Tx_Extbase_BaseTestCase {
	
	/**
	 * @test
	 */
	public function anInstanceOfTheOfferCanBeConstructed() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer('A title of an offer');
		$this->assertEquals('A title of an offer', $offer->getTitle());
	}

	/**
	 * @test
	 */
	public function theTitleOfTheOfferCanBeSet() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer('A title of an offer');
		$title = 'Another Name';
		$offer->setTitle($title);
		$this->assertEquals($title, $offer->getTitle());
	}
	
	/**
	 * @test
	 */
	public function theTeaserOfTheOfferCanBeSet() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer('A title of an offer');
		$teaser = 'Lorem ipsum dolor sit amet';
		$offer->setTeaser($teaser);
		$this->assertEquals($teaser, $offer->getTeaser());
	}
	
	/**
	 * @test
	 */
	public function theDescriptionOfTheOfferCanBeSet() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.\nUt enim ad minim veniam, quis nostrud.";
		$offer->setDescription($description);
		$this->assertEquals($description, $offer->getDescription());
	}
	
	/**
	 * @test
	 */
	public function theServicesOfTheOfferCanBeSet() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$services = "Lorem ipsum dolor sit amet\nConsectetur adipisicing elit\nUt enim ad minim veniam";
		$offer->setServices($services);
		$this->assertEquals($services, $offer->getServices());
	}
	
	/**
	 * @test
	 */
	public function theDatesOfTheOfferCanBeSet() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$dates = "Mo, Mi und Fr, jeweils 8-12 Uhr\nDo 7-14 Uhr";
		$offer->setDates($dates);
		$this->assertEquals($dates, $offer->getDates());
	}
	
	/**
	 * @test
	 */
	public function theVenueOfTheOfferCanBeSet() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$venue = "Südgemeindehaus\n2.Stock, Zi. 213";
		$offer->setVenue($venue);
		$this->assertEquals($venue, $offer->getVenue());
	}
	
	/**
	 * @test
	 */
	public function anImageOfTheOfferCanBeSet() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$imageName = 'image.gif';
		$offer->setImage($imageName);
		$this->assertEquals($imageName, $offer->getImage());
	}
	
	/**
	 * @test
	 */
	public function theAgeRangeOfTheOfferCanBeSet() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$mockAgeRange = $this->getMock('Tx_SjrOffers_Domain_Model_AgeRange');
		$offer->setAgeRange($mockAgeRange);
		$this->assertEquals($mockAgeRange, $offer->getAgeRange());
	}
	
	/**
	 * @test
	 */
	public function theDateRangeOfTheOfferCanBeSet() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$mockDateRange = $this->getMock('Tx_SjrOffers_Domain_Model_DateRange');
		$offer->setDateRange($mockDateRange);
		$this->assertEquals($mockDateRange, $offer->getDateRange());
	}
	
	/**
	 * @test
	 */
	public function theAttendanceRangeOfTheOfferCanBeSet() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$mockAttendanceRange = $this->getMock('Tx_SjrOffers_Domain_Model_AttendanceRange');
		$offer->setAttendanceRange($mockAttendanceRange);
		$this->assertEquals($mockAttendanceRange, $offer->getAttendanceRange());
	}
	
	/**
	 * @test
	 */
	public function theAttendanceFeesIsInitializedAsEmptyObjectStorage() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$this->assertEquals('Tx_Extbase_Persistence_ObjectStorage', get_class($offer->getAttendanceFees()));
		$this->assertEquals(0, count($offer->getAttendanceFees()->toArray()));
	}
	
	/**
	 * @test
	 */
	public function theAttendanceFeesCanBeSet() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$mockObjectStorage = $this->getMock('Tx_Extbase_Persistence_ObjectStorage', array('contains'), array(), '', FALSE);
		$mockObjectStorage->expects($this->any())->method('contains')->with('foo')->will($this->returnValue(TRUE));		
		$offer->setAttendanceFees($mockObjectStorage);
		$this->assertTrue($offer->getAttendanceFees()->contains('foo'));
	}
	
	/**
	 * @test
	 */
	public function anAttendanceFeeCanBeAdded() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$mockAttendanceFee = $this->getMock('Tx_SjrOffers_Domain_Model_AttendanceFee');
		$offer->addAttendanceFee($mockAttendanceFee);
		$this->assertTrue($offer->getAttendanceFees()->contains($mockAttendanceFee));
	}
	
	/**
	 * @test
	 */
	public function anAttendanceFeeCanBeRemoved() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$mockAttendanceFee = $this->getMock('Tx_SjrOffers_Domain_Model_AttendanceFee');
		$offer->addAttendanceFee($mockAttendanceFee);
		$this->assertEquals(1, count($offer->getAttendanceFees()->toArray()));
		$offer->removeAttendanceFee($mockAttendanceFee);
		$this->assertFalse($offer->getAttendanceFees()->contains($mockAttendanceFee));
	}
	
	/**
	 * @test
	 */
	public function theContactCanBeSet() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$mockContact = $this->getMock('Tx_SjrOffers_Domain_Model_Person');
		$offer->setContact($mockContact);
		$this->assertTrue($mockContact === $offer->getContact());
	}
	
	/**
	 * @test
	 */
	public function theCategoriesAreInitializedAsEmptyObjectStorage() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$this->assertEquals('Tx_Extbase_Persistence_ObjectStorage', get_class($offer->getCategories()));
		$this->assertEquals(0, count($offer->getCategories()->toArray()));
	}
	
	/**
	 * @test
	 */
	public function theCategoriesCanBeSet() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$mockObjectStorage = $this->getMock('Tx_Extbase_Persistence_ObjectStorage', array('contains'), array(), '', FALSE);
		$mockObjectStorage->expects($this->any())->method('contains')->with('foo')->will($this->returnValue(TRUE));		
		$offer->setCategories($mockObjectStorage);
		$this->assertTrue($offer->getCategories()->contains('foo'));
	}
	
	/**
	 * @test
	 */
	public function aCategoryCanBeAdded() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$mockCategory = $this->getMock('Tx_SjrOffers_Domain_Model_Category');
		$offer->addCategory($mockCategory);
		$this->assertTrue($offer->getCategories()->contains($mockCategory));
	}
	
	/**
	 * @test
	 */
	public function aCategoryCanBeRemoved() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$mockCategory = $this->getMock('Tx_SjrOffers_Domain_Model_Category');
		$offer->addCategory($mockCategory);
		$this->assertEquals(1, count($offer->getCategories()->toArray()));
		$offer->removeCategory($mockCategory);
		$this->assertFalse($offer->getCategories()->contains($mockCategory));
	}
	
	/**
	 * @test
	 */
	public function theRegionsAreInitializedAsEmptyObjectStorage() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$this->assertEquals('Tx_Extbase_Persistence_ObjectStorage', get_class($offer->getRegions()));
		$this->assertEquals(0, count($offer->getRegions()->toArray()));
	}
		
	/**
	 * @test
	 */
	public function theRegionsCanBeSet() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$mockObjectStorage = $this->getMock('Tx_Extbase_Persistence_ObjectStorage', array('contains'), array(), '', FALSE);
		$mockObjectStorage->expects($this->any())->method('contains')->with('foo')->will($this->returnValue(TRUE));		
		$offer->setRegions($mockObjectStorage);
		$this->assertTrue($offer->getRegions()->contains('foo'));
	}
	
	/**
	 * @test
	 */
	public function aRegionCanBeAdded() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$mockRegion = $this->getMock('Tx_SjrOffers_Domain_Model_Region');
		$offer->addRegion($mockRegion);
		$this->assertTrue($offer->getRegions()->contains($mockRegion));
	}
	
	/**
	 * @test
	 */
	public function aRegionCanBeRemoved() {
	    $offer = new Tx_SjrOffers_Domain_Model_Offer;
		$mockRegion = $this->getMock('Tx_SjrOffers_Domain_Model_Region');
		$offer->addRegion($mockRegion);
		$this->assertEquals(1, count($offer->getRegions()->toArray()));
		$offer->removeRegion($mockRegion);
		$this->assertFalse($offer->getRegions()->contains($mockRegion));
	}
	
}
?>