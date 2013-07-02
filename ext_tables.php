<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'List', 'A List of Offers');
Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Organizations', 'A List of Organizations');
Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Admin', 'FE-Admin Plugin');

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Basic Configuration');

t3lib_extMgm::allowTableOnStandardPages('tx_sjroffers_domain_model_organization');
$TCA['tx_sjroffers_domain_model_organization'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_organization',
		'label' 			=> 'name',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_sjroffers_domain_model_organization.gif'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_sjroffers_domain_model_offer');
$TCA['tx_sjroffers_domain_model_offer'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_offer',
		'label'				=> 'title',
		'tstamp'            => 'tstamp',
		'crdate'            => 'crdate',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'prependAtCopy' 	=> 'LLL:EXT:lang/locallang_general.xml:LGL.prependAtCopy',
		'copyAfterDuplFields' 		=> 'sys_language_uid',
		'useColumnsForDefaultValues' => 'sys_language_uid',
		'delete'            => 'deleted',
		'enablecolumns'     => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_sjroffers_domain_model_offer.gif'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_sjroffers_domain_model_person');
$TCA['tx_sjroffers_domain_model_person'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_person',
		'label'				=> 'name',
		'tstamp'            => 'tstamp',
		'crdate'            => 'crdate',
		'delete'            => 'deleted',
		'enablecolumns'     => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_sjroffers_domain_model_person.gif'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_sjroffers_domain_model_agerange');
$TCA['tx_sjroffers_domain_model_agerange'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_agerange',
		'label'				=> 'minimum_value',
		'label_alt'			=> 'maximum_value',
		'label_alt_force'	=> TRUE,
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_sjroffers_domain_model_rangeconstraint.gif'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_sjroffers_domain_model_daterange');
$TCA['tx_sjroffers_domain_model_daterange'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_daterange',
		'label'				=> 'minimum_value',
		'label_alt'			=> 'maximum_value',
		'label_alt_force'	=> TRUE,
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_sjroffers_domain_model_rangeconstraint.gif'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_sjroffers_domain_model_attendancerange');
$TCA['tx_sjroffers_domain_model_attendancerange'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_attendancerange',
		'label'				=> 'minimum_value',
		'label_alt'			=> 'maximum_value',
		'label_alt_force'	=> TRUE,
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_sjroffers_domain_model_rangeconstraint.gif'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_sjroffers_domain_model_attendancefee');
$TCA['tx_sjroffers_domain_model_attendancefee'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_attendancefee',
		'label'				=> 'amount',
		'label_alt'			=> 'comment',
		'label_alt_force'	=> TRUE,
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_sjroffers_domain_model_attendancefee.gif'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_sjroffers_domain_model_category');
$TCA['tx_sjroffers_domain_model_category'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_category',
		'label'				=> 'title',
		'tstamp'            => 'tstamp',
		'crdate'            => 'crdate',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'prependAtCopy' 	=> 'LLL:EXT:lang/locallang_general.xml:LGL.prependAtCopy',
		'copyAfterDuplFields' 		=> 'sys_language_uid',
		'useColumnsForDefaultValues' => 'sys_language_uid',
		'delete'            => 'deleted',
		'enablecolumns'     => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_sjroffers_domain_model_category.gif'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_sjroffers_domain_model_status');
$TCA['tx_sjroffers_domain_model_status'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_status',
		'label'				=> 'title',
		'tstamp'            => 'tstamp',
		'crdate'            => 'crdate',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'prependAtCopy' 	=> 'LLL:EXT:lang/locallang_general.xml:LGL.prependAtCopy',
		'copyAfterDuplFields' 		=> 'sys_language_uid',
		'useColumnsForDefaultValues' => 'sys_language_uid',
		'delete'            => 'deleted',
		'enablecolumns'     => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_sjroffers_domain_model_status.gif'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_sjroffers_domain_model_region');
$TCA['tx_sjroffers_domain_model_region'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_region',
		'label'				=> 'name',
		'tstamp'            => 'tstamp',
		'crdate'            => 'crdate',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'prependAtCopy' 	=> 'LLL:EXT:lang/locallang_general.xml:LGL.prependAtCopy',
		'copyAfterDuplFields' 		=> 'sys_language_uid',
		'useColumnsForDefaultValues' => 'sys_language_uid',
		'delete'            => 'deleted',
		'enablecolumns'     => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_sjroffers_domain_model_region.gif'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_sjroffers_organization_person_mm');
$TCA['tx_sjroffers_organization_person_mm'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_organization_person_mm',
		'label'				=> 'uid_local',
		'label_alt'			=> 'uid_foreign',
		'label_alt_force'	=> TRUE,
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_relation.gif'
	)
);

?>
