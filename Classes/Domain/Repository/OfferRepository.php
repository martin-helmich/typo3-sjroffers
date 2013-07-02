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
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * A repository for Offers
 */
class Tx_SjrOffers_Domain_Repository_OfferRepository extends Tx_Extbase_Persistence_Repository {
	
	/**
	 * Finds all offers that are offerd by the given organization
	 *
	 * @param array $listCategories An array of categories the offer has to be assigned to
	 * @return array Matched offers
	 */
	public function findForAdmin(Tx_SjrOffers_Domain_Model_Organization $organization, array $listCategories = array()) {
		$query = $this->createQuery();
		$query->matching(
			$query->equals('organization', $organization)
			);
		$query->setOrderings(
			array(
				'dateRange.minimumValue' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING,
				'dateRange.maximumValue' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING
				)
			);
		return $query->execute();
	}
	
	/**
	 * Finds all offers that meets the specified demand.
	 *
	 * @param Tx_SjrOffers_Domain_Model_Demand $demand 
	 * @param array $propertiesToSearch A array of properties to be searched for occurrances of the search word
	 * @param array $listCategories An array of categories the offer has to be assigned to
	 * @param array $allowedStates An array of allowed states of the organization
	 * @return array Matched offers
	 */
	public function findDemanded(Tx_SjrOffers_Domain_Model_Demand $demand = NULL, array $propertiesToSearch = array(), array $listCategories = array(), array $allowedStates = array()) {
		$query = $this->createQuery();
		$constraints = array();
		if ($demand !== NULL) {
			if ($demand->getRegion() !== NULL) {
				$constraints[] = $query->contains('regions', $demand->getRegion());
			}
			if ($demand->getCategory() !== NULL) {
				$constraints[] = $query->contains('categories', $demand->getCategory());
			}
			if ($demand->getOrganization() !== NULL) {
				$constraints[] = $query->equals('organization', $demand->getOrganization());
			}
			if (is_string($demand->getSearchWord()) && strlen($demand->getSearchWord()) > 0) {
				$searchWordConstraints = array();
				foreach ($propertiesToSearch as $propertyName) {
					$searchWordConstraints[] = $query->like($propertyName, '%' . $demand->getSearchWord() . '%');
				}
				$constraints[] = $query->logicalOr($searchWordConstraints);
			}
			$demandedAge = $demand->getAge();
			if (!empty($demandedAge)) {
				$constraints[] = $query->logicalAnd(
					$query->logicalOr(
						$query->equals('ageRange.minimumValue', NULL), 
						$query->equals('ageRange.minimumValue', 0), 
						$query->lessThanOrEqual('ageRange.minimumValue', $demandedAge)
						),
					$query->logicalOr(
						$query->equals('ageRange.maximumValue', NULL), 
						$query->equals('ageRange.maximumValue', 0), 
						$query->greaterThanOrEqual('ageRange.maximumValue', $demandedAge)
						)
					);
			}
		}
		if (count($listCategories) >0) {
			$categoryConstraints = array();
			foreach ($listCategories as $listCategory) {
				$categoryConstraints[] = $query->contains('categories', $listCategory);
			}
			$constraints[] = $query->logicalOr($categoryConstraints);
		}
		if (count($allowedStates) > 0) {
			$constraints[] = $query->in('organization.status', $allowedStates);
		}
		$query->setOrderings(
			array(
				'dateRange.minimumValue' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING,
				'dateRange.maximumValue' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING
				)
			);
		
		$dateConstraint = $query->logicalAnd(
			$query->logicalNot(
				$query->logicalAnd(
					$query->logicalOr(
						$query->equals('dateRange.minimumValue', NULL), 
						$query->equals('dateRange.minimumValue', 0)
						),
					$query->logicalOr(
						$query->equals('dateRange.maximumValue', NULL), 
						$query->equals('dateRange.maximumValue', 0)
						)
					)	
				),
				$query->greaterThan('dateRange.maximumValue', (time() - 60*60*24*2))
			);
		$query->matching($query->logicalAnd(array_merge($constraints, array($dateConstraint))));
		$scheduledOffers = $query->execute();
		
		$dateConstraint = $query->logicalOr(
			$query->equals('dateRange', NULL), 
			$query->equals('dateRange', 0),
			$query->logicalAnd(
				$query->logicalOr(
					$query->equals('dateRange.minimumValue', NULL), 
					$query->equals('dateRange.minimumValue', 0)
					),
				$query->logicalOr(
					$query->equals('dateRange.maximumValue', NULL), 
					$query->equals('dateRange.maximumValue', 0)
					)
				)
			);
		$query->matching($query->logicalAnd(array_merge($constraints, array($dateConstraint))));
		$yearRoundOffers = $query->execute();
		return array_merge($scheduledOffers, $yearRoundOffers);
	}
	
}
?>