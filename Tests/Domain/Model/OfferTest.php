<?php
namespace Sjr\SjrOffers\Tests\Domain\Model;

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
class OfferTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	
	/**
	 * @test
	 */
	public function anInstanceOfTheOfferCanBeConstructed() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer('A title of an offer');
		$this->assertEquals('A title of an offer', $offer->getTitle());
	}

	/**
	 * @test
	 */
	public function theTitleOfTheOfferCanBeSet() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer('A title of an offer');
		$title = 'Another Name';
		$offer->setTitle($title);
		$this->assertEquals($title, $offer->getTitle());
	}
	
	/**
	 * @test
	 */
	public function theTeaserOfTheOfferCanBeSet() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer('A title of an offer');
		$teaser = 'Lorem ipsum dolor sit amet';
		$offer->setTeaser($teaser);
		$this->assertEquals($teaser, $offer->getTeaser());
	}
	
	/**
	 * @test
	 */
	public function theDescriptionOfTheOfferCanBeSet() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.\nUt enim ad minim veniam, quis nostrud.";
		$offer->setDescription($description);
		$this->assertEquals($description, $offer->getDescription());
	}
	
	/**
	 * @test
	 */
	public function theServicesOfTheOfferCanBeSet() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$services = "Lorem ipsum dolor sit amet\nConsectetur adipisicing elit\nUt enim ad minim veniam";
		$offer->setServices($services);
		$this->assertEquals($services, $offer->getServices());
	}
	
	/**
	 * @test
	 */
	public function theDatesOfTheOfferCanBeSet() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$dates = "Mo, Mi und Fr, jeweils 8-12 Uhr\nDo 7-14 Uhr";
		$offer->setDates($dates);
		$this->assertEquals($dates, $offer->getDates());
	}
	
	/**
	 * @test
	 */
	public function theVenueOfTheOfferCanBeSet() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$venue = "Südgemeindehaus\n2.Stock, Zi. 213";
		$offer->setVenue($venue);
		$this->assertEquals($venue, $offer->getVenue());
	}
	
	/**
	 * @test
	 */
	public function anImageOfTheOfferCanBeSet() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$imageName = 'image.gif';
		$offer->setImage($imageName);
		$this->assertEquals($imageName, $offer->getImage());
	}
	
	/**
	 * @test
	 */
	public function theAgeRangeOfTheOfferCanBeSet() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$mockAgeRange = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\AgeRange');
		$offer->setAgeRange($mockAgeRange);
		$this->assertEquals($mockAgeRange, $offer->getAgeRange());
	}
	
	/**
	 * @test
	 */
	public function theDateRangeOfTheOfferCanBeSet() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$mockDateRange = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\DateRange');
		$offer->setDateRange($mockDateRange);
		$this->assertEquals($mockDateRange, $offer->getDateRange());
	}
	
	/**
	 * @test
	 */
	public function theAttendanceRangeOfTheOfferCanBeSet() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$mockAttendanceRange = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\AttendanceRange');
		$offer->setAttendanceRange($mockAttendanceRange);
		$this->assertEquals($mockAttendanceRange, $offer->getAttendanceRange());
	}
	
	/**
	 * @test
	 */
	public function theAttendanceFeesIsInitializedAsEmptyObjectStorage() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$this->assertInstanceOf('\\TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', $offer->getAttendanceFees());
		$this->assertEquals(0, count($offer->getAttendanceFees()->toArray()));
	}
	
	/**
	 * @test
	 */
	public function theAttendanceFeesCanBeSet() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$mockObjectStorage = $this->getMock('\\TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('contains'), array(), '', FALSE);
		$mockObjectStorage->expects($this->any())->method('contains')->with('foo')->will($this->returnValue(TRUE));		
		$offer->setAttendanceFees($mockObjectStorage);
		$this->assertTrue($offer->getAttendanceFees()->contains('foo'));
	}
	
	/**
	 * @test
	 */
	public function anAttendanceFeeCanBeAdded() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$mockAttendanceFee = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\AttendanceFee');
		$offer->addAttendanceFee($mockAttendanceFee);
		$this->assertTrue($offer->getAttendanceFees()->contains($mockAttendanceFee));
	}
	
	/**
	 * @test
	 */
	public function anAttendanceFeeCanBeRemoved() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$mockAttendanceFee = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\AttendanceFee');
		$offer->addAttendanceFee($mockAttendanceFee);
		$this->assertEquals(1, count($offer->getAttendanceFees()->toArray()));
		$offer->removeAttendanceFee($mockAttendanceFee);
		$this->assertFalse($offer->getAttendanceFees()->contains($mockAttendanceFee));
	}
	
	/**
	 * @test
	 */
	public function theContactCanBeSet() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$mockContact = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Person');
		$offer->setContact($mockContact);
		$this->assertTrue($mockContact === $offer->getContact());
	}
	
	/**
	 * @test
	 */
	public function theCategoriesAreInitializedAsEmptyObjectStorage() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$this->assertInstanceOf('\\TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', $offer->getCategories());
		$this->assertEquals(0, count($offer->getCategories()->toArray()));
	}
	
	/**
	 * @test
	 */
	public function theCategoriesCanBeSet() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$mockObjectStorage = $this->getMock('\\TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('contains'), array(), '', FALSE);
		$mockObjectStorage->expects($this->any())->method('contains')->with('foo')->will($this->returnValue(TRUE));		
		$offer->setCategories($mockObjectStorage);
		$this->assertTrue($offer->getCategories()->contains('foo'));
	}
	
	/**
	 * @test
	 */
	public function aCategoryCanBeAdded() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$mockCategory = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Category');
		$offer->addCategory($mockCategory);
		$this->assertTrue($offer->getCategories()->contains($mockCategory));
	}
	
	/**
	 * @test
	 */
	public function aCategoryCanBeRemoved() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$mockCategory = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Category');
		$offer->addCategory($mockCategory);
		$this->assertEquals(1, count($offer->getCategories()->toArray()));
		$offer->removeCategory($mockCategory);
		$this->assertFalse($offer->getCategories()->contains($mockCategory));
	}
	
	/**
	 * @test
	 */
	public function theRegionsAreInitializedAsEmptyObjectStorage() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$this->assertInstanceOf('\\TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', $offer->getRegions());
		$this->assertEquals(0, count($offer->getRegions()->toArray()));
	}
		
	/**
	 * @test
	 */
	public function theRegionsCanBeSet() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$mockObjectStorage = $this->getMock('\\TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('contains'), array(), '', FALSE);
		$mockObjectStorage->expects($this->any())->method('contains')->with('foo')->will($this->returnValue(TRUE));		
		$offer->setRegions($mockObjectStorage);
		$this->assertTrue($offer->getRegions()->contains('foo'));
	}
	
	/**
	 * @test
	 */
	public function aRegionCanBeAdded() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$mockRegion = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Region');
		$offer->addRegion($mockRegion);
		$this->assertTrue($offer->getRegions()->contains($mockRegion));
	}
	
	/**
	 * @test
	 */
	public function aRegionCanBeRemoved() {
		$offer = new \Sjr\SjrOffers\Domain\Model\Offer;
		$mockRegion = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Region');
		$offer->addRegion($mockRegion);
		$this->assertEquals(1, count($offer->getRegions()->toArray()));
		$offer->removeRegion($mockRegion);
		$this->assertFalse($offer->getRegions()->contains($mockRegion));
	}
	
}
?>
