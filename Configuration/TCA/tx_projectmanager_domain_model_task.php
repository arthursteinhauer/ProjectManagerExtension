<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,description,estimated_time_in_hours,estimated_costs,required_time_in_hours,required_costs,approach_description,task_start_date,estimated_task_finish_date,task_finish_date,status,comment,folder,project,task_master,bugs,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('projectmanager') . 'Resources/Public/Icons/tx_projectmanager_domain_model_task.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, description, estimated_time_in_hours, estimated_costs, required_time_in_hours, required_costs, approach_description, task_start_date, estimated_task_finish_date, task_finish_date, status, comment, folder, project, task_master, bugs',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, description;;;richtext:rte_transform[mode=ts_links], project, estimated_time_in_hours, estimated_costs, required_time_in_hours, required_costs, approach_description;;;richtext:rte_transform[mode=ts_links], task_start_date, estimated_task_finish_date, task_finish_date, status, comment;;;richtext:rte_transform[mode=ts_links], folder, task_master, bugs, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_projectmanager_domain_model_task',
				'foreign_table_where' => 'AND tx_projectmanager_domain_model_task.pid=###CURRENT_PID### AND tx_projectmanager_domain_model_task.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'module' => array(
							'name' => 'wizard_rich_text_editor',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'wizard_rte.php'
							)
						),
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'estimated_time_in_hours' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.estimated_time_in_hours',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2'
			)
		),
		'estimated_costs' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.estimated_costs',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2'
			)
		),
		'required_time_in_hours' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.required_time_in_hours',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2'
			)
		),
		'required_costs' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.required_costs',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2'
			)
		),
		'approach_description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.approach_description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'module' => array(
							'name' => 'wizard_rich_text_editor',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'wizard_rte.php'
							)
						),
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'task_start_date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.task_start_date',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),	
		'estimated_task_finish_date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.estimated_task_finish_date',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),		
		'task_finish_date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.task_finish_date',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'status' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.status',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.status.open', 0),
					array('LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.status.ready-for-check', 1),
					array('LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.status.bug-was-found', 2),
					array('LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.status.finished', 3)
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => 'required'
			),
		),
		'comment' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.comment',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'module' => array(
							'name' => 'wizard_rich_text_editor',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'wizard_rte.php'
							)
						),
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'folder' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_project.folder',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_projectmanager_domain_model_folder',
				'foreign_field' => 'task',
				'maxitems' => 9999,
				'appearance' => array(
					'collapseAll' => 1,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),  
		'project' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.project',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_projectmanager_domain_model_project',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'task_master' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.task_master',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'fe_users',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),

		'bugs' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:projectmanager/Resources/Private/Language/locallang_db.xlf:tx_projectmanager_domain_model_task.bugs',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_projectmanager_domain_model_bug',
				'foreign_field' => 'task',
				'maxitems' => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		
	),
);