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
 * Testcase for the Person class
 */
class Tx_SjrOffers_Domain_Model_PersonTest extends Tx_Extbase_BaseTestCase {
	
	/**
	 * @test
	 */
	public function anInstanceOfThePersonCanBeConstructed() {
	    $Person = new Tx_SjrOffers_Domain_Model_Person('John Doe');
		$this->assertEquals('John Doe', $Person->getName());
	}

	/**
	 * @test
	 */
	public function theNameOfThePersonCanBeSet() {
	    $Person = new Tx_SjrOffers_Domain_Model_Person();
		$Person->setName('Kasper Skårhøj');
		$this->assertEquals('Kasper Skårhøj', $Person->getName());
	}

	/**
	 * @test
	 */
	public function theAdressOfThePersonCanBeSet() {
	    $Person = new Tx_SjrOffers_Domain_Model_Person;
		$Person->setAddress("The first address line\nThe second address line");
		$this->assertEquals("The first address line\nThe second address line", $Person->getAddress());
	}
	
	/**
	 * @test
	 */
	public function theTelephoneNumberOfThePersonCanBeSet() {
	    $Person = new Tx_SjrOffers_Domain_Model_Person('John Doe');
		$Person->setTelephoneNumber("+49 (0)711 34556-234");
		$this->assertEquals("+49 (0)711 34556-234", $Person->getTelephoneNumber());
	}
	
	/**
	 * @test
	 */
	public function theTelefaxNumberOfThePersonCanBeSet() {
	    $Person = new Tx_SjrOffers_Domain_Model_Person('John Doe');
		$Person->setTelefaxNumber("+49 (0)711 34556-234");
		$this->assertEquals("+49 (0)711 34556-234", $Person->getTelefaxNumber());
	}
	
	/**
	 * @test
	 */
	public function theUrlOfThePersonCanBeSet() {
	    $Person = new Tx_SjrOffers_Domain_Model_Person('John Doe');
		$Person->setUrl("http://www.example.com");
		$this->assertEquals("http://www.example.com", $Person->getUrl());
	}
	
	/**
	 * @test
	 */
	public function theEmailAddressOfThePersonCanBeSet() {
	    $Person = new Tx_SjrOffers_Domain_Model_Person('John Doe');
		$Person->setEmailAddress("john.doe@example.com");
		$this->assertEquals("john.doe@example.com", $Person->getEmailAddress());
	}
		
}
?>