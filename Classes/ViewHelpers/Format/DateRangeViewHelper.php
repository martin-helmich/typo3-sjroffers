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
 * View helper for rendering contraints.
 */
class Tx_SjrOffers_ViewHelpers_Format_DateRangeViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Render the supplied range as formatted string
	 *
	 * @param Tx_SjrOffers_Domain_Model_DateRangeInterface $range The date range
	 * @return string Formatted range
	 */
	public function render(Tx_SjrOffers_Domain_Model_DateRangeInterface $range = NULL) {
		$output = '';
		if ($range === NULL) {
			$range = $this->renderChildren();
		}
		if ($range instanceof Tx_SjrOffers_Domain_Model_DateRangeInterface) {
			$minimumValue = $range->getMinimumValue();
			if ($minimumValue instanceof DateTime) {
				$plainMinimumValue = $minimumValue->format('U');
			}
			$maximumValue = $range->getMaximumValue();
			if ($maximumValue instanceof DateTime) {
				$plainMaximumValue = $maximumValue->format('U');
			}
			if (empty($plainMinimumValue) && empty($plainMaximumValue)) {
				$output = 'ganzjährig';
			} elseif (empty($plainMinimumValue) && !empty($plainMaximumValue)) {
				$output = 'bis ' . $maximumValue->format('d.m.Y');
			} elseif (!empty($plainMinimumValue) && empty($plainMaximumValue)) {
				$output = 'ab ' . $minimumValue->format('d.m.Y');
			} else {
				if ($minimumValue->format('d.m.Y') === $maximumValue->format('d.m.Y')) {
					$output = 'am ';
					$output .= $minimumValue->format('d.m.Y');
				} else {
					$output = $minimumValue->format('d.m.Y');					
					$output .= '&nbsp;-&nbsp;';					
					$output .= $maximumValue->format('d.m.Y');					
				}
			}
		} else {
			$output = 'ganzjährig';
		}
		return $output;
	}
	
}
?>