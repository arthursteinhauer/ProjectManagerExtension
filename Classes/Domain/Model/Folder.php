<?php
namespace Ast\Projectmanager\Domain\Model;

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
 * Folder
 */
class Folder extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     * 
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';   
    
    /**
     * description
     * 
     * @var string
     */
    protected $description = '';
    
    
    /**
     * files
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\Files>
     * @cascade remove
     */
    protected $files = null;    
 
    /**
     * parent
     * @var \Ast\Projectmanager\Domain\Model\Folder
     * 
     */
    protected $parent = null;    
    
    /**
     * Returns the name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }          
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->files = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();        
    }
    
    /**
     * Returns the description
     * 
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     * 
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Adds a Files
     * 
     * @param \Ast\Projectmanager\Domain\Model\Files $files
     * @return void
     */
    public function addFiles(\Ast\Projectmanager\Domain\Model\Files $files)
    {
        $this->files->attach($files);
    }
    
    /**
     * Removes a Files
     * 
     * @param \Ast\Projectmanager\Domain\Model\Files $filesToRemove The Files to be removed
     * @return void
     */
    public function removeFiles(\Ast\Projectmanager\Domain\Model\Files $filesToRemove)
    {
        $this->files->detach($filesToRemove);
    }
    
    /**
     * Returns the files
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\Files> $files
     */
    public function getFiles()
    {
        return $this->files;
    }
    
    /**
     * Sets the files
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\Files> $files
     * @return void
     */
    public function setFiles(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $files)
    {
        $this->files = $files;
    }
    
    /**
     * Returns the parent
     * 
     * @return \Ast\Projectmanager\Domain\Model\Folder $folder
     */
    public function getParent()
    {
        return $this->parent;
    }
    
    /**
     * Sets the parent
     * 
     * @param \Ast\Projectmanager\Domain\Model\Folder $folder
     * @return void
     */
    public function setParent(\Ast\Projectmanager\Domain\Model\Folder $folder)
    {
        $this->parent = $folder;
    }    
}
