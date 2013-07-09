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
 * Testcase for the Organization class
 */
class OrganizationTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	
	/**
	 * @test
	 */
	public function anInstanceOfTheOrganizationCanBeConstructed() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization('Youth Organization');
		$this->assertEquals('Youth Organization', $organization->getName());
	}

	/**
	 * @test
	 */
	public function theNameOfTheOrganizationCanBeSet() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization('Youth Organization');
		$organization->setName('Another Name');
		$this->assertEquals('Another Name', $organization->getName());
	}

	/**
	 * @test
	 */
	public function theAdressOfTheOrganizationCanBeSet() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization;
		$organization->setAddress("The first address line\nThe second address line");
		$this->assertEquals("The first address line\nThe second address line", $organization->getAddress());
	}
	
	/**
	 * @test
	 */
	public function theTelephoneNumberOfTheOrganizationCanBeSet() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization('John Doe');
		$organization->setTelephoneNumber("+49 (0)711 34556-234");
		$this->assertEquals("+49 (0)711 34556-234", $organization->getTelephoneNumber());
	}
	
	/**
	 * @test
	 */
	public function theTelefaxNumberOfTheOrganizationCanBeSet() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization('John Doe');
		$organization->setTelefaxNumber("+49 (0)711 34556-234");
		$this->assertEquals("+49 (0)711 34556-234", $organization->getTelefaxNumber());
	}
	
	/**
	 * @test
	 */
	public function theUrlOfTheOrganizationCanBeSet() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization('John Doe');
		$organization->setUrl("http://www.example.com");
		$this->assertEquals("http://www.example.com", $organization->getUrl());
	}
	
	/**
	 * @test
	 */
	public function theEmailAddressOfTheOrganizationCanBeSet() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization('John Doe');
		$organization->setEmailAddress("john.doe@example.com");
		$this->assertEquals("john.doe@example.com", $organization->getEmailAddress());
	}
	
	/**
	 * @test
	 */
	public function theDescriptionOfTheOrganizationCanBeSet() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization;
		$description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.\nUt enim ad minim veniam, quis nostrud.";
		$organization->setDescription($description);
		$this->assertEquals($description, $organization->getDescription());
	}
	
	/**
	 * @test
	 */
	public function anImageOfTheOrganizationCanBeSet() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization;
		$imageName = 'logo.gif';
		$organization->setImage($imageName);
		$this->assertEquals($imageName, $organization->getImage());
	}
	
	/**
	 * @test
	 */
	public function theContactsAreInitializedAsEmptyObjectStorage() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization('Youth Organization');
		$this->assertInstanceOf('\\TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', $organization->getContacts());
		$this->assertEquals(0, count($organization->getContacts()->toArray()));
	}
	
	/**
	 * @test
	 */
	public function theContactsCanBeSet() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization('Youth Organization');
		$mockObjectStorage = $this->getMock('\\TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('contains'), array(), '', FALSE);
		$mockObjectStorage->expects($this->any())->method('contains')->with('foo')->will($this->returnValue(TRUE));		
		$organization->setContacts($mockObjectStorage);
		$this->assertTrue($organization->getContacts()->contains('foo'));
	}
	
	/**
	 * @test
	 */
	public function aContactCanBeAdded() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization('Youth Organization');
		$mockContact = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Person');
		$organization->addContact($mockContact);
		$this->assertTrue($organization->getContacts()->contains($mockContact));
	}
	
	/**
	 * @test
	 */
	public function aContactCanBeRemoved() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization('Youth Organization');
		$mockContact = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Person');
		$organization->addContact($mockContact);
		$this->assertEquals(1, count($organization->getContacts()->toArray()));
		$organization->removeContact($mockContact);
		$this->assertFalse($organization->getContacts()->contains($mockContact));
	}
	
	/**
	 * @test
	 */
	public function allContactsCanBeRetrievedAtOnce() {
		$mockPerson1 = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Person', array(), array(), '', FALSE);
		$mockPerson2 = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Person', array(), array(), '', FALSE);

		$mockOffer1 = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Offer', array('getContact'), array(), '', FALSE);
		$mockOffer1->expects($this->any())->method('getContact')->will($this->returnValue($mockPerson1));
		
		$mockOffer2 = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Offer', array('getContact'), array(), '', FALSE);
		$mockOffer2->expects($this->any())->method('getContact')->will($this->returnValue($mockPerson2));

		$mockObjectStorage1 = $this->getMock('\\TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$mockObjectStorage1->expects($this->at(0))->method('attach')->with($this->identicalTo($mockPerson1));
		$mockObjectStorage1->expects($this->at(1))->method('attach')->with($this->identicalTo($mockPerson2));

		$mockOrganization = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Organization', array('getContacts', 'getOffers'), array(), '', FALSE);
		$mockOrganization->expects($this->once())->method('getContacts')->will($this->returnValue($mockObjectStorage1));
		$mockOrganization->expects($this->once())->method('getOffers')->will($this->returnValue(array($mockOffer1, $mockOffer2)));		
		
		$mockOrganization->getAllContacts();
	}
	
	/**
	 * @test
	 */
	public function theOffersAreInitializedAsEmptyObjectStorage() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization('Youth Organization');
		$this->assertInstanceOf('\\TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', $organization->getOffers());
		$this->assertEquals(0, count($organization->getOffers()->toArray()));
	}
	
	/**
	 * @test
	 */
	public function theOffersCanBeSet() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization('Youth Organization');
		$mockObjectStorage = $this->getMock('\\TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('contains'), array(), '', FALSE);
		$mockObjectStorage->expects($this->any())->method('contains')->with('foo')->will($this->returnValue(TRUE));		
		$organization->setOffers($mockObjectStorage);
		$this->assertTrue($organization->getOffers()->contains('foo'));
	}
	
	/**
	 * @test
	 */
	public function anOfferCanBeAdded() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization('Youth Organization');
		$mockOffer = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Offer', array(), array(), '', FALSE);
		$organization->addOffer($mockOffer);
		$this->assertTrue($organization->getOffers()->contains($mockOffer));
	}
	
	/**
	 * @test
	 */
	public function anOfferCanBeRemoved() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization('Youth Organization');
		$mockOffer = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Offer', array(), array(), '', FALSE);
		$organization->addOffer($mockOffer);
		$this->assertEquals(1, count($organization->getOffers()->toArray()));
		$organization->removeOffer($mockOffer);
		$this->assertFalse($organization->getContacts()->contains($mockOffer));
	}
	
	/**
	 * @test
	 */
	public function allOffersCanBeRemovedAtOnce() {
		$organization = new \Sjr\SjrOffers\Domain\Model\Organization('Youth Organization');
		$mockOffer1 = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Offer', array(), array(), '', FALSE);
		$mockOffer2 = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Offer', array(), array(), '', FALSE);
		$mockOffer3 = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Offer', array(), array(), '', FALSE);
		$organization->addOffer($mockOffer1);
		$organization->addOffer($mockOffer2);
		$organization->addOffer($mockOffer3);
		$this->assertEquals(3, count($organization->getOffers()->toArray()));
		$organization->removeAllOffers();
		$offersAfterDeletion = $organization->getOffers();
		$this->assertInstanceOf('\\TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', $offersAfterDeletion);
		$this->assertEquals(0, count($offersAfterDeletion->toArray()));
	}
	
}
?>
