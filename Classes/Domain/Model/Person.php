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
 * An Contact
 */
class Tx_SjrOffers_Domain_Model_Person extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * @var string The name of the contact
	 * @validate StringLength(minimum = 2, maximum = 80)	 
	 **/
	protected $name;
	
	/**
	 * @var string The role of the contact
	 **/
	protected $role;
	
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
	
	public function __construct($name = NULL) {
		$this->setName($name);
	}
	
	/**
	 * Sets the name of the contact
	 *
	 * @param string The name of the contact
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the name of the contact
	 * 
	 * @return string The name of the contact
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the role of the contact
	 *
	 * @param string The role of the contact
	 * @return void
	 */
	public function setRole($role) {
		$this->role = $role;
	}

	/**
	 * Returns the role of the contact
	 * 
	 * @return string The role of the contact
	 */
	public function getRole() {
		return $this->role;
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
}
?>