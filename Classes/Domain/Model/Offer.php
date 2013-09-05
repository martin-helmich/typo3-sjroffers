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
class Offer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	
	/**
	 * @var \Sjr\SjrOffers\Domain\Model\Organization The organization the offer belogs to
	 **/
	protected $organization;
	
	/**
	 * @var string The title of the offer
	 * @validate NotEmpty
	 * @validate StringLength(minimum = 3, maximum = 50)
	 **/
	protected $title;
	
	/**
	 * @var string A single image of the offer
	 **/
	protected $image;
	
	/**
	 * @var string The teaser of the offer. A line of text.
	 * @validate StringLength(maximum = 150)
	 **/
	protected $teaser;
	
	/**
	 * @var string The description of the offer. A longer text.
	 * @validate StringLength(maximum = 2000)
	 **/
	protected $description;
	
	/**
	 * @var string The services of the offer.
	 * @validate StringLength(maximum = 1000)
	 **/
	protected $services;
	
	/**
	 * @var string The textual description of the dates. E.g. "Monday to Friday, 8-12"
	 * @validate StringLength(maximum = 1000)
	 **/
	protected $dates;
	
	/**
	 * @var string The venue of the offer. This is simply a text describing the venue ("Bulding 2, 2nd floor") 
	 * @validate StringLength(maximum = 1000)
	 **/
	protected $venue;
	
	/**
	 * @var \Sjr\SjrOffers\Domain\Model\AgeRange The age range of the offer.
	 * @validate \Sjr\SjrOffers\Domain\Validator\RangeConstraintValidator
	 **/
	protected $ageRange;
	
	/**
	 * @var \Sjr\SjrOffers\Domain\Model\DateRange The date range of the offer is valid.
	 * @validate \Sjr\SjrOffers\Domain\Validator\RangeConstraintValidator
	 **/
	protected $dateRange;

	/**
	 * @var \Sjr\SjrOffers\Domain\Model\AttendanceRange The attendance range of the offer.
	 * @validate \Sjr\SjrOffers\Domain\Validator\RangeConstraintValidator
	 **/
	protected $attendanceRange;
		
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sjr\SjrOffers\Domain\Model\AttendanceFee> The attendance fees of the offer.
	 * @lazy
	 **/
	protected $attendanceFees;
		
	/**
	 * @var \Sjr\SjrOffers\Domain\Model\Person The contact of the offer
	 **/
	protected $contact;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sjr\SjrOffers\Domain\Model\Category> The categories the offer is assigned to
	 * @lazy
	 **/
	protected $categories;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sjr\SjrOffers\Domain\Model\Region> The regions the offer is available
	 * @lazy
	 **/
	protected $regions;
	
	/**
	 * @param string $title The title of the offer
	 */
	public function __construct($title) {
		$this->setTitle($title);
		$this->setAttendanceFees(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage);
		$this->setCategories(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage);
		$this->setRegions(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage);
	}
	
	/**
	 * Sets the organization of the offer
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\Organization The organization the offer belongs to
	 * @return void
	 */
	public function setOrganization(\Sjr\SjrOffers\Domain\Model\Organization $organization = NULL) {
		$this->organization = $organization;
	}

	/**
	 * Returns the organization of the offer
	 * 
	 * @return \Sjr\SjrOffers\Domain\Model\Organization The organization the offer belongs to
	 */
	public function getOrganization() {
		if ($this->organization instanceof \TYPO3\CMS\Extbase\Persistence\LazyLoadingProxy) {
		  $this->organization->_loadRealInstance();
		}
		return $this->organization;
	}

	/**
	 * Sets the title of the offer
	 *
	 * @param string The title of the offer
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the title of the offer
	 * 
	 * @return string The title of the offer
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the image of the offer
	 *
	 * @param string The image of the offer (the filename)
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Returns the image of the offer
	 * 
	 * @return string The image of the offer (the filename)
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the teaser of the offer
	 *
	 * @param string The teaser of the offer
	 * @return void
	 */
	public function setTeaser($teaser) {
		$this->teaser = $teaser;
	}

	/**
	 * Returns the teaser of the offer
	 * 
	 * @return string The teaser of the offer
	 */
	public function getTeaser() {
		return $this->teaser;
	}

 	/**
	 * Sets the description of the offer
	 *
	 * @param string The description of the offer
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the description of the offer
	 * 
	 * @return string The description of the offer
	 */
	public function getDescription() {
		return $this->description;
	}
	
 	/**
	 * Sets the services of the offer
	 *
	 * @param string The services of the offer
	 * @return void
	 */
	public function setServices($services) {
		$this->services = $services;
	}

	/**
	 * Returns the services of the offer
	 * 
	 * @return string The services of the offer
	 */
	public function getServices() {
		return $this->services;
	}
	
	/**
	 * Sets the dates of the offer. This is simply a text describing the dates.
	 * "Monday to Friday, 6pm to 9pm"
	 *
	 * @param string The dates of the offer
	 * @return void
	 */
	public function setDates($dates) {
		$this->dates = $dates;
	}

	/**
	 * Returns the dates of the offer
	 * 
	 * @return string The dates of the offer
	 */
	public function getDates() {
		return $this->dates;
	}
	
	/**
	 * Sets the venue the offer takes place. This is simply a text describing the venue.
	 * "Bulding 2, 2nd floor"
	 *
	 * @param string The venue of the offer
	 * @return void
	 */
	public function setVenue($venue) {
		$this->venue = $venue;
	}

	/**
	 * Returns the venue of the offer
	 * 
	 * @return string The venue of the offer
	 */
	public function getVenue() {
		return $this->venue;
	}
	
	/**
	 * Sets the age range of the offer
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\AgeRange The age range of the offer
	 * @return void
	 */
	public function setAgeRange(\Sjr\SjrOffers\Domain\Model\AgeRange $ageRange = NULL) {
		$this->ageRange = $ageRange;
	}

	/**
	 * Returns the age range of the offer
	 * 
	 * @return \Sjr\SjrOffers\Domain\Model\AgeRange The age range of the offer
	 */
	public function getAgeRange() {
		return $this->ageRange;
	}

	/**
	 * Sets the date range the offer is valid
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\DateRange The date range of the offer
	 * @return void
	 */
	public function setDateRange(\Sjr\SjrOffers\Domain\Model\DateRange $dateRange = NULL) {
		$this->dateRange = $dateRange;
	}
	
	/**
	 * Returns the date range the offer is valid
	 * 
	 * @return \Sjr\SjrOffers\Domain\Model\DateRange The date range the offer is valid
	 */
	public function getDateRange() {
		return $this->dateRange;
	}

	/**
	 * Sets the attendance range the offer
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\AttendanceRange The attendance range of the offer
	 * @return void
	 */
	public function setAttendanceRange(\Sjr\SjrOffers\Domain\Model\AttendanceRange $attendanceRange = NULL) {
		$this->attendanceRange = $attendanceRange;
	}

	/**
	 * Returns the attendance range of the offer
	 * 
	 * @return \Sjr\SjrOffers\Domain\Model\AttendanceRange The attendance range of the offer
	 */
	public function getAttendanceRange() {
		return $this->attendanceRange;
	}
	
	/**
	 * Sets the attendance fee for the offer
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage The attendance fees of the offer
	 * @return void
	 */
	public function setAttendanceFees(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $attendanceFees) {
		$this->attendanceFees = $attendanceFees;
	}

	/**
	 * Returns the attendance fee of the offer
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage The attendance fees for the offer
	 */
	public function getAttendanceFees() {
		return $this->attendanceFees;
	}
	
	/**
	 * Adds an attendance fee to the offer
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\AttendanceFee The attendance fee to be added
	 * @return void
	 */
	public function addAttendanceFee(\Sjr\SjrOffers\Domain\Model\AttendanceFee $attendanceFee) {
		$this->attendanceFees->attach($attendanceFee);
	}

	/**
	 * Remove an attendance fee from the offer
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\AttendanceFee The attendance fee to be removed
	 * @return void
	 */
	public function removeAttendanceFee(\Sjr\SjrOffers\Domain\Model\AttendanceFee $attendanceFee) {
		$this->attendanceFees->detach($attendanceFee);
	}

	/**
	 * Remove all attendance fees from the offer
	 *
	 * @return void
	 */
	public function removeAllAttendanceFees() {
		$this->attendanceFees = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage;
	}

	/**
	 * Sets the contact of the offer
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\Person $contact The contact of the offer
	 * @return void
	 */
	public function setContact(\Sjr\SjrOffers\Domain\Model\Person $contact) {
		$this->contact = $contact;
	}

	/**
	 * Removes the contact from the offer
	 *
	 * @return void
	 */
	public function removeContact() {
		$this->contact = NULL;
	}

	/**
	 * Returns the contact of the offer
	 *
	 * @return \Sjr\SjrOffers\Domain\Model\Person The contact of the offer
	 */
	public function getContact() {
		return $this->contact;
	}

	/**
	 * Sets the categories of the offer
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sjr\SjrOffers\Domain\Model\Category> The categories the offer is assigned to
	 * @return void
	 */
	public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories) {
		$this->categories = $categories;
	}

	/**
	 * Returns the categories of the offer
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sjr\SjrOffers\Domain\Model\Category> The categories of the offer
	 */
	public function getCategories() {
		return clone $this->categories;
	}
	
	/**
	 * Adds a category to the offer
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\Category The category to be added
	 * @return void
	 */
	public function addCategory(\Sjr\SjrOffers\Domain\Model\Category $category) {
		$this->categories->attach($category);
	}

	/**
	 * Remove a category from the offer
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\Category The category to be removed
	 * @return void
	 */
	public function removeCategory(\Sjr\SjrOffers\Domain\Model\Category $category) {
		$this->categories->detach($category);
	}

	/**
	 * Sets the regions of the offer
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sjr\SjrOffers\Domain\Model\Region> The regions the offer is available
	 * @return void
	 */
	public function setRegions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $regions) {
		$this->regions = $regions;
	}

	/**
	 * Returns the regions of the offer
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sjr\SjrOffers\Domain\Model\Region> The regions of the offer
	 */
	public function getRegions() {
		return $this->regions;
	}
	
	/**
	 * Adds a region to the offer
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\Region The region to be added
	 * @return void
	 */
	public function addRegion(\Sjr\SjrOffers\Domain\Model\Region $region) {
		$this->regions->attach($region);
	}

	/**
	 * Remove a region from the offer
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\Region The region to be removed
	 * @return void
	 */
	public function removeRegion(\Sjr\SjrOffers\Domain\Model\Region $region) {
		$this->regions->detach($region);
	}
	
}
?>
