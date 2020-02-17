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
 * BugController
 */
class BugController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * bugRepository
     * 
     * @var \Ast\Projectmanager\Domain\Repository\BugRepository
     * @inject
     */
    protected $bugRepository = NULL;
    
    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $bugs = $this->bugRepository->findAll();
        $this->view->assign('bugs', $bugs);
    }
    
    /**
     * action show
     * 
     * @param \Ast\Projectmanager\Domain\Model\Bug $bug
     * @return void
     */
    public function showAction(\Ast\Projectmanager\Domain\Model\Bug $bug)
    {
        $this->view->assign('bug', $bug);
    }
    
    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     * 
     * @param \Ast\Projectmanager\Domain\Model\Bug $newBug
     * @return void
     */
    public function createAction(\Ast\Projectmanager\Domain\Model\Bug $newBug)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->bugRepository->add($newBug);
        $this->redirect('list');
    }
    
    /**
     * action edit
     * 
     * @param \Ast\Projectmanager\Domain\Model\Bug $bug
     * @ignorevalidation $bug
     * @return void
     */
    public function editAction(\Ast\Projectmanager\Domain\Model\Bug $bug)
    {
        $this->view->assign('bug', $bug);
    }
    
    /**
     * action update
     * 
     * @param \Ast\Projectmanager\Domain\Model\Bug $bug
     * @return void
     */
    public function updateAction(\Ast\Projectmanager\Domain\Model\Bug $bug)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->bugRepository->update($bug);
        $this->redirect('list');
    }
    
    /**
     * action delete
     * 
     * @param \Ast\Projectmanager\Domain\Model\Bug $bug
     * @return void
     */
    public function deleteAction(\Ast\Projectmanager\Domain\Model\Bug $bug)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->bugRepository->remove($bug);
        $this->redirect('list');
    }

}