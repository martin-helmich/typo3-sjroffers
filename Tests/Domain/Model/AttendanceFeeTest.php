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
 * Testcase for the AttendanceFee class
 */
class Tx_SjrOffers_Domain_Model_AttendanceFeeTest extends Tx_Extbase_BaseTestCase {
	
	/**
	 * @test
	 */
	public function anInstanceOfTheAttendanceFeeCanBeConstructed() {
	    $offer = new Tx_SjrOffers_Domain_Model_AttendanceFee('1,56');
		$this->assertEquals('1.56', $offer->getAmount());
	}
	
	
	/**
	 * This is the data provider for weird amounts
	 *
	 * @return array An array of values
	 */
	public function providerForAmounts() {
		return array(
			array('1,56', '1.56'),
			array('28972', '28,972.00'),
			array('2', '2.00'),
			array('123.456.789,12345', '123,456,789.12'),
			);
	}
	
	/**
	 * @test
	 * @dataProvider providerForAmounts
	 */
	public function amountsAreNormalizedToEnglishNumberFromat($inputAmount, $normalizedAmount) {
	    $offer = $this->getMock($this->buildAccessibleProxy('Tx_SjrOffers_Domain_Model_AttendanceFee'), array('dummy'), array($inputAmount));
		$this->assertEquals($normalizedAmount, $offer->_call('normalizeAmount', $inputAmount));
	}
	
}
?>