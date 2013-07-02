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
 * Testcase for the OrganizationController class
 */
class Tx_SjrOffers_Controller_OrganizationControllerTest extends Tx_Extbase_BaseTestCase {
	
	/**
	 * @test
	 */
	public function indexActionWorks() {
		$mockOrganizationRepository = $this->getMock('Tx_SjrOffers_Domain_Repository_OrganizationRepository', array('findAll'), array(), '', FALSE);		
		$mockOrganizationRepository->expects($this->once())->method('findAll')->will($this->returnValue(array('organization1', 'organization2')));

		$mockView = $this->getMock('Tx_Fluid_Core_View_TemplateView', array('assign'), array(), '', FALSE);
		$mockView->expects($this->once())->method('assign')->with('organizations', array('organization1', 'organization2'));

		$mockController = $this->getMock($this->buildAccessibleProxy('Tx_SjrOffers_Controller_OrganizationController'), array('dummy'), array(), '', FALSE);
		$mockController->_set('organizationRepository', $mockOrganizationRepository);
		$mockController->_set('view', $mockView);
		$mockController->indexAction();
	}	

}
?>