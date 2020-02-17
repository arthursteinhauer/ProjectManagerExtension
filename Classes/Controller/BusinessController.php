<?php
namespace Ast\Projectmanager\Controller;

/***************************************************************
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
 ***************************************************************/

/**
 * BusinessController
 */
class BusinessController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

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
     * action list
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @return void
     */
    public function listAction($search = '', $orderStr = 'asc', $orderProperty = 'name')
    { 
		$category = null;
		if($this->request->hasArgument("category")){
			$categoryUid = $this->request->getArgument("category");
			$category = $this->categoryRepository->findByUid($categoryUid);
		}
		
        $this->view->assign('category', $category);
	 
        // get uid of projects plugin
        $projectsUid = $this->settings['projectsPluginUid'];
        $this->view->assign('projectsUid', $projectsUid);
        // get uid of users plugin
        $usersUid = $this->settings['usersPluginUid'];
        $this->view->assign('usersUid', $usersUid);
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

		$businesses = $this->businessRepository->findSearchForm($category, $search, $offset, $limit, $orderProperty, $orderStr);

        $this->view->assign('businesses', $businesses);
        $this->view->assign('search', $search);
        // get pagination
        $countResults = $this->businessRepository->countSearchForm($category, $search);
        if ($countResults > $itemsPerPage) {
            $totalPages = ceil($countResults / $itemsPerPage);
            $pagination = $this->buildPagination($page, $totalPages);
        }
        $this->view->assign('pagination', $pagination);
        $this->view->assign('paginationswitch', $paginationSwitch);

		$this->view->assign('orderStr', $orderStr);
		$this->view->assign('orderProperty', $orderProperty);
		
		// get all categories for search category selector
		$categoryParent = $this->settings['categoryParent'];
        $allCategories = $this->categoryRepository->findByParent($categoryParent);
		$this->view->assign('allCategories', $allCategories);
    }
    
    /**
     * action new
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @return void
     */
    public function newAction($search = '', $orderStr = 'asc', $orderProperty = 'name')
    {
        $categoryParent = $this->settings['categoryParent'];
        $categories = $this->categoryRepository->findByParent($categoryParent);
        $this->view->assign('categories', $categories);
		$this->view->assign('search', $search);
		$this->view->assign('orderStr', $orderStr);
		$this->view->assign('orderProperty', $orderProperty);		
    }
    
    /**
     * action create
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $newBusiness
     * @return void
     */
    public function createAction($search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $newBusiness)
    {
        //        $this->addFlashMessage('The object was created.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_business_flashmessage.createdSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $rootFolder = $this->objectManager->get('Ast\\Projectmanager\\Domain\\Model\\Folder');
        $rootFolder->setName(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_business_rootfolder.name', 'projectmanager')." ".$newBusiness->getName());
        $newBusiness->addFolder($rootFolder);
        $this->businessRepository->add($newBusiness);
        $this->redirect('list', null, null, array('search' => $search, 'orderStr' => $orderStr, 'orderProperty' => $orderProperty));
    }
    
    /**
     * action edit
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
     * @ignorevalidation $business
     * @return void
     */
    public function editAction($search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business)
    {
        $categoryParent = $this->settings['categoryParent'];
        $categories = $this->categoryRepository->findByParent($categoryParent);
        $this->view->assign('categories', $categories);
        $this->view->assign('business', $business);
		$this->view->assign('search', $search);
		$this->view->assign('orderStr', $orderStr);
		$this->view->assign('orderProperty', $orderProperty);
    }    
    
    /**
     * action update
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
     * @return void
     */
    public function updateAction($search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business)
    {
        //        $this->addFlashMessage('The object was updated.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_business_flashmessage.updatedSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->businessRepository->update($business);
        $this->redirect('list', null, null, array('search' => $search, 'orderStr' => $orderStr, 'orderProperty' => $orderProperty));
    }
    
    /**
     * action delete
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
     * @return void
     */
    public function deleteAction($search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business)
    {
        //        $this->addFlashMessage('The object was deleted.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_business_flashmessage.deletedSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->businessRepository->remove($business);
        $this->redirect('list', null, null, array('search' => $search, 'orderStr' => $orderStr, 'orderProperty' => $orderProperty));
    }
    
    /**
     * action show
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
     * @return void
     */
    public function showAction($search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business)
    {
        $this->view->assign('business', $business);
		$this->view->assign('search', $search);
		$this->view->assign('orderStr', $orderStr);
		$this->view->assign('orderProperty', $orderProperty);			
    }
    
    /**
     * action listFiles
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Folder $currentFolder
     * @param \Ast\Projectmanager\Domain\Model\Business $business
     * @param string $search
     * @return void
     */
    public function listFilesAction($orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Folder $currentFolder = null, \Ast\Projectmanager\Domain\Model\Business $business, $search = '')
    {
        $this->view->assign('business', $business);
		$this->view->assign('search', $search);
		$this->view->assign('orderStr', $orderStr);
		$this->view->assign('orderProperty', $orderProperty);	
        $rootFolder = null;
        $folders = $business->getFolder();
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
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
     * @param \Ast\Projectmanager\Domain\Model\Folder $folder
     * @param \Ast\Projectmanager\Domain\Model\Files $files
     * @param string $search
     * @return void
     */
    public function deleteFileAction($orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business, \Ast\Projectmanager\Domain\Model\Folder $folder, \Ast\Projectmanager\Domain\Model\Files $files, $search = '')
    {
        // $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_project_flashmessage.fileDeletedSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $folder->removeFiles($files);
        $this->businessRepository->update($business);
        $this->redirect('listFiles', null, null, array('orderStr' => $orderStr, 'orderProperty' => $orderProperty, 'business' => $business, 'currentFolder' => $folder, 'search' => $search));
    }
    
    /**
     * action deleteFolder
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
     * @param \Ast\Projectmanager\Domain\Model\Folder $folder
     * @param \Ast\Projectmanager\Domain\Model\Folder $currentFolder
     * @param string $search
     * @return void
     */
    public function deleteFolderAction($orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business, \Ast\Projectmanager\Domain\Model\Folder $folder, \Ast\Projectmanager\Domain\Model\Folder $currentFolder, $search = '')
    {
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_project_flashmessage.folderDeletedSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $business->removeFolder($folder);
        $this->businessRepository->update($business);
        $this->redirect('listFiles', null, null, array('orderStr' => $orderStr, 'orderProperty' => $orderProperty, 'business' => $business, 'currentFolder' => $currentFolder, 'search' => $search));
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
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
     * @param \Ast\Projectmanager\Domain\Model\Folder $folder
     * @param \Ast\Projectmanager\Domain\Model\Files $files
     * @param string $search
     * @return void
     */
    public function newFileAction($orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business, \Ast\Projectmanager\Domain\Model\Folder $folder, \Ast\Projectmanager\Domain\Model\Files $files, $search = '')
    {
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_project_flashmessage.fileUploadedSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $folder->addFiles($files);
        $this->businessRepository->update($business);
        $this->redirect('listFiles', null, null, array('orderStr' => $orderStr, 'orderProperty' => $orderProperty, 'business' => $business, 'currentFolder' => $folder, 'search' => $search));
    }
    
    /**
     * action newFolder
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Folder $newFolder
     * @param \Ast\Projectmanager\Domain\Model\Business $business
     * @param \Ast\Projectmanager\Domain\Model\Folder $folder
     * @param string $search
     * @return void
     */
    public function newFolderAction($orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Folder $newFolder, \Ast\Projectmanager\Domain\Model\Business $business, \Ast\Projectmanager\Domain\Model\Folder $folder, $search = '')
    {
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_project_flashmessage.folderCreatedSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $newFolder->setParent($folder);
        $business->addFolder($newFolder);
        $this->businessRepository->update($business);
        $this->redirect('listFiles', null, null, array('orderStr' => $orderStr, 'orderProperty' => $orderProperty, 'business' => $business, 'currentFolder' => $folder, 'search' => $search));
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
    

	/**
	 * Fill objectStorage from QueryResult
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\QueryResultInterface $queryResult
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	protected function fillOjectStorageFromQueryResult(\TYPO3\CMS\Extbase\Persistence\QueryResultInterface $queryResult=NULL) {
		/* @var $objectStorage \TYPO3\CMS\Extbase\Persistence\ObjectStorage */
		$objectStorage = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage');

		if (NULL!==$queryResult) {
			foreach($queryResult AS $object) {
				$objectStorage->attach($object);
			}
		}

		return $objectStorage;
	}	
	
	
	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\Category $category
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function categoryToObjectStorage(\TYPO3\CMS\Extbase\Domain\Model\Category $category) {
		$objectStorage = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage');
		$objectStorage->attach($category);
		return $objectStorage;
	}	
	
}