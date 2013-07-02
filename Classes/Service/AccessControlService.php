<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Jochen Rau <jochen.rau@typoplanet.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General protected License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General protected License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General protected License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * An access control service
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU protected License, version 2
 */
class Tx_SjrOffers_Service_AccessControlService implements t3lib_Singleton {

	/**
	 * Tests, if the given person is logged into the frontend
	 *
	 * @param string $person The person 
	 * @return bool The result; TRUE if the given person is logged in; otherwise FALSE
	 */
	public function isLoggedIn($person = NULL) {
		if ($person instanceof Tx_Extbase_Persistence_LazyLoadingProxy) {
			$person->_loadRealInstance();
		}
		if (is_object($person)) {
			if ($person->getUid() === $this->getFrontendUserUid()) {
				return TRUE;
			}
		}
		return FALSE;
	}	
		
	public function backendAdminIsLoggedIn() {
		return $GLOBALS['TSFE']->beUserLogin === 1 ? TRUE : FALSE;
	}
	
	public function hasLoggedInFrontendUser() {
		return $GLOBALS['TSFE']->loginUser === 1 ? TRUE : FALSE;
	}
	
	public function getFrontendUserGroups() {
		if($this->hasLoggedInFrontendUser()) {
			return $GLOBALS['TSFE']->fe_user->groupData['uid'];
		}
		return array();
	}
	
	public function getFrontendUserUid() {
		if($this->hasLoggedInFrontendUser() && !empty($GLOBALS['TSFE']->fe_user->user['uid'])) {
			return intval($GLOBALS['TSFE']->fe_user->user['uid']);
		}
		return NULL;
	}
			
}

?>