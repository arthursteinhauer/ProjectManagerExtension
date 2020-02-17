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
 * UserController
 */
class UserController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * userRepository
     * 
     * @var \Ast\Projectmanager\Domain\Repository\UserRepository
     * @inject
     */
    protected $userRepository = NULL;
    
    /**
     * frontendUserGroupRepository
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserGroupRepository
     * @inject
     */
    protected $frontendUserGroupRepository = NULL;
    
    /**
     * businessRepository
     * 
     * @var \Ast\Projectmanager\Domain\Repository\BusinessRepository
     * @inject
     */
    protected $businessRepository = NULL;
    
    /**
     * action list
     * 
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\Business $business
     * @return void
     */
    public function listAction($search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\Business $business = null)
    {
        // get uid of projects plugin
        $projectsUid = $this->settings['projectsPluginUid'];
        $this->view->assign('projectsUid', $projectsUid);		
        // get uid of tasks plugin
        $tasksUid = $this->settings['tasksPluginUid'];
        $this->view->assign('tasksUid', $tasksUid);
        // get uid of times plugin
        $timesUid = $this->settings['timesPluginUid'];
        $this->view->assign('timesUid', $timesUid);
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
        $users = $this->userRepository->findSearchForm($search, $offset, $limit, $orderProperty, $orderStr, $business);
        $this->view->assign('users', $users);
        $this->view->assign('search', $search);
        $this->view->assign('business', $business);
        // get pagination
        $countResults = $this->userRepository->countSearchForm($search, $business);
        if ($countResults > $itemsPerPage) {
            $totalPages = ceil($countResults / $itemsPerPage);
            $pagination = $this->buildPagination($page, $totalPages);
        }
        $this->view->assign('pagination', $pagination);
        $this->view->assign('paginationswitch', $paginationSwitch);
		
		$this->view->assign('orderStr', $orderStr);
		$this->view->assign('orderProperty', $orderProperty);		
    }
    
    /**
     * action show
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\User $user
	 * @ignorevalidation
     * @return void
     */
    public function showAction($search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\User $user)
    {
        $this->view->assign('user', $user);
		$this->view->assign('search', $search);
		$this->view->assign('orderStr', $orderStr);
		$this->view->assign('orderProperty', $orderProperty);		
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
        $usergroups = $this->frontendUserGroupRepository->findAll();
        $this->view->assign('usergroups', $usergroups);
        $businesses = $this->businessRepository->findAll();
        $this->view->assign('businesses', $businesses);
		
		$this->view->assign('search', $search);
		$this->view->assign('orderStr', $orderStr);
		$this->view->assign('orderProperty', $orderProperty);		
    }
    
    /**
     * action create
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\User $newUser
     * @return void
     */
    public function createAction($search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\User $newUser)
    {
//        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_user_flashmessage.createdSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->userRepository->add($newUser);
        $this->redirect('list', null, null, array('search' => $search, 'orderStr' => $orderStr, 'orderProperty' => $orderProperty));
    }
    
    /**
     * action edit
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\User $user
     * @return void
     */
    public function editAction($search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\User $user)
    {
        $this->view->assign('user', $user);
        $usergroups = $this->frontendUserGroupRepository->findAll();
        $this->view->assign('usergroups', $usergroups);
        $businesses = $this->businessRepository->findAll();
        $this->view->assign('businesses', $businesses);
		
		$this->view->assign('search', $search);
		$this->view->assign('orderStr', $orderStr);
		$this->view->assign('orderProperty', $orderProperty);		
    }
    
    /**
     * action update
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\User $user
     * @return void
     */
    public function updateAction($search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\User $user)
    {
 //       $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_user_flashmessage.updatedSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->userRepository->update($user);
        $this->redirect('list', null, null, array('search' => $search, 'orderStr' => $orderStr, 'orderProperty' => $orderProperty));
    }
    
    /**
     * action delete
     * @param string $search
	 * @param string $orderStr
	 * @param string $orderProperty
     * @param \Ast\Projectmanager\Domain\Model\User $user
     * @return void
     */
    public function deleteAction($search = '', $orderStr = 'asc', $orderProperty = 'name', \Ast\Projectmanager\Domain\Model\User $user)
    {
     //   $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_projectmanager_domain_model_user_flashmessage.deletedSuccessful', 'projectmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);   
		$this->userRepository->remove($user);
        $this->redirect('list', null, null, array('search' => $search, 'orderStr' => $orderStr, 'orderProperty' => $orderProperty));
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
	 * Deactivate Error FlashMessages
	 *
	 * @see Tx_Extbase_MVC_Controller_ActionController::getErrorFlashMessage()
	 * @return boolean
	 */
	/*
	protected function getErrorFlashMessage()
	{
		return FALSE;
	}	
	*/
}