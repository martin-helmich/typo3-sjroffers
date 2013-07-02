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
 * An amount
 */
class Tx_SjrOffers_Domain_Model_AttendanceFee extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * @var string The amount.
	 * @validate Tx_SjrOffers_Domain_Validator_AmountValidator
	 **/
	protected $amount = '0.00';
		
	/**
	 * @var string The fee comment (e.g. a target group)
	 **/
	protected $comment;
	
	/**
	 * Constructs this AttendanceFee
	 *
	 * @param string $amount The amount
	 * @param string $comment The comment
	 * @return void
	 */
	public function __construct($amount, $comment = '') {
		$this->setAmount($amount);
		$this->setComment($comment);
	}
		
	/**
	 * Sets the amount for the attendance fee
	 *
	 * @param string The amount for the attendance fee
	 * @return void
	 */
	public function setAmount($amount) {
		$this->amount = $this->normalizeAmount($amount);
	}

	/**
	 * Returns the amount of the attendance fee
	 * 
	 * @return string The amount of the attendance fee
	 */
	public function getAmount() {
		return $this->amount;
	}

	/**
	 * Sets the comment of the attendance fee
	 *
	 * @param string The comment of the attendance fee
	 * @return void
	 */
	public function setComment($comment = '') {
		$this->comment = $comment;
	}

	/**
	 * Returns the comment of the attendance fee
	 * 
	 * @return string The comment of the attendance fee
	 */
	public function getComment() {
		return $this->comment;
	}

	/**
	 * Normalizes a german amount to english format
	 *
	 * @param string $input The input
	 * @return string The normalized string
	 */
	protected function normalizeAmount($input) {
		if (!is_string($input)) return $input;
		$input = str_replace('.', '', $input);
		$input = str_replace(',', '.', $input);
		return number_format($input, 2);
	}
	
	public function __toString() {
		return $this->getAmount() . ' (' . $this->getComment() . ')';
	}
	
}
?>