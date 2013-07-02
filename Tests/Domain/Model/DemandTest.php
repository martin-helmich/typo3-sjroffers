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
 * Testcase for the Demand class
 */
class DemandTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	
	/**
	 * @test
	 */
	public function theOrganizationCanBeSet() {
		$demand = new \Sjr\SjrOffers\Domain\Model\Demand;
		$mockOrganization = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Organization');
		$demand->setOrganization($mockOrganization);
		$this->assertTrue($demand->getOrganization() === $mockOrganization);
	}
	
	/**
	 * @test
	 */
	public function theSearchWordCanBeSet() {
		$demand = new \Sjr\SjrOffers\Domain\Model\Demand;
		$demand->setSearchWord('word');
		$this->assertEquals('word', $demand->getSearchWord());
	}
	
	/**
	 * @test
	 */
	public function theAgeCriteriaCanBeSet() {
		$demand = new \Sjr\SjrOffers\Domain\Model\Demand;
		$demand->setAge(2);
		$this->assertEquals(2, $demand->getAge());
	}
	
	/**
	 * @test
	 */
	public function theCategoryCanBeSet() {
		$demand = new \Sjr\SjrOffers\Domain\Model\Demand;
		$mockCategory = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Category');
		$demand->setCategory($mockCategory);
		$this->assertTrue($demand->getCategory() === $mockCategory);
	}
	
	/**
	 * @test
	 */
	public function theRegionCanBeSet() {
		$demand = new \Sjr\SjrOffers\Domain\Model\Demand;
		$mockRegion = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Model\\Region');
		$demand->setRegion($mockRegion);
		$this->assertTrue($demand->getRegion() === $mockRegion);
	}
			
}
?>
