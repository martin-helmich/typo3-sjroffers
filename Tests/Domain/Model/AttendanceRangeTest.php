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
 * Testcase for an attendance range
 */
class AttendanceRangeTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	
	/**
	 * This is the data provider for minimum and maximum values
	 *
	 * @return array An array of values
	 */
	public function providerForMinMaxValues() {
		return array(
			array(0, 20),
			array(10, 75),
			array(0, PHP_INT_MAX),
			);
	}
		
	/**
	 * @test
	 */
	public function theMinimumAndMaximumValueCanBeSetAtConstructionTime() {
	    $constraint = new \Sjr\SjrOffers\Domain\Model\AttendanceRange(12, 123123);
		$this->assertEquals(12, $constraint->getMinimumValue());
		$this->assertEquals(123123, $constraint->getMaximumValue());
	}
		
	/**
	 * @test
	 */
	public function theMinimumAndMaximumValueDefaultsToZero() {
	    $constraint = new \Sjr\SjrOffers\Domain\Model\AttendanceRange;
		$this->assertEquals(0, $constraint->getMinimumValue());
		$this->assertEquals(0, $constraint->getMaximumValue());
	}
	
	/**
	 * @test
	 * @dataProvider providerForMinMaxValues
	 */
	public function theMinimumValueCanBeSet($minimumValue, $maximumValue) {
	    $constraint = new \Sjr\SjrOffers\Domain\Model\AttendanceRange;
		$constraint->setMinimumValue($minimumValue);
		$this->assertEquals($minimumValue, $constraint->getMinimumValue());
	}
	
	/**
	 * @test
	 * @dataProvider providerForMinMaxValues
	 */
	public function theMaximumValueCanBeSet($minimumValue, $maximumValue) {
	    $constraint = new \Sjr\SjrOffers\Domain\Model\AttendanceRange;
		$constraint->setMaximumValue($maximumValue);
		$this->assertEquals($maximumValue, $constraint->getMaximumValue());
	}
	
}
?>