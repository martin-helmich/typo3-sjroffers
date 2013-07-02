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
 * A status of an organization
 */
class Tx_SjrOffers_Domain_Model_Status extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * @var string The title of the status
	 **/
	protected $title;
	
	/**
	 * @var string The description of the status.
	 **/
	protected $description;
	
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_SjrOffers_Domain_Model_Category> The allowed categories for the organization having the status
	 **/
	protected $allowedCategories;
	
	/**
	 * Constructs this status
	 *
	 * @param string $title The title of the status
	 */
	public function __construct($title) {
		$this->setTitle($title);
		$this->setAllowedCategories(new Tx_Extbase_Persistence_ObjectStorage);
	}
	
	/**
	 * Sets the title of the status
	 *
	 * @param string The title of the status
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the title of the status
	 * 
	 * @return string The title of the status
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the description of the status
	 *
	 * @param string The description of the status
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the description of the status
	 * 
	 * @return string The description of the status
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * Sets the categories of the organization
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_SjrOffers_Domain_Model_Category> The categories the organization is assigned to
	 * @return void
	 */
	public function setAllowedCategories(Tx_Extbase_Persistence_ObjectStorage $allowedCategories) {
		$this->allowedCategories = $allowedCategories;
	}

	/**
	 * Returns the categories of the organization
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_SjrOffers_Domain_Model_Category> The categories of the organization
	 */
	public function getAllowedCategories() {
		return clone $this->allowedCategories;
	}
	
	/**
	 * Adds a category to the organization
	 *
	 * @param Tx_SjrOffers_Domain_Model_Category The category to be added
	 * @return void
	 */
	public function addCategory(Tx_SjrOffers_Domain_Model_Category $allowedCategory) {
		$this->allowedCategories->attach($allowedCategory);
	}

	/**
	 * Remove a category from the organization
	 *
	 * @param Tx_SjrOffers_Domain_Model_Category The category to be removed
	 * @return void
	 */
	public function removeCategory(Tx_SjrOffers_Domain_Model_Category $allowedCategory) {
		$this->allowedCategories->detach($allowedCategory);
	}
		
	/**
	 * Converts the value object to a string reprsentation
	 *
	 * @return string The string representation of the status
	 */
	public function __toString() {
		return (string)$this->title;
	}

}
?>