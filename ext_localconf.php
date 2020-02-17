<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ast.' . $_EXTKEY,
	'Businesses',
	array(
		'Business' => 'list, listFiles, deleteFile, newFolder, deleteFolder, newFile, new, edit, show, create, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Business' => 'list, listFiles, deleteFile, newFolder, deleteFolder, newFile, new, edit, show, create, update, delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ast.' . $_EXTKEY,
	'Projects',
	array(
		'Project' => 'list, listFiles, deleteFile, newFolder, deleteFolder, newFile, new, edit, show, create, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Project' => 'list, listFiles, deleteFile, newFolder, deleteFolder, newFile, new, edit, show, create, update, delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ast.' . $_EXTKEY,
	'Tasks',
	array(
		'Task' => 'list, listFiles, deleteFile, newFolder, deleteFolder, newFile, new, edit, show, create, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Task' => 'list, listFiles, deleteFile, newFolder, deleteFolder, newFile, new, edit, show, create, update, delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ast.' . $_EXTKEY,
	'Mytasks',
	array(
		'Task' => 'myList, list, listFiles, deleteFile, newFolder, deleteFolder, newFile, new, edit, show, create, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Task' => 'myList, list, listFiles, deleteFile, newFolder, deleteFolder, newFile, new, edit, show, create, update, delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ast.' . $_EXTKEY,
	'Users',
	array(
		'User' => 'list, new, edit, show, create, update, delete',
		
	),
	// non-cacheable actions
	array(
		'User' => 'list, new, edit, show, create, update, delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ast.' . $_EXTKEY,
	'Times',
	array(
		'Times' => 'list, new, edit, show, create, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Times' => 'list, new, edit, show, create, update, delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ast.' . $_EXTKEY,
	'Bugs',
	array(
		'Bug' => 'list, new, edit, show, create, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Bug' => 'list, new, edit, show, create, update, delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(
        'Ast\\Projectmanager\\Property\\TypeConverter\\UploadedFileReferenceConverter'
);
