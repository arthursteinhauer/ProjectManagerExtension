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
 * FilesController
 */
class FilesController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * filesRepository
     * 
     * @var \Ast\Projectmanager\Domain\Repository\FilesRepository
     * @inject
     */
    protected $filesRepository = NULL;
    
    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $files = $this->filesRepository->findAll();
        $this->view->assign('files', $files);
    }
    
    /**
     * action show
     * 
     * @param \Ast\Projectmanager\Domain\Model\Files $files
     * @return void
     */
    public function showAction(\Ast\Projectmanager\Domain\Model\Files $files)
    {
        $this->view->assign('files', $files);
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
     * @param \Ast\Projectmanager\Domain\Model\Files $newFiles
     * @return void
     */
    public function createAction(\Ast\Projectmanager\Domain\Model\Files $newFiles)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->filesRepository->add($newFiles);
        $this->redirect('list');
    }
    
    /**
     * action edit
     * 
     * @param \Ast\Projectmanager\Domain\Model\Files $files
     * @ignorevalidation $files
     * @return void
     */
    public function editAction(\Ast\Projectmanager\Domain\Model\Files $files)
    {
        $this->view->assign('files', $files);
    }
    
    /**
     * action update
     * 
     * @param \Ast\Projectmanager\Domain\Model\Files $files
     * @return void
     */
    public function updateAction(\Ast\Projectmanager\Domain\Model\Files $files)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->filesRepository->update($files);
        $this->redirect('list');
    }
    
    /**
     * action delete
     * 
     * @param \Ast\Projectmanager\Domain\Model\Files $files
     * @return void
     */
    public function deleteAction(\Ast\Projectmanager\Domain\Model\Files $files)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->filesRepository->remove($files);
        $this->redirect('list');
    }

}