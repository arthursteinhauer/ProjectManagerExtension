<?php

if (!isset($GLOBALS['TCA']['fe_groups']['ctrl']['type'])) {
	if (file_exists($GLOBALS['TCA']['fe_groups']['ctrl']['dynamicConfigFile'])) {
		require_once($GLOBALS['TCA']['fe_groups']['ctrl']['dynamicConfigFile']);
	}
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['fe_groups']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumnstx_projectmanager_fe_groups = array();
	$tempColumnstx_projectmanager_fe_groups[$GLOBALS['TCA']['fe_groups']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => array(
				array('UserGroup','Tx_Projectmanager_UserGroup')
			),
			'default' => 'Tx_Projectmanager_UserGroup',
			'size' => 1,
			'maxitems' => 1,
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_groups', $tempColumnstx_projectmanager_fe_groups, 1);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'fe_groups',
	$GLOBALS['TCA']['fe_groups']['ctrl']['type'],
	'',
	'after:' . $GLOBALS['TCA']['fe_groups']['ctrl']['label']
);

$tmp_projectmanager_columns = array(

	'business_read' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.business_read',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),		
	'business_edit' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.business_edit',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'business_delete' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.business_delete',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),	
	'business_new' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.business_new',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),		
	'business_files' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.business_files',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),	
	'business_files_upload' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.business_files_upload',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'business_files_delete' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.business_files_delete',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'business_files_folder_new' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.business_files_folder_new',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'business_files_folder_delete' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.business_files_folder_delete',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),	
	'business_users' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.business_users',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'business_projects' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.business_projects',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),

	'user_read' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.user_read',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),		
	'user_edit' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.user_edit',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'user_delete' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.user_delete',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),	
	'user_new' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.user_new',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'user_tasks' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.user_tasks',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'user_projects' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.user_projects',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),

	'project_read' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.project_read',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),		
	'project_edit' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.project_edit',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'project_delete' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.project_delete',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),	
	'project_new' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.project_new',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),		
	'project_files' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.project_files',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),	
	'project_files_upload' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.project_files_upload',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'project_files_delete' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.project_files_delete',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'project_files_folder_new' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.project_files_folder_new',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'project_files_folder_delete' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.project_files_folder_delete',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),	
	'project_tasks' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.project_tasks',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),

	'task_read' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.task_read',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),		
	'task_edit' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.task_edit',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'task_delete' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.task_delete',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),	
	'task_new' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.task_new',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),		
	'task_files' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.task_files',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),	
	'task_files_upload' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.task_files_upload',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'task_files_delete' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.task_files_delete',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'task_files_folder_new' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.task_files_folder_new',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'task_files_folder_delete' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.task_files_folder_delete',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),	
	'task_times' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.task_times',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'task_times_new' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.task_times_new',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),

	'time_read' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.time_read',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),		
	'time_edit' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.time_edit',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'time_delete' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.time_delete',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),	
	'time_new' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.time_new',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),		
	
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_groups',$tmp_projectmanager_columns);

/* inherit and extend the show items from the parent class */

if(isset($GLOBALS['TCA']['fe_groups']['types']['0']['showitem'])) {
	$GLOBALS['TCA']['fe_groups']['types']['Tx_Projectmanager_UserGroup']['showitem'] = $GLOBALS['TCA']['fe_groups']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['fe_groups']['types'])) {
	// use first entry in types array
	$fe_groups_type_definition = reset($GLOBALS['TCA']['fe_groups']['types']);
	$GLOBALS['TCA']['fe_groups']['types']['Tx_Projectmanager_UserGroup']['showitem'] = $fe_groups_type_definition['showitem'];
} else {
	$GLOBALS['TCA']['fe_groups']['types']['Tx_Projectmanager_UserGroup']['showitem'] = '';
}
$GLOBALS['TCA']['fe_groups']['types']['Tx_Projectmanager_UserGroup']['showitem'] .= ',--div--;LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup,';
$GLOBALS['TCA']['fe_groups']['types']['Tx_Projectmanager_UserGroup']['showitem'] .= ',--div--;LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.businesses, business_read, business_edit, business_delete, business_new, business_files, business_files_upload, business_files_delete, business_files_folder_new, business_files_folder_delete, business_users, business_projects';
$GLOBALS['TCA']['fe_groups']['types']['Tx_Projectmanager_UserGroup']['showitem'] .= ',--div--;LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.users, user_read, user_edit, user_delete, user_new, user_files, user_files_upload, user_files_delete, user_files_folder_new, user_files_folder_delete, user_tasks, user_projects';
$GLOBALS['TCA']['fe_groups']['types']['Tx_Projectmanager_UserGroup']['showitem'] .= ',--div--;LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.projects, project_read, project_edit, project_delete, project_new, project_files, project_files_upload, project_files_delete, project_files_folder_new, project_files_folder_delete, project_tasks';
$GLOBALS['TCA']['fe_groups']['types']['Tx_Projectmanager_UserGroup']['showitem'] .= ',--div--;LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.tasks, task_read, task_edit, task_delete, task_new, task_files, task_files_upload, task_files_delete, task_files_folder_new, task_files_folder_delete, task_times, task_times_new';
$GLOBALS['TCA']['fe_groups']['types']['Tx_Projectmanager_UserGroup']['showitem'] .= ',--div--;LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_usergroup.times, time_read, time_edit, time_delete, time_new';

$GLOBALS['TCA']['fe_groups']['columns'][$GLOBALS['TCA']['fe_groups']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:fe_groups.tx_extbase_type.Tx_Projectmanager_UserGroup','Tx_Projectmanager_UserGroup');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'',
	'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);