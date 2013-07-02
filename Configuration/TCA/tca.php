<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_sjroffers_domain_model_organization'] = array(
	'ctrl' => $TCA['tx_sjroffers_domain_model_organization']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,status,name,address,telephone_number,telefax_number,url,email_address,description,contacts,offers,administrator'
	),
	'types' => array(
		'1' => array('showitem' => 'hidden,status,name,description,offers,administrator')
	),
	'palettes' => array(
		'1' => array('showitem' => 'telephone_number,telefax_number,url,email_address')
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => Array(
					Array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					Array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					Array('', 0),
				),
				'foreign_table' => 'tt_news',
				'foreign_table_where' => 'AND tt_news.uid=###REC_FIELD_l18n_parent### AND tt_news.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => Array(
			'config'=>array(
				'type'=>'passthrough')
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'status' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_organization.status',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_sjroffers_domain_model_status',
				'foreign_table_where' => 'AND tx_sjroffers_domain_model_status.pid=###CURRENT_PID###',
				'maxitems' => 1,
			)
		),
		'name' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_organization.name',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max'  => 256
			)
		),
		'address' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.address',
			'config' => array(
				'type' => 'text',
				'cols' => '20',
				'rows' => '3'
			)
		),
		'telephone_number' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.phone',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim',
				'size' => '20',
				'max' => '80'
			)
		),
		'telefax_number' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.fax',
			'config' => array(
				'type' => 'input',
				'size' => '20',
				'eval' => 'trim',
				'max' => '80'
			)
		),
		'url' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.www',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim',
				'size' => '20',
				'max' => '80'
			)
		),
		'email_address' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.email',
			'config' => array(
				'type' => 'input',
				'size' => '20',
				'eval' => 'trim',
				'max' => '80'
			)
		),
		'description' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_organization.description',
			'config'  => array(
				'type' => 'text',
				'eval' => 'trim',
				'rows' => 5,
				'cols' => 40,
				'max' => '1000'
			)
		),
		'contacts' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_organization.contacts',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_sjroffers_domain_model_person',
				'MM' => 'tx_sjroffers_organization_person_mm',
				'wizards' => Array(
		             '_PADDING' => 1,
		             '_VERTICAL' => 1,
		             'edit' => Array(
		                 'type' => 'popup',
		                 'title' => 'Edit',
		                 'script' => 'wizard_edit.php',
		                 'icon' => 'edit2.gif',
		                 'popup_onlyOpenIfSelected' => 1,
		                 'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
		             ),
		             'add' => Array(
		                 'type' => 'script',
		                 'title' => 'Create new',
		                 'icon' => 'add.gif',
		                 'params' => Array(
		                     'table'=>'tx_sjroffers_domain_model_person',
		                     'pid' => '###CURRENT_PID###',
		                     'setValue' => 'prepend'
		                 ),
		                 'script' => 'wizard_add.php',
		             ),
		         )
			)
		),
		'offers' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_organization.offers',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_sjroffers_domain_model_offer',
				'foreign_field' => 'organization',
				'maxitems'      => 9999,
				'appearance' => array(
					'newRecordLinkPosition' => 'bottom',
					'collapseAll' => 0,
					'expandSingle' => 1,
				),
			)
		),
		'administrator' => array(		
			'exclude' => 1,		
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_organization.administrator',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'fe_users',
				'foreign_table_where' => 'AND fe_users.pid=###CURRENT_PID###',
				'items' => array(
						array('--none--', 0),
					),
				'wizards' => Array(
		             '_PADDING' => 1,
		             '_VERTICAL' => 0,
		             'edit' => Array(
		                 'type' => 'popup',
		                 'title' => 'Edit',
		                 'script' => 'wizard_edit.php',
		                 'icon' => 'edit2.gif',
		                 'popup_onlyOpenIfSelected' => 1,
		                 'JSopenParams' => 'height=650,width=650,status=0,menubar=0,scrollbars=1',
		             ),
		             'add' => Array(
		                 'type' => 'script',
		                 'title' => 'Create new',
		                 'icon' => 'add.gif',
		                 'params' => Array(
		                     'table'=>'fe_users',
		                     'pid' => '###CURRENT_PID###',
		                     'setValue' => 'prepend'
		                 ),
		                 'script' => 'wizard_add.php',
		             ),
		         ),
			),
		),
	)
);

$TCA['tx_sjroffers_domain_model_offer'] = array(
	'ctrl' => $TCA['tx_sjroffers_domain_model_offer']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, title, teaser, description, services, dates, venue, age_range, date_range, attendance_range, attendance_fees, contacts, categories, regions'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_offer.title',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim, required',
				'max'  => 256
			)
		),
		'teaser' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_offer.teaser',
			'config'  => array(
				'type' => 'text',
				'eval' => 'trim',
				'rows' => 2,
				'cols' => 60,
			)
		),
		'description' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_offer.description',
			'config'  => array(
				'type' => 'text',
				'eval' => 'trim',
				'rows' => 10,
				'cols' => 60,
			)
		),
		'services' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_offer.services',
			'config'  => array(
				'type' => 'text',
				'rows' => 10,
				'cols' => 60,
			)
		),
		'dates' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_offer.dates',
			'config'  => array(
				'type' => 'text',
				'rows' => 5,
				'cols' => 60,
			)
		),
		'venue' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_offer.venue',
			'config'  => array(
				'type' => 'text',
				'rows' => 5,
				'cols' => 60,
			)
		),
		'age_range' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_offer.age_range',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_sjroffers_domain_model_agerange',
				'eval' => 'required',
				'maxitems' => 1,
			)
		),
		'date_range' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_offer.date_range',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_sjroffers_domain_model_daterange',
				'eval' => 'required',
				'maxitems' => 1,
			)
		),
		'attendance_range' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_offer.attendance_range',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_sjroffers_domain_model_attendancerange',
				'eval' => 'required',
				'maxitems' => 1,
			)
		),
		'attendance_fees' => array(		
			'exclude' => 1,		
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_offer.attendance_fees',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_sjroffers_domain_model_attendancefee',
				'foreign_field' => 'offer',
				'minitems' => 0,
				'maxitems'      => 9999,
				'appearance' => array(
					'newRecordLinkPosition' => 'bottom',
					'collapseAll' => 0,
					'expandSingle' => 0,
				),
			)
		),
		'contact' => array(		
			'exclude' => 1,		
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_offer.contacts',
			'config' => array(
				'type' => 'select',
				'minitems' => 0,
				'maxitems' => 1,
				'foreign_table' => 'tx_sjroffers_domain_model_person',
				'items' => array(
						array('--none--', NULL),
					),
				'wizards' => Array(
		             '_PADDING' => 1,
		             '_VERTICAL' => 1,
		             'edit' => Array(
		                 'type' => 'popup',
		                 'title' => 'Edit',
		                 'script' => 'wizard_edit.php',
		                 'icon' => 'edit2.gif',
		                 'popup_onlyOpenIfSelected' => 1,
		                 'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
		             ),
		             'add' => Array(
		                 'type' => 'script',
		                 'title' => 'Create new',
		                 'icon' => 'add.gif',
		                 'params' => Array(
		                     'table'=>'tx_sjroffers_domain_model_person',
		                     'pid' => '###CURRENT_PID###',
		                     'setValue' => 'prepend'
		                 ),
		                 'script' => 'wizard_add.php',
		             ),
		         )
			)
		),
		'categories' => array(		
			'exclude' => 1,		
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_offer.categories',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 5,
				'multiple' => 0,
				'foreign_table' => 'tx_sjroffers_domain_model_category',
				'MM' => 'tx_sjroffers_offer_category_mm',
			)
		),
		'regions' => array(		
			'exclude' => 1,		
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_offer.regions',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 20,
				'multiple' => 0,
				'foreign_table' => 'tx_sjroffers_domain_model_region',
				'MM' => 'tx_sjroffers_offer_region_mm',
				'wizards' => Array(
		             '_PADDING' => 1,
		             '_VERTICAL' => 1,
		             'edit' => Array(
		                 'type' => 'popup',
		                 'title' => 'Edit',
		                 'script' => 'wizard_edit.php',
		                 'icon' => 'edit2.gif',
		                 'popup_onlyOpenIfSelected' => 1,
		                 'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
		             ),
		             'add' => Array(
		                 'type' => 'script',
		                 'title' => 'Create new',
		                 'icon' => 'add.gif',
		                 'params' => Array(
		                     'table'=>'tx_sjroffers_domain_model_region',
		                     'pid' => '###CURRENT_PID###',
		                     'setValue' => 'prepend'
		                 ),
		                 'script' => 'wizard_add.php',
		             ),
		         )
			)
		),
		'organization' => array(
			'exclude' => 1,		
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_offer.organization',
			'config' => array(
				'type' => 'select',
				'minitems' => 1,
				'maxitems' => 1,
				'foreign_table' => 'tx_sjroffers_domain_model_organization',
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, title, teaser, description, services, dates, venue, age_range, date_range, attendance_range, attendance_fees, contact, categories, regions')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

$TCA['tx_sjroffers_domain_model_person'] = array(
	'ctrl' => $TCA['tx_sjroffers_domain_model_person']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, name, address, telephone_number, telefax_number, url, email_address'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'name' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:lang/locallang_general.php:LGL.name',
			'config'  => array(
				'type' => 'input',
				'size' => '20',
				'eval' => 'trim,required',
				'max'  => '256'
			)
		),
		'role' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_person.role',
			'config'  => array(
				'type' => 'input',
				'size' => '20',
				'eval' => 'trim,required',
				'max'  => '256'
			)
		),
		'address' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.address',
			'config' => array(
				'type' => 'text',
				'cols' => '20',
				'rows' => '3'
			)
		),
		'telephone_number' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.phone',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim',
				'size' => '20',
				'max' => '80'
			)
		),
		'telefax_number' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.fax',
			'config' => array(
				'type' => 'input',
				'size' => '20',
				'eval' => 'trim',
				'max' => '80'
			)
		),
		'url' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.www',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim',
				'size' => '20',
				'max' => '80'
			)
		),
		'email_address' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.email',
			'config' => array(
				'type' => 'input',
				'size' => '20',
				'eval' => 'trim',
				'max' => '80'
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, name, address, telephone_number, telefax_number, url, email_address')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

$TCA['tx_sjroffers_domain_model_agerange'] = array(
	'ctrl' => $TCA['tx_sjroffers_domain_model_agerange']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'minimum_value, maximum_value'
	),
	'columns' => array(
		'minimum_value' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_agerange.minimum_value',
			'config'  => array(
				'type'    => 'input',
				'size' => 4,
			)
		),
		'maximum_value' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_agerange.maximum_value',
			'config'  => array(
				'type'    => 'input',
				'size' => 4,
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'minimum_value, maximum_value')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

$TCA['tx_sjroffers_domain_model_daterange'] = array(
	'ctrl' => $TCA['tx_sjroffers_domain_model_daterange']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'minimum_value, maximum_value'
	),
	'columns' => array(
		'minimum_value' => array(
			'exclude' => 1,
			'label'   => 'UNIX-Timestamp',
			'config'  => array(
				'type'    => 'none',
				'size' => 8,
				'checkbox' => '',
				'eval' => 'date',
			)
		),
		'maximum_value' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_daterange.maximum_value',
			'config'  => array(
				'type'    => 'input',
				'size' => 8,
				'checkbox' => '',
				'eval' => 'date',
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'minimum_value, maximum_value')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

$TCA['tx_sjroffers_domain_model_attendancerange'] = array(
	'ctrl' => $TCA['tx_sjroffers_domain_model_attendancerange']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'minimum_value, maximum_value'
	),
	'columns' => array(
		'minimum_value' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_attendancerange.minimum_value',
			'config'  => array(
				'type'    => 'input',
				'size' => 4,
			)
		),
		'maximum_value' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_attendancerange.maximum_value',
			'config'  => array(
				'type'    => 'input',
				'size' => 4,
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'minimum_value, maximum_value')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

$TCA['tx_sjroffers_domain_model_attendancefee'] = array(
	'ctrl' => $TCA['tx_sjroffers_domain_model_attendancefee']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'offer, amount, comment'
	),
	'columns' => array(
		'offer' => array(
			'exclude' => 1,		
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_attendancefee.offer',
			'config' => array(
				'type' => 'select',
				'minitems' => 1,
				'maxitems' => 1,
				'foreign_table' => 'tx_sjroffers_domain_model_offer',
			)
		),
		'amount' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_attendancefee.amount',
			'config'  => array(
				'type' => 'input',
				'eval' => 'trim,double2',
				'size' => 4,
			)
		),
		'comment' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_attendancefee.comment',
			'config'  => array(
				'type' => 'input',
				'size' => 16,
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'offer, amount, comment')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

$TCA['tx_sjroffers_domain_model_category'] = array(
	'ctrl' => $TCA['tx_sjroffers_domain_model_category']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, title, description, is_internal'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_category.title',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim, required',
				'max'  => 256
			)
		),
		'description' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_category.description',
			'config'  => array(
				'type' => 'text',
				'rows' => 10,
				'cols' => 60,
			)
		),
		'is_internal' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_category.is_internal',
			'config'  => array(
				'type' => 'check'
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, title, description, is_internal')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

$TCA['tx_sjroffers_domain_model_status'] = array(
	'ctrl' => $TCA['tx_sjroffers_domain_model_status']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, title, description, allowed_categories'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_status.title',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim, required',
				'max'  => 256
			)
		),
		'description' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_status.description',
			'config'  => array(
				'type' => 'text',
				'rows' => 10,
				'cols' => 60,
			)
		),
		'allowed_categories' => array(		
			'exclude' => 1,		
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_status.allowed_categories',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 5,
				'multiple' => 0,
				'foreign_table' => 'tx_sjroffers_domain_model_category',
				'MM' => 'tx_sjroffers_status_category_mm',
				'wizards' => Array(
		             '_PADDING' => 1,
		             '_VERTICAL' => 1,
		             'edit' => Array(
		                 'type' => 'popup',
		                 'title' => 'Edit',
		                 'script' => 'wizard_edit.php',
		                 'icon' => 'edit2.gif',
		                 'popup_onlyOpenIfSelected' => 1,
		                 'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
		             ),
		             'add' => Array(
		                 'type' => 'script',
		                 'title' => 'Create new',
		                 'icon' => 'add.gif',
		                 'params' => Array(
		                     'table'=>'tx_sjroffers_domain_model_category',
		                     'pid' => '###CURRENT_PID###',
		                     'setValue' => 'prepend'
		                 ),
		                 'script' => 'wizard_add.php',
		             ),
		         )
			)
		)
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, title, description, allowed_categories')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

$TCA['tx_sjroffers_domain_model_region'] = array(
	'ctrl' => $TCA['tx_sjroffers_domain_model_region']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, name'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'name' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_domain_model_region.name',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim, required',
				'max'  => 256
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, name')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

$TCA['tx_sjroffers_organization_person_mm'] = array(
	'ctrl' => $TCA['tx_sjroffers_organization_person_mm']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'uid_local, uid_foreign'
	),
	'columns' => array(
		'uid_local' => array(		
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_organization_person_mm.organization',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_sjroffers_domain_model_organization',
				// 'foreign_table_where' => 'AND tx_sjroffers_domain_model_organization.pid=###CURRENT_PID###',
				'maxitems' => 1,
			)
		),
		'uid_foreign' => array(		
			'label'   => 'LLL:EXT:sjr_offers/Resources/Private/Language/locallang_db.xml:tx_sjroffers_organization_person_mm.contact',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_sjroffers_domain_model_person',
				// 'foreign_table_where' => 'AND tx_sjroffers_domain_model_person.pid=###CURRENT_PID###',
				'maxitems' => 1,
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'uid_local, uid_foreign')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

?>