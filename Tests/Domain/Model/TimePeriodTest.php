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
 * Testcase for a numeric range
 */
class Tx_SjrOffers_Domain_Model_DateRangeTest extends Tx_Extbase_BaseTestCase {
	
	/**
	 * This is the data provider for minimum and maximum values
	 *
	 * @return array An array of values
	 */
	public function providerForMinMaxValues() {
		return array(
			array(new Tx_SjrOffers_Domain_Model_DateTime('1968-08-01 12:10:35'), new Tx_SjrOffers_Domain_Model_DateTime('2030-10-01 14:15:25')),
			array(new Tx_SjrOffers_Domain_Model_DateTime('today'), new Tx_SjrOffers_Domain_Model_DateTime('tomorrow')),
			);
	}
	
	/**
	 * @test
	 */
	public function theMinimumAndMaximumValueCanBeSetAtConstructionTime() {
	    $dateRange = new Tx_SjrOffers_Domain_Model_DateRange(new Tx_SjrOffers_Domain_Model_DateTime('2009-10-01 12:10:35'), new Tx_SjrOffers_Domain_Model_DateTime('2009-10-03 14:15:25'));
		$this->assertEquals('2009-10-01 12:10:35', $dateRange->getMinimumValue()->format('Y-m-d H:i:s'));
		$this->assertEquals('2009-10-03 14:15:25', $dateRange->getMaximumValue()->format('Y-m-d H:i:s'));
	}
	
	/**
	 * @test
	 * @dataProvider providerForMinMaxValues
	 */
	public function theMinimumValueCanBeSet($minimumValue, $maximumValue) {
	    $dateRange = new Tx_SjrOffers_Domain_Model_DateRange;
		$dateRange->setMinimumValue($minimumValue);
		$this->assertEquals($minimumValue->format('Y-m-d H:i:s'), $dateRange->getMinimumValue()->format('Y-m-d H:i:s'));
	}
	
	/**
	 * @test
	 * @dataProvider providerForMinMaxValues
	 */
	public function theMaximumValueCanBeSet($minimumValue, $maximumValue) {
	    $dateRange = new Tx_SjrOffers_Domain_Model_DateRange;
		$dateRange->setMaximumValue($maximumValue);
		$this->assertEquals($maximumValue->format('Y-m-d H:i:s'), $dateRange->getMaximumValue()->format('Y-m-d H:i:s'));
	}
		
}
?>