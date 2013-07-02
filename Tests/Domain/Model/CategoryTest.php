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
 * Testcase for the Category class
 */
class Tx_SjrOffers_Domain_Model_CategoryTest extends Tx_Extbase_BaseTestCase {
	
	/**
	 * @test
	 */
	public function anInstanceOfTheCategoryCanBeConstructed() {
	    $category = new Tx_SjrOffers_Domain_Model_Category('The Category');
		$this->assertEquals('The Category', $category->getTitle());
	}

	/**
	 * @test
	 */
	public function theTitleOfTheCategoryCanBeSet() {
	    $category = new Tx_SjrOffers_Domain_Model_Category('The Category');
		$title = 'Another title';
		$category->setTitle($title);
		$this->assertEquals($title, $category->getTitle());
	}
	
	/**
	 * @test
	 */
	public function theDescriptionOfTheCategoryCanBeSet() {
	    $category = new Tx_SjrOffers_Domain_Model_Category;
		$description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.\nUt enim ad minim veniam, quis nostrud.";
		$category->setDescription($description);
		$this->assertEquals($description, $category->getDescription());
	}
	
	/**
	 * @test
	 */
	public function theCategoryCanBeConvertedToString() {
	    $category = new Tx_SjrOffers_Domain_Model_Category('The Category');
		$this->assertEquals('The Category', $category->__toString());
	}	
	
	/**
	 * @test
	 */
	public function isInternalFlagDefaultsToFalse() {
	    $category = new Tx_SjrOffers_Domain_Model_Category('The Category');
		$this->assertFalse($category->getIsInternal());
	}
	
	/**
	 * @test
	 */
	public function isInternalFlagCanBeSet() {
	    $category = new Tx_SjrOffers_Domain_Model_Category('The Category');
		$category->setIsInternal(FALSE);
		$this->assertFalse($category->getIsInternal());
		$category->setIsInternal(TRUE);
		$this->assertTrue($category->getIsInternal());
	}
	
}
?>