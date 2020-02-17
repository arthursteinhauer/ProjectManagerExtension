<?php
namespace Ast\Projectmanager\Controller;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * ************************************************************* */

/**
 * ProjectController
 */
class ProjectController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * projectRepository
     * 
     * @var \Ast\Projectmanager\Domain\Repository\ProjectRepository
     * @inject
     */
    protected $projectRepository = NULL;
    
    /**
     * businessRepository
     * 
     * @var \Ast\Projectmanager\Domain\Repository\BusinessRepository
     * @inject
     */
    protected $businessRepository = NULL;
    
    /**
     * categoryRepository
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $categoryRepository = null;
    
    /**
     * folderRepository
     * 
     * @var \Ast\Projectmanager\Domain\Repository\FolderRepository
     * @inject
     */
    protected $folderRepository = null;
    
    /**
     * filesRepository
     * 
     * @var \Ast\Projectmanager\Domain\Repository\FilesRepository
     * @inject
     */
    protected $filesRepository = NULL;
    
    /**
     * userRepository
     * 
     * @var \Ast\Projectmanager\Domain\Repository\UserRepository
     * @inject
     */
    protected $userRepository = NULL;
    
    /*
     * configuration of DateTimeConverter for german format 'd.m.Y H:i'
	 * for property 'projectStartDate'
     * for property 'projectFinishDate'
     */
    
    public function initializeAction()
    {
        if (isset($this->arguments['newProject'])) {
            $this->arguments['newProject']
				->getPropertyMappingConfiguration()
				->forProperty('projectStartDate')
				->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', 
				\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y H:i');
            $this->arguments['newProject']
				->getPropertyMappingConfiguration()
				->forProperty('projectFinishDate')
				->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', 
				\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y H:i');
            $this->arguments['newProject']
				->getPropertyMappingConfiguration()
				->forProperty('estimatedProjectFinishDate')
				->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', 
				\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y H:i');						
        }
        if (isset($this->arguments['project'])) {
            $this->arguments['project']
				->getPropertyMappingConfiguration()
				->forProperty('projectStartDate')
				->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', 
				\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y H:i');
            $this->arguments['project']
				->getPropertyMappingConfiguration()
				->forProperty('projectFinishDate')
				->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', 
				\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y H:i');
            $this->arguments['project']
				->getPropertyMappingConfiguration()
				->forProperty('estimatedProjectFinishDate')
				->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', 
				\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y H:i');			
        }
    }
    
    /**
     * action list
     * 
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
	 * @param \Ast\Projectmanager\Domain\Model\User $user
     * @return void
     */
    public function listAction($search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business = null, \Ast\Projectmanager\Domain\Model\User $user = null)
    {
		if($this->request->hasArgument("category")){
			$categoryUid = $this->request->getArgument("category");
			$category = $this->categoryRepository->findByUid($categoryUid);
		}
		
        $this->view->assign('category', $category);
		
        // get uid of tasks plugin
        $tasksUid = $this->settings['tasksPluginUid'];
        $this->view->assign('tasksUid', $tasksUid);
        // get pagination settings
        $paginationSwitch = $this->settings['pagination'];
        if ($paginationSwitch == 1) {
            $itemsPerPage = 10;
            if ($this->settings['paginationItems']) {
                $itemsPerPage = intval($this->settings['paginationItems']);
            }
        } else {
            $itemsPerPage = 10000;
        }
        // get page index
        $page = 1;
        if ($this->request->hasArgument('page')) {
            $page = intval($this->request->getArgument('page'));
        }
        // get resultset
        $offset = ($page - 1) * $itemsPerPage;
        $limit = $itemsPerPage;

        $projects = $this->projectRepository->findSearchForm($category, $search, $offset, $limit, $orderProperty, $orderStr, $business, $user);
        $this->view->assign('projects', $projects);
        $this->view->assign('search', $search);
        $this->view->assign('business', $business);
		$this->view->assign('user', $user);
        // get pagination
        $countResults = $this->projectRepository->countSearchForm($category, $search, $business, $user);
        if ($countResults > $itemsPerPage) {
            $totalPages = ceil($countResults / $itemsPerPage);
            $pagination = $this->buildPagination($page, $totalPages);
        }
        $this->view->assign('pagination', $pagination);
        $this->view->assign('paginationswitch', $paginationSwitch);
		
		//get the status entries
		$statusEntries = $this->getStatusEntries();
        $this->view->assign('statusEntries', $statusEntries);	
		
		$this->view->assign('orderStr', $orderStr);
		$this->view->assign('orderProperty', $orderProperty);	
		
		// get all categories for search category selector
		$categoryParent = $this->settings['categoryParent'];
        $allCategories = $this->categoryRepository->findByParent($categoryParent);
		$this->view->assign('allCategories', $allCategories);		
    }
    
    /**
     * action show
     * 
     * @param \Ast\Projectmanager\Domain\Model\Project $project
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
	 * @param \Ast\Projectmanager\Domain\Model\User $user
     * @return void
     */
    public function showAction(\Ast\Projectmanager\Domain\Model\Project $project, $search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business = null,	\Ast\Projectmanager\Domain\Model\User $user = null)
    {
        $this->view->assign('project', $project);
        $statusEntries = $this->getStatusEntries();
        $selectedStatusEntry = $statusEntries[$project->getStatus()];
        $this->view->assign('selectedStatusEntry', $selectedStatusEntry->value);
        $this->view->assign('search', $search);
        $this->view->assign('business', $business);
		$this->view->assign('user', $user);	
		$this->view->assign('orderStr', $orderStr);
		$this->view->assign('orderProperty', $orderProperty);		
    }
    
    /**
     * action new
     * 
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
	 * @param \Ast\Projectmanager\Domain\Model\User $user
     * @return void
     */
    public function newAction($search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business = null, \Ast\Projectmanager\Domain\Model\User $user = null)
    {
        $categoryParent = $this->settings['categoryParent'];
        $categories = $this->categoryRepository->findByParent($categoryParent);
        $this->view->assign('categories', $categories);
        // get the businesses
        $businesses = $this->businessRepository->findAll();
        $this->view->assign('businesses', $businesses);
        // get the users
        $users = $this->userRepository->findAll();
        $this->view->assign('users', $users);
        // get all projects status entries
        $statusEntries = $this->getStatusEntries();
        $this->view->assign('statusEntries', $statusEntries);
        $this->view->assign('business', $business);
		$this->view->assign('user', $user);	
        $this->view->assign('search', $search);
		$this->view->assign('orderStr', $orderStr);
		$this->view->assign('orderProperty', $orderProperty);		
    }
    
    /**
     * action create
     * 
     * @param \Ast\Projectmanager\Domain\Model\Project $newProject
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
	 * @param \Ast\Projectmanager\Domain\Model\User $user
     * @return void
     */
    public function createAction(\Ast\Projectmanager\Domain\Model\Project $newProject, $search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business = null, \Ast\Projectmanager\Domain\Model\User $user = null)
    {
        // $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_project_flashmessage.createdSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        // $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        $rootFolder = $this->objectManager->get('Ast\\Projectmanager\\Domain\\Model\\Folder');
        $rootFolder->setName(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_project_rootfolder.name', 'projectmanager')." ".$newProject->getName());
        $newProject->addFolder($rootFolder);
        $this->projectRepository->add($newProject);
        $this->redirect('list', Null, Null, array('search' => $search, 'orderStr' => $orderStr, 'orderProperty' => $orderProperty, 'business' => $business, 'user' => $user));
    }
    
    /**
     * action edit
     * 
     * @param \Ast\Projectmanager\Domain\Model\Project $project
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
	 * @param \Ast\Projectmanager\Domain\Model\User $user 
     * @ignorevalidation $project
     * @return void
     */
    public function editAction(\Ast\Projectmanager\Domain\Model\Project $project, $search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business = null, \Ast\Projectmanager\Domain\Model\User $user = null)
    {
        $this->view->assign('project', $project);
        $this->view->assign('search', $search);
		$this->view->assign('orderStr', $orderStr);
		$this->view->assign('orderProperty', $orderProperty);		
        $this->view->assign('business', $business);
		$this->view->assign('user', $user);	
        // get the categories
        $categoryParent = $this->settings['categoryParent'];
        $categories = $this->categoryRepository->findByParent($categoryParent);
        $this->view->assign('categories', $categories);
        // get the businesses
        $businesses = $this->businessRepository->findAll();
        $this->view->assign('businesses', $businesses);
        // get the users
        $users = $this->userRepository->findAll();
        $this->view->assign('users', $users);
        // get all projects status entries
        $statusEntries = $this->getStatusEntries();
        $this->view->assign('statusEntries', $statusEntries);
        // get the selected status entry
        $selectedStatusEntry = $statusEntries[$project->getStatus()];
        $this->view->assign('selectedStatusEntry', $selectedStatusEntry->value);
    }
    
    /**
     * action update
     * 
     * @param \Ast\Projectmanager\Domain\Model\Project $project
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
	 * @param \Ast\Projectmanager\Domain\Model\User $user
     * @return void
     */
    public function updateAction(\Ast\Projectmanager\Domain\Model\Project $project, $search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business = null, \Ast\Projectmanager\Domain\Model\User $user = null)
    {
        //    $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_project_flashmessage.updatedSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->projectRepository->update($project);
        $this->redirect('list', Null, Null, array('search' => $search, 'orderStr' => $orderStr, 'orderProperty' => $orderProperty, 'business' => $business, 'user' => $user));
    }
    
    /**
     * action delete
     * 
     * @param \Ast\Projectmanager\Domain\Model\Project $project
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
	 * @param \Ast\Projectmanager\Domain\Model\User $user	 
     * @return void
     */
    public function deleteAction(\Ast\Projectmanager\Domain\Model\Project $project, $search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business = null, \Ast\Projectmanager\Domain\Model\User $user = null)
    {
        //    $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_project_flashmessage.deletedSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->projectRepository->remove($project);
        $this->redirect('list', Null, Null, array('search' => $search, 'orderStr' => $orderStr, 'orderProperty' => $orderProperty, 'business' => $business, 'user' => $user));
    }
    
    /**
     * action listFiles
     * 
     * @param \Ast\Projectmanager\Domain\Model\Folder $currentFolder
     * @param \Ast\Projectmanager\Domain\Model\Project $project
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
	 * @param \Ast\Projectmanager\Domain\Model\User $user
     * @return void
     */
    public function listFilesAction(\Ast\Projectmanager\Domain\Model\Folder $currentFolder = null, \Ast\Projectmanager\Domain\Model\Project $project, $search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business = null, \Ast\Projectmanager\Domain\Model\User $user = null)
    {
        $this->view->assign('project', $project);
        $this->view->assign('search', $search);
		$this->view->assign('orderStr', $orderStr);
		$this->view->assign('orderProperty', $orderProperty);		
        $this->view->assign('business', $business);
		$this->view->assign('user', $user);	

        $rootFolder = null;
        $folders = $project->getFolder();
        foreach ($folders as $folder) {
            if ($folder->getParent() == 0) {
                $rootFolder = $folder;
            }
        }
        if (!$currentFolder) {
            $currentFolder = $rootFolder;
        }
        $childFolders = $this->folderRepository->findByParent($currentFolder);
        $this->view->assign('childFolders', $childFolders);
        $this->view->assign('currentFolder', $currentFolder);
        // make path of $currentFolder
        $path = array();
        //       $path[] = $currentFolder->getName();
        $indexFolder = $currentFolder;
        //        $parent = $indexFolder->getParent();
        while ($indexFolder) {
            if ($indexFolder->getParent()) {
                $path[] = $indexFolder->getName() . '/';
            } else {
                $path[] = '/';
            }
            $indexFolder = $indexFolder->getParent();
        }
        $path = array_reverse($path);
        $pathStr = implode('', $path);
        $this->view->assign('path', $pathStr);
    }
    
    /**
     * action deleteFile
     * 
     * @param \Ast\Projectmanager\Domain\Model\Project $project
     * @param \Ast\Projectmanager\Domain\Model\Folder $folder
     * @param \Ast\Projectmanager\Domain\Model\Files $files
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
	 * @param \Ast\Projectmanager\Domain\Model\User $user
     * @return void
     */
    public function deleteFileAction(\Ast\Projectmanager\Domain\Model\Project $project, \Ast\Projectmanager\Domain\Model\Folder $folder, \Ast\Projectmanager\Domain\Model\Files $files, $search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business = null, \Ast\Projectmanager\Domain\Model\User $user = null)
    {
        // $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_project_flashmessage.fileDeletedSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $folder->removeFiles($files);
        $this->projectRepository->update($project);
        $this->redirect('listFiles', null, null, array('project' => $project, 'currentFolder' => $folder, 'search' => $search, 'orderStr' => $orderStr, 'orderProperty' => $orderProperty, 'business' => $business, 'user' => $user));
    }
    
    /**
     * action deleteFolder
     * 
     * @param \Ast\Projectmanager\Domain\Model\Project $project
     * @param \Ast\Projectmanager\Domain\Model\Folder $folder
     * @param \Ast\Projectmanager\Domain\Model\Folder $currentFolder
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
	 * @param \Ast\Projectmanager\Domain\Model\User $user
     * @return void
     */
    public function deleteFolderAction(\Ast\Projectmanager\Domain\Model\Project $project, \Ast\Projectmanager\Domain\Model\Folder $folder, \Ast\Projectmanager\Domain\Model\Folder $currentFolder, $search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business = null, \Ast\Projectmanager\Domain\Model\User $user = null)
    {
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_project_flashmessage.folderDeletedSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $project->removeFolder($folder);
        $this->projectRepository->update($project);
        $this->redirect('listFiles', null, null, array('project' => $project, 'currentFolder' => $currentFolder, 'search' => $search, 'orderStr' => $orderStr, 'orderProperty' => $orderProperty, 'business' => $business, 'user' => $user));
    }
    
    public function initializeNewFileAction()
    {
        $this->setTypeConverterConfigurationForFileUpload('files');
		
		$propertyMappingConfiguration = $this->arguments['files']->getPropertyMappingConfiguration();
		$propertyMappingConfiguration->allowAllProperties();
		$propertyMappingConfiguration->setTypeConverterOption('TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter::CONFIGURATION_CREATION_ALLOWED, TRUE);			
    }
    
    /**
     * action newFile
     * 
     * @param \Ast\Projectmanager\Domain\Model\Project $project
     * @param \Ast\Projectmanager\Domain\Model\Folder $folder
     * @param \Ast\Projectmanager\Domain\Model\Files $files
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
	 * @param \Ast\Projectmanager\Domain\Model\User $user
     * @return void
     */
    public function newFileAction(\Ast\Projectmanager\Domain\Model\Project $project, \Ast\Projectmanager\Domain\Model\Folder $folder, \Ast\Projectmanager\Domain\Model\Files $files, $search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business = null, \Ast\Projectmanager\Domain\Model\User $user = null)
    {
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_project_flashmessage.fileUploadedSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$folder->addFiles($files);
        $this->projectRepository->update($project);
        $this->redirect('listFiles', null, null, array('project' => $project, 'currentFolder' => $folder, 'search' => $search, 'orderStr' => $orderStr, 'orderProperty' => $orderProperty, 'business' => $business, 'user' => $user));
    }
    
    /**
     * action newFolder
     * 
     * @param \Ast\Projectmanager\Domain\Model\Folder $newFolder
     * @param \Ast\Projectmanager\Domain\Model\Project $project
     * @param \Ast\Projectmanager\Domain\Model\Folder $folder
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
	 * @param \Ast\Projectmanager\Domain\Model\User $user
     * @return void
     */
    public function newFolderAction(\Ast\Projectmanager\Domain\Model\Folder $newFolder, \Ast\Projectmanager\Domain\Model\Project $project, \Ast\Projectmanager\Domain\Model\Folder $folder, $search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business = null, \Ast\Projectmanager\Domain\Model\User $user = null)
    {
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_project_flashmessage.folderCreatedSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $newFolder->setParent($folder);
        $project->addFolder($newFolder);
        $this->projectRepository->update($project);
        $this->redirect('listFiles', null, null, array('project' => $project, 'currentFolder' => $folder, 'search' => $search, 'orderStr' => $orderStr, 'orderProperty' => $orderProperty, 'business' => $business, 'user' => $user));
    }
    
    /**
     * prepare status for select box
     * 
     * @return array
     */
    public function getStatusEntries()
    {
        $statusEntries = array();
        $entries = array('open', 'work-in-progress', 'ready-for-check', 'ready-for-invoice', 'invoiced', 'paid');
        $index = 0;
        foreach ($entries as $entry) {
            $status = new \stdClass();
            $status->index = $index;
            $status->key = $entry;
            $status->value = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_project.status.' . $entry, 'projectmanager');
            $statusEntries[] = $status;
            $index++;
        }
        return $statusEntries;
    }
    
    /**
     * @param $page
     * @param $totalPages
     */
    private function buildPagination($page, $totalPages)
    {
        $pageLinks = 7;
        if ($this->settings['paginationLinks']) {
            $pageLinks = intval($this->settings['paginationLinks']);
        }
        $i = 1;
        $actualPage = $page;
        // case 1
        // Es können alle Seiten dierekt in der Paginierung angezeigt werden
        // Paginierung: 1 | 2 | 3 | 4 | 5 | 6 | 7
        if ($totalPages <= $pageLinks) {
            while ($i <= $totalPages) {
                $pagination[$i]['value'] = $i;
                if ($i == $actualPage) {
                    $pagination[$i]['class'] = 'active';
                }
                $i++;
            }
            return $pagination;
        }
        // case 2
        // Die aktuelle Seite ist kleiner 4, die Paginierung beginnt mit 1
        // Paginierung: 1 | 2 | 3 | 4 | 5 | 6 | 7 | >>
        //        if($actualPage < 4) {
        if ($actualPage < ceil($pageLinks / 2)) {
            //            while ($i <= 7) {
            while ($i <= $pageLinks) {
                $pagination[$i]['value'] = $i;
                if ($i == $actualPage) {
                    $pagination[$i]['class'] = 'active';
                }
                $i++;
            }
            // link to last page
            $pagination[$i]['value'] = $totalPages;
            $pagination[$i]['class'] = 'last';
            return $pagination;
        }
        // case 3
        // Die aktuelle Seite liegt irgendwo in der Mitte
        // Paginierung: << | 5 | 6 | 7 | 8 | 9 | 10 | 11 | >>
        //        if($actualPage >= 4 && $actualPage < $totalPages - 3) {
        if ($actualPage >= ceil($pageLinks / 2) && $actualPage < $totalPages - floor($pageLinks / 2)) {
            // link to first page
            $pagination[0]['value'] = 1;
            $pagination[0]['class'] = 'first';
            //beginn der Paginierung berechnen:
            //            $i = $actualPage - 3;
            $i = $actualPage - floor($pageLinks / 2);
            //            while ($i <= $actualPage + 4) {
            while ($i <= $actualPage + ceil($pageLinks / 2)) {
                $pagination[$i]['value'] = $i;
                if ($i == $actualPage) {
                    $pagination[$i]['class'] = 'active';
                }
                $i++;
            }
            // link to last page
            $pagination[$i]['value'] = $totalPages;
            $pagination[$i]['class'] = 'last';
            return $pagination;
        }
        // case 4
        // Die aktuelle Seite liegt unter den letzten 3
        // Paginierung: << | 15 | 16 | 17 | 18 | 19 | 20 | 21 |
        //        if($actualPage >= $totalPages - 3) {
        if ($actualPage >= $totalPages - floor($pageLinks / 2)) {
            // link to first page
            $pagination[0]['value'] = 1;
            $pagination[0]['class'] = 'first';
            //beginn der Paginierung berechnen:
            //            $i = $totalPages - 7;
            $i = $totalPages - $pageLinks;
            while ($i <= $totalPages) {
                $pagination[$i]['value'] = $i;
                if ($i == $actualPage) {
                    $pagination[$i]['class'] = 'active';
                }
                $i++;
            }
            return $pagination;
        }
    }
    
    /**
     * @param $argumentName
     */
    protected function setTypeConverterConfigurationForFileUpload($argumentName)
    {
        $uploadConfiguration = array(
            \Ast\Projectmanager\Property\TypeConverter\UploadedFileReferenceConverter::CONFIGURATION_ALLOWED_FILE_EXTENSIONS => 'txt,ts,typoscript,html,htm,css,tmpl,js,sql,xml,csv,xlf,gif,jpg,jpeg,bmp,png,pdf,svg,ai,mp3,wav,mp4,avi,webm,youtube,vimeo,gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,ico,pdf,ai,svg,doc,odt',
            \Ast\Projectmanager\Property\TypeConverter\UploadedFileReferenceConverter::CONFIGURATION_UPLOAD_FOLDER => '1:/project-manager-files/'
        );
        $newExampleConfiguration = $this->arguments[$argumentName]->getPropertyMappingConfiguration();
        $newExampleConfiguration->forProperty('file')->setTypeConverterOptions('Ast\\Projectmanager\\Property\\TypeConverter\\UploadedFileReferenceConverter', $uploadConfiguration);
    }

}