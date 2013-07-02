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
 * A Category
 */
class Tx_SjrOffers_Domain_Model_Category extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * @var string The title of the category
	 **/
	protected $title;
	
	/**
	 * @var string The description of the category.
	 **/
	protected $description;
	
	/**
	 * @var boolean Flag, indicating if the category is internal.
	 **/
	protected $isInternal = FALSE;
	
	/**
	 * Constructs this category
	 *
	 * @param string $title The title of the category
	 */
	public function __construct($title) {
		$this->setTitle($title);
	}
	
	/**
	 * Sets the title of the category
	 *
	 * @param string The title of the category
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the title of the category
	 * 
	 * @return string The title of the category
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the description of the category
	 *
	 * @param string The description of the category
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the description of the category
	 * 
	 * @return string The description of the category
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * @return bool The state of the flag indicating if the category is internal or not.
	 */
	public function getIsInternal() {
		return $this->isInternal;
	}
	
	/**
	 * @param bool $isInternal State of the flag indicating if the category is internal or not.
	 */
	public function setIsInternal($isInternal) {
		$this->isInternal = (bool)$isInternal;
	}
	
	/**
	 * Converts the value object to a string reprsentation
	 *
	 * @return string The string representation of the category
	 */
	public function __toString() {
		return (string)$this->title;
	}

}
?>