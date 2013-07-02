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
 * Testcase for the Region class
 */
class RegionTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	
	/**
	 * @test
	 */
	public function anInstanceOfTheRegionCanBeConstructed() {
	    $region = new \Sjr\SjrOffers\Domain\Model\Region('The Region');
		$this->assertEquals('The Region', $region->getName());
	}

	/**
	 * @test
	 */
	public function theNameOfTheRegionCanBeSet() {
	    $region = new \Sjr\SjrOffers\Domain\Model\Region('The Region');
		$name = 'Another name';
		$region->setName($name);
		$this->assertEquals($name, $region->getName());
	}	
	
	/**
	 * @test
	 */
	public function theRegionCanBeConvertedToString() {
	    $region = new \Sjr\SjrOffers\Domain\Model\Region('The Region');
		$this->assertEquals('The Region', $region->__toString());
	}
	
}
?>