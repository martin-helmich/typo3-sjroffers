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
 * A Region
 */
class Tx_SjrOffers_Domain_Model_Region extends Tx_Extbase_DomainObject_AbstractValueObject {
	
	/**
	 * @var string The name of the region
	 **/
	protected $name;
	
	/**
	 * Constructs this region
	 *
	 * @param string $name The name of the region
	 */
	public function __construct($name) {
		$this->name = $name;
	}
	
	/**
	 * Returns the name of the region
	 * 
	 * @return string The name of the region
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Converts the value object to a string reprsentation
	 *
	 * @return string The string representation of the region
	 */
	public function __toString() {
		return (string)$this->name;
	}

}
?>