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
 * Wrapper for PHPs nl2br function.
 * @see http://www.php.net/manual/en/function.nl2br.php
 *
 * = Examples =
 *
 * <code title="Example">
 * <f:format.nl2li>{text_with_linebreaks}</f:format.nl2li>
 * </code>
 *
 * Output:
 * text with line breaks wrapped by <li> tags
 *
 * @version $Id$
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 * @api
 * @scope prototype
 */
class Tx_SjrOffers_ViewHelpers_Format_Nl2liViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Replaces newline characters by HTML line breaks.
	 *
	 * @return string the altered string.
	 */
	public function render() {
		$content = $this->renderChildren();
		if (!empty($content)) {
			$content = htmlspecialchars($content);
			$content = preg_replace('/^(.*)$/m', '<li>$1</li>', $content);
			$content = '<ul>' . $content . '</ul>';
		}
		return $content;
	}
}

?>