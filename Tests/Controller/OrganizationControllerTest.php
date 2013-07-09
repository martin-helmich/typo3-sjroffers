<?php
namespace Sjr\SjrOffers\Tests\Controller;

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
class OrganizationControllerTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	
	/**
	 * @test
	 */
	public function indexActionWorks() {
		$mockOrganizationRepository = $this->getMock('\\Sjr\\SjrOffers\\Domain\\Repository\\OrganizationRepository', array(), array(), '', FALSE);
		$mockOrganizationRepository->expects($this->once())->method('findByStates')->will($this->returnValue(array('organization1', 'organization2')));

		$mockView = $this->getMock('\\TYPO3\\CMS\\Fluid\\Core\\View\\TemplateView', array('assign'), array(), '', FALSE);
		$mockView->expects($this->once())->method('assign')->with('organizations', array('organization1', 'organization2'));

		$mockController = $this->getMock($this->buildAccessibleProxy('\\Sjr\\SjrOffers\\Controller\\OrganizationController'), array('dummy'), array(), '', FALSE);
		$mockController->_set('organizationRepository', $mockOrganizationRepository);
		$mockController->_set('view', $mockView);
		$mockController->indexAction();
	}	

}
?>
