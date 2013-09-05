<?php
namespace Sjr\SjrOffers\Controller;

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
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * The controller for actions related to Organizations
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class OrganizationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \Sjr\SjrOffers\Service\AccessControlService
	 * @inject
	 */
	protected $accessControlService;

	/**
	 * @var \Sjr\SjrOffers\Domain\Repository\OrganizationRepository
	 * @inject
	 */
	protected $organizationRepository;

	/**
	 * @var \Sjr\SjrOffers\Domain\Repository\OfferRepository
	 * @inject
	 */
	protected $offerRepository;

	/**
	 * @var \Sjr\SjrOffers\Domain\Repository\PersonRepository
	 * @inject
	 */
	protected $personRepository;

	/**
	 * @var \Sjr\SjrOffers\Domain\Repository\CategoryRepository
	 * @inject
	 */
	protected $categoryRepository;

	/**
	 * Index action for this controller. Displays a list of organizations.
	 *
	 * @return string The rendered view
	 */
	public function indexAction() {
		$this->view->assign('organizations', $this->organizationRepository->findByStates(\TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $this->settings['allowedStates'])));
	}
	
	/**
	 * Renders a single organization
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\Organization $organization The organization of which the offers should be displayed
	 * @param \Sjr\SjrOffers\Domain\Model\Person $newContact The contact to be created
	 * @return string The rendered HTML string
	 * @dontvalidate $newContact
	 */
	public function showAction(\Sjr\SjrOffers\Domain\Model\Organization $organization, \Sjr\SjrOffers\Domain\Model\Person $newContact = NULL) {
		if ($this->accessControlService->backendAdminIsLoggedIn() || $this->accessControlService->isLoggedIn($organization->getAdministrator())) {
			$contacts = $organization->getAllContacts();
			$this->view->assign('offers', $this->offerRepository->findForAdmin($organization));
		} else {
			$allowedStates = (strlen($this->settings['allowedStates']) > 0) ? \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $this->settings['allowedStates']) : array();
			$listCategories = (strlen($this->settings['listCategories']) > 0) ? \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $this->settings['listCategories']) : array();
			$contacts = $organization->getContacts();
			$demand = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('Sjr\\SjrOffers\\Domain\\Model\\Demand');
			$demand->setOrganization($organization);
			$this->view->assign('offers', $this->offerRepository->findDemanded(
				$demand,
				array(),
				$listCategories,
				$allowedStates
				));
		}
		$this->view->assign('contacts', $contacts);
		$this->view->assign('organization', $organization);
		$this->view->assign('newContact', $newContact);
	}
	
	/**
	 * Edits an existing organization
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\Organization $organization The organization to be edited
	 * @return string The rendered HTML-form
	 * @dontvalidate $organization
	 */
	public function editAction(\Sjr\SjrOffers\Domain\Model\Organization $organization) {
		if ($this->accessControlService->backendAdminIsLoggedIn() || $this->accessControlService->isLoggedIn($organization->getAdministrator())) {
			$this->view->assign('organization', $organization);
			$this->view->assign('contacts', $this->personRepository->findAll());
		} else {
			$this->flashMessages->add('Sie haben keine Berechtigung die Aktion auszuführen.');
		}
	}

	/**
	 * Updates an existing organization
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\Organization $organization A not yet persisted clone of the original organization containing the modifications
	 * @return void
	 */
	public function updateAction(\Sjr\SjrOffers\Domain\Model\Organization $organization) {
		if ($this->accessControlService->backendAdminIsLoggedIn() || $this->accessControlService->isLoggedIn($organization->getAdministrator())) {
			$this->organizationRepository->update($organization);
		} else {
			$this->flashMessages->add('Sie haben keine Berechtigung die Aktion auszuführen.');
		}
		$this->redirect('show', NULL, NULL, array('organization' => $organization));
	}

	/**
	 * Creates and attaches a contact
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\Organization $organization The organization the contact belongs to
	 * @param \Sjr\SjrOffers\Domain\Model\Person $newContact The contact to be created
	 * @return void
	 */
	public function createContactAction(\Sjr\SjrOffers\Domain\Model\Organization $organization, \Sjr\SjrOffers\Domain\Model\Person $newContact) {
		if ($this->accessControlService->backendAdminIsLoggedIn() || $this->accessControlService->isLoggedIn($organization->getAdministrator())) {
			$organization->addContact($newContact);
		} else {
			$this->flashMessages->add('Sie haben keine Berechtigung die Aktion auszuführen.');
		}
		$this->redirect('show', 'Organization', NULL, array('organization' => $organization));
	}
	
	/**
	 * Updates a contact
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\Organization $organization The organization the contact belongs to
	 * @param \Sjr\SjrOffers\Domain\Model\Person $contact The contact to be updated
	 * @return void
	 * @dontvalidatehmac
	 */
	public function updateContactAction(\Sjr\SjrOffers\Domain\Model\Organization $organization, \Sjr\SjrOffers\Domain\Model\Person $contact) {
		if ($this->accessControlService->backendAdminIsLoggedIn() || $this->accessControlService->isLoggedIn($organization->getAdministrator())) {
			$this->personRepository->update($contact);
		} else {
			$this->flashMessages->add('Sie haben keine Berechtigung die Aktion auszuführen.');
		}
		$this->redirect('show', 'Organization', NULL, array('organization' => $organization));
	}
	
	/**
	 * Detaches a contact form the organization
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\Organization $organization The organization the contact belongs to
	 * @param \Sjr\SjrOffers\Domain\Model\Person $contact The contact to be deleted
	 * @return void
	 * @dontvalidate $contact
	 */
	public function removeContactAction(\Sjr\SjrOffers\Domain\Model\Organization $organization, \Sjr\SjrOffers\Domain\Model\Person $contact) {
		if ($this->accessControlService->backendAdminIsLoggedIn() || $this->accessControlService->isLoggedIn($organization->getAdministrator())) {
			$organization->removeContact($contact);
			$this->personRepository->remove($contact);
		} else {
			$this->flashMessages->add('Sie haben keine Berechtigung die Aktion auszuführen.');
		}
		$this->redirect('show', 'Organization', NULL, array('organization' => $organization));
	}
	
	/**
	 * Removes an existing offer
	 *
	 * @param \Sjr\SjrOffers\Domain\Model\Offer $offer The offer to be deleted
	 * @return void
	 * @dontvalidate $offer
	 */
	public function removeOfferAction(\Sjr\SjrOffers\Domain\Model\Offer $offer) {
		if ($this->accessControlService->backendAdminIsLoggedIn() || $this->accessControlService->isLoggedIn($offer->getOrganization()->getAdministrator())) {
			$organization = $offer->getOrganization();
			$organization->removeOffer($offer);
		} else {
			$this->flashMessages->add('Sie haben keine Berechtigung die Aktion auszuführen.');
		}
		$this->redirect('show', 'Organization', NULL, array('organization' => $organization));
	}

	/**
	 * Deletes all existing organizations
	 *
	 * @return void
	 */
	public function deleteAllAction() {
		if ($this->accessControlService->backendAdminIsLoggedIn()) {
			$organizations = $this->organizationRepository->findAll();
			foreach ($organizations as $organization) {
				$this->organizationRepository->remove($organization);
			}
		} else {
			$this->flashMessages->add('Sie haben keine Berechtigung die Aktion auszuführen.');
		}
		$this->redirect('index');
	}	

}

?>
