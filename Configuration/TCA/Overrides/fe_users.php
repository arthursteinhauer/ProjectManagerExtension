<?php

if (!isset($GLOBALS['TCA']['fe_users']['ctrl']['type'])) {
	if (file_exists($GLOBALS['TCA']['fe_users']['ctrl']['dynamicConfigFile'])) {
		require_once($GLOBALS['TCA']['fe_users']['ctrl']['dynamicConfigFile']);
	}
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['fe_users']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumnstx_projectmanager_fe_users = array();
	$tempColumnstx_projectmanager_fe_users[$GLOBALS['TCA']['fe_users']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => array(
				array('User','Tx_Projectmanager_User')
			),
			'default' => 'Tx_Projectmanager_User',
			'size' => 1,
			'maxitems' => 1,
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users', $tempColumnstx_projectmanager_fe_users, 1);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'fe_users',
	$GLOBALS['TCA']['fe_users']['ctrl']['type'],
	'',
	'after:' . $GLOBALS['TCA']['fe_users']['ctrl']['label']
);

$tmp_projectmanager_columns = array(

	'hourly_rate' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_user.hourly_rate',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'business' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_user.business',
		'config' => array(
			'type' => 'select',
			'renderType' => 'selectSingle',
			'foreign_table' => 'tx_projectmanager_domain_model_business',
			'minitems' => 0,
			'maxitems' => 1,
		),
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users',$tmp_projectmanager_columns);

/* inherit and extend the show items from the parent class */

if(isset($GLOBALS['TCA']['fe_users']['types']['0']['showitem'])) {
	$GLOBALS['TCA']['fe_users']['types']['Tx_Projectmanager_User']['showitem'] = $GLOBALS['TCA']['fe_users']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['fe_users']['types'])) {
	// use first entry in types array
	$fe_users_type_definition = reset($GLOBALS['TCA']['fe_users']['types']);
	$GLOBALS['TCA']['fe_users']['types']['Tx_Projectmanager_User']['showitem'] = $fe_users_type_definition['showitem'];
} else {
	$GLOBALS['TCA']['fe_users']['types']['Tx_Projectmanager_User']['showitem'] = '';
}
$GLOBALS['TCA']['fe_users']['types']['Tx_Projectmanager_User']['showitem'] .= ',--div--;LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_user,';
$GLOBALS['TCA']['fe_users']['types']['Tx_Projectmanager_User']['showitem'] .= 'hourly_rate, business';

$GLOBALS['TCA']['fe_users']['columns'][$GLOBALS['TCA']['fe_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:fe_users.tx_extbase_type.Tx_Projectmanager_User','Tx_Projectmanager_User');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'',
	'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);