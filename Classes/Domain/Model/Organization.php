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
 * An Organization
 */
class Tx_SjrOffers_Domain_Model_Organization extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * @var Tx_SjrOffers_Domain_Model_Status The status of the organization
	 **/
	protected $status;

	/**
	 * @var string The name of the organization
	 **/
	protected $name;

	/**
	 * @var string The address of the contact
	 **/
	protected $address;
	
	/**
	 * @var string The telephone number of the contact
	 **/
	protected $telephoneNumber;
		
	/**
	 * @var string The telephone number of the contact
	 **/
	protected $telefaxNumber;
	
	/**
	 * @var string The url of the homepage of the contact
	 **/
	protected $url;
	
	/**
	 * @var string The email address of the homepage of the contact
	 **/
	protected $emailAddress;
	
	/**
	 * @var string The description of the organization
	 **/
	protected $description;
	
	/**
	 * @var string An image (logo) of the organization
	 **/
	protected $image;
	
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_SjrOffers_Domain_Model_Person> The contacts of the organization
	 * @lazy
	 **/
	protected $contacts;
	
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_SjrOffers_Domain_Model_Offer> The offers the organization has to offer
	 * @lazy
	 * @cascade remove
	 **/
	protected $offers;
	
	/**
	 * @var Tx_SjrOffers_Domain_Model_Administrator The administrator of the organization.
	 * @lazy
	 **/
	protected $administrator;
	
	public function __construct($name) {
	    $this->setName($name);
	    $this->contacts = new Tx_Extbase_Persistence_ObjectStorage;
	    $this->offers = new Tx_Extbase_Persistence_ObjectStorage;
	}
	
	/**
	 * Setter for status
	 *
	 * @param Tx_SjrOffers_Domain_Model_Status $status The status of the organization
	 * @return void
	 */
	public function setStatus(Tx_SjrOffers_Domain_Model_Status $status) {
		$this->status = $status;
	}

	/**
	 * Getter for status
	 *
	 * @return Tx_SjrOffers_Domain_Model_Status $status The status of the organization
	 */
	public function getStatus() {
		return $this->status;
	}
	
	/**
	 * Sets the name of the organization
	 *
	 * @param string The name of the organization
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the name of the organization
	 * 
	 * @return string The name of the organization
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Sets the address of the contact
	 *
	 * @param string The address of the contact
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}
	
	/**
	 * Returns the address of the contact
	 *
	 * @return string The address of the contact
	 */
	public function getAddress() {
		return $this->address;
	}
	
	/**
	 * Sets the telephone number of the contact
	 *
	 * @param string The telephone number of the contact
	 * @return void
	 */
	public function setTelephoneNumber($telephoneNumber) {
		$this->telephoneNumber = $telephoneNumber;
	}
	
	/**
	 * Returns the telephone number of the contact
	 *
	 * @return string The telephone number of the contact
	 */
	public function getTelephoneNumber() {
		return $this->telephoneNumber;
	}
	
	/**
	 * Sets the telefax number of the contact
	 *
	 * @param string The telefax number of the contact
	 * @return void
	 */
	public function setTelefaxNumber($telefaxNumber) {
		$this->telefaxNumber = $telefaxNumber;
	}
	
	/**
	 * Returns the telefax number of the contact
	 *
	 * @return string The telefax number of the contact
	 */
	public function getTelefaxNumber() {
		return $this->telefaxNumber;
	}
	
	/**
	 * Sets the Url of the contact
	 *
	 * @param string The url of the contact
	 * @return void
	 */
	public function setUrl($url) {
		$this->url = $url;
	}
	
	/**
	 * Returns the Url of the contact
	 *
	 * @return string The Url of the contact
	 */
	public function getUrl() {
		return $this->url;
	}
	
	/**
	 * Sets the email address of the contact
	 *
	 * @param string The email address of the contact
	 * @return void
	 */
	public function setEmailAddress($emailAddress) {
		$this->emailAddress = $emailAddress;
	}
	
	/**
	 * Returns the email address of the contact
	 *
	 * @return string The email address of the contact
	 */
	public function getEmailAddress() {
		return $this->emailAddress;
	}

	/**
	 * Sets the description of the organization
	 *
	 * @param string The description of the organization
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the description of the organization
	 * 
	 * @return string The description of the organization
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the image of the organization
	 *
	 * @param string The image of the organization (the filename)
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Returns the image of the organization
	 * 
	 * @return string The image of the organization (the filename)
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the contacts of the organization
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage $contacts The contacts of the organization
	 * @return void
	 */
	public function setContacts(Tx_Extbase_Persistence_ObjectStorage $contacts) {
		$this->contacts = $contacts;
	}

	/**
	 * Returns the contacts of the organization
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_SjrOffers_Domain_Model_Person> The contacts of the organization
	 */
	public function getContacts() {
		return clone $this->contacts;
	}
	
	/**
	 * Returns the contacts of the organization and all related offers.
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_SjrOffers_Domain_Model_Person> The contacts of the organization
	 */
	public function getAllContacts() {
		$contacts = $this->getContacts();
		foreach ($this->getOffers() as $offer) {
			$contact = $offer->getContact();
			if (is_object($contact)) {
				$contacts->attach($contact);
			}
		}
		return $contacts;
	}
	
	/**
	 * Adds a contact to the organization
	 *
	 * @param Tx_SjrOffers_Domain_Model_Person The contact to be added
	 * @return void
	 */
	public function addContact(Tx_SjrOffers_Domain_Model_Person $contact) {
		$this->contacts->attach($contact);
	}

	/**
	 * Remove a contact from the organization
	 *
	 * @param Tx_SjrOffers_Domain_Model_Person The contact to be removed
	 * @return void
	 */
	public function removeContact(Tx_SjrOffers_Domain_Model_Person $contact) {
		$this->contacts->detach($contact);
	}

	/**
	 * Sets the offers of the organization
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_SjrOffers_Domain_Model_Offer> The offers of the organization
	 */
	public function setOffers(Tx_Extbase_Persistence_ObjectStorage $offers) {
		$this->offers = $offers;
	}
		
	/**
	 * Returns the offers of the organization
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_SjrOffers_Domain_Model_Offer> The offers of the organization
	 */
	public function getOffers() {
		return clone $this->offers;
	}
			
	/**
	 * Adds an offer to the organization
	 *
	 * @param Tx_SjrOffers_Domain_Model_Offer The offer to be added
	 * @return void
	 */
	public function addOffer(Tx_SjrOffers_Domain_Model_Offer $offer) {
		$this->offers->attach($offer);
	}

	/**
	 * Remove an offer from the organization
	 *
	 * @param Tx_SjrOffers_Domain_Model_Offer The offer to be removed
	 * @return void
	 */
	public function removeOffer(Tx_SjrOffers_Domain_Model_Offer $offer) {
		$this->offers->detach($offer);
	}

	/**
	 * Remove all offers from this organization
	 *
	 * @return void
	 */
	public function removeAllOffers() {
		$this->offers = new Tx_Extbase_Persistence_ObjectStorage();
	}
	
	/**
	 * Returns the administrator of the organization
	 * 
	 * @return  Tx_SjrOffers_Domain_Model_Administrator The administrator of the organization
	 */
	public function getAdministrator() {
		if ($this->administrator instanceof Tx_Extbase_PErsistence_LazyLoadingProxy) {
		  $this->administrator->_loadRealInstance();
		}
		return $this->administrator;
	}

}
?>