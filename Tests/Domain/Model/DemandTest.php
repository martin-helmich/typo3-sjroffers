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
 * Testcase for the Demand class
 */
class Tx_SjrOffers_Domain_Model_DemandTest extends Tx_Extbase_BaseTestCase {
	
	/**
	 * @test
	 */
	public function theOrganizationCanBeSet() {
	    $demand = new Tx_SjrOffers_Domain_Model_Demand;
		$mockOrganization = $this->getMock('Tx_SjrOffers_Domain_Model_Organization');
		$demand->setOrganization($mockOrganization);
		$this->assertTrue($demand->getOrganization() === $mockOrganization);
	}
	
	/**
	 * @test
	 */
	public function theSearchWordCanBeSet() {
	    $demand = new Tx_SjrOffers_Domain_Model_Demand;
		$demand->setSearchWord('word');
		$this->assertEquals('word', $demand->getSearchWord());
	}
	
	/**
	 * @test
	 */
	public function theAgeCriteriaCanBeSet() {
	    $demand = new Tx_SjrOffers_Domain_Model_Demand;
		$demand->setAge(2);
		$this->assertEquals(2, $demand->getAge());
	}
	
	/**
	 * @test
	 */
	public function theCategoryCanBeSet() {
	    $demand = new Tx_SjrOffers_Domain_Model_Demand;
		$mockCategory = $this->getMock('Tx_SjrOffers_Domain_Model_Category');
		$demand->setCategory($mockCategory);
		$this->assertTrue($demand->getCategory() === $mockCategory);
	}
	
	/**
	 * @test
	 */
	public function theRegionCanBeSet() {
	    $demand = new Tx_SjrOffers_Domain_Model_Demand;
		$mockRegion = $this->getMock('Tx_SjrOffers_Domain_Model_Region');
		$demand->setRegion($mockRegion);
		$this->assertTrue($demand->getRegion() === $mockRegion);
	}
			
}
?>