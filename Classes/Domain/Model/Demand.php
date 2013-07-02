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
 * An Offer
 */
class Tx_SjrOffers_Domain_Model_Demand extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * @var Tx_SjrOffers_Domain_Model_Organization The demanded organization
	 **/
	protected $organization;
	
	/**
	 * @var string A search word
	 **/
	protected $searchWord;
	
	/**
	 * @var int The age criteria of the demand
	 **/
	protected $age;
	
	/**
	 * @var Tx_SjrOffers_Domain_Model_Category The demanded category
	 **/
	protected $category;
	
	/**
	 * @var Tx_SjrOffers_Domain_Model_Region The demanded region
	 **/
	protected $region;
	

	/**
	 * @param Tx_SjrOffers_Domain_Model_Organization $organization The demanded organization
	 * @return void
	 */
	public function setOrganization(Tx_SjrOffers_Domain_Model_Organization $organization = NULL) {
		$this->organization = $organization;
	}

	/**
	 * @return Tx_SjrOffers_Domain_Model_Organization The demanded organization
	 */
	public function getOrganization() {
		return $this->organization;
	}

	/**
	 * @param string The search word of the demand
	 * @return void
	 */
	public function setSearchWord($searchWord) {
		$this->searchWord = $searchWord;
	}

	/**
	 * @return string The search word of the demand
	 */
	public function getSearchWord() {
		return $this->searchWord;
	}
	
	/**
	 * @param string The age criteria of the demand
	 * @return void
	 */
	public function setAge($age) {
		$this->age = $age;
	}

	/**
	 * @return string The age criteria of the demand
	 */
	public function getAge() {
		return $this->age;
	}
	
	/**
	 * @param Tx_SjrOffers_Domain_Model_Category The demanded category
	 * @return void
	 */
	public function setCategory(Tx_SjrOffers_Domain_Model_Category $category = NULL) {
		$this->category = $category;
	}

	/**
	 * @return Tx_SjrOffers_Domain_Model_Category The demanded category
	 */
	public function getCategory() {
		return $this->category;
	}
	
	/**
	 * @param Tx_SjrOffers_Domain_Model_Region The demanded region
	 * @return void
	 */
	public function setRegion(Tx_SjrOffers_Domain_Model_Region $region = NULL) {
		$this->region = $region;
	}

	/**
	 * @return Tx_SjrOffers_Domain_Model_Region The demanded region
	 */
	public function getRegion() {
		return $this->region;
	}
	
}
?>