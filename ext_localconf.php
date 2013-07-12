<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Sjr.' . $_EXTKEY,
	'List',
	array(
		'Offer' => 'index, show, new, create, edit, update, delete, createContact, setContact, updateContact, removeContact',
		'Organization' => 'index, show, edit, update, removeOffer, createContact, updateContact, removeContact', 
		'Person' => 'new, create, edit, update, delete'
	),
	array(
		'Offer' => 'new, edit, createContact',
		'Organization' => 'edit, createContact', 
		'Person' => 'new, edit'
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Sjr.' . $_EXTKEY,
	'Organizations',
	array(	 
		'Offer' => 'index,show,new,create,edit,update,delete,createContact,setContact,updateContact,removeContact',
		'Organization' => 'index,show,edit,update,removeOffer,createContact,updateContact,removeContact', 
		'Person' => 'new,create,edit,update,delete',
		),
	array(
		'Organization' => 'edit,update,removeOffer,createContact,updateContact,removeContact', 
		'Offer' => 'index,new,create,edit,update,delete,createContact,setContact,updateContact,removeContact',
		'Person' => 'new,create,edit,update,delete',
		)
	);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Sjr.' . $_EXTKEY,
	'Admin',
	array(	 
		'Organization' => 'edit,update,populate,deleteAll', 
		'Offer' => 'index,show',
		)
	);

?>
