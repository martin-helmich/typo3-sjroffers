<?php
namespace Sjr\SjrOffers\Domain\Model;

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
class Demand extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	
	/**
	 * @var \Sjr\SjrOffers\Domain\Model\Organization The demanded organization
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
	 * @var \Sjr\SjrOffers\Domain\Model\Category The demanded category
	 **/
	protected $category;
	
	/**
	 * @var \Sjr\SjrOffers\Domain\Model\Region The demanded region
	 **/
	protected $region;
	

	/**
	 * @param \Sjr\SjrOffers\Domain\Model\Organization $organization The demanded organization
	 * @return void
	 */
	public function setOrganization(\Sjr\SjrOffers\Domain\Model\Organization $organization = NULL) {
		$this->organization = $organization;
	}

	/**
	 * @return \Sjr\SjrOffers\Domain\Model\Organization The demanded organization
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
	 * @param \Sjr\SjrOffers\Domain\Model\Category The demanded category
	 * @return void
	 */
	public function setCategory(\Sjr\SjrOffers\Domain\Model\Category $category = NULL) {
		$this->category = $category;
	}

	/**
	 * @return \Sjr\SjrOffers\Domain\Model\Category The demanded category
	 */
	public function getCategory() {
		return $this->category;
	}
	
	/**
	 * @param \Sjr\SjrOffers\Domain\Model\Region The demanded region
	 * @return void
	 */
	public function setRegion(\Sjr\SjrOffers\Domain\Model\Region $region = NULL) {
		$this->region = $region;
	}

	/**
	 * @return \Sjr\SjrOffers\Domain\Model\Region The demanded region
	 */
	public function getRegion() {
		return $this->region;
	}
	
}
?>