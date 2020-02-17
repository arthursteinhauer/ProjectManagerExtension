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
 * Bug
 */
class Bug extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * comment
     * 
     * @var string
     */
    protected $comment = '';
    
    /**
     * status
     * 
     * @var int
     * @validate NotEmpty
     */
    protected $status = false;
    
    /**
     * image
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\Images>
     * @cascade remove
     */
    protected $image = null;
    
    /**
     * dedectedByUser
     * 
     * @var \Ast\Projectmanager\Domain\Model\User
     */
    protected $dedectedByUser = null;
    
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
        $this->image = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
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
     * Returns the boolean state of solved
     * 
     * @return bool
     */
    public function isSolved()
    {
        return $this->solved;
    }
    
    /**
     * Adds a Images
     * 
     * @param \Ast\Projectmanager\Domain\Model\Images $image
     * @return void
     */
    public function addImage(\Ast\Projectmanager\Domain\Model\Images $image)
    {
        $this->image->attach($image);
    }
    
    /**
     * Removes a Images
     * 
     * @param \Ast\Projectmanager\Domain\Model\Images $imageToRemove The Images to be removed
     * @return void
     */
    public function removeImage(\Ast\Projectmanager\Domain\Model\Images $imageToRemove)
    {
        $this->image->detach($imageToRemove);
    }
    
    /**
     * Returns the image
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\Images> $image
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Sets the image
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\Images> $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $image)
    {
        $this->image = $image;
    }
    
    /**
     * Returns the dedectedByUser
     * 
     * @return \Ast\Projectmanager\Domain\Model\User $dedectedByUser
     */
    public function getDedectedByUser()
    {
        return $this->dedectedByUser;
    }
    
    /**
     * Sets the dedectedByUser
     * 
     * @param \Ast\Projectmanager\Domain\Model\User $dedectedByUser
     * @return void
     */
    public function setDedectedByUser(\Ast\Projectmanager\Domain\Model\User $dedectedByUser)
    {
        $this->dedectedByUser = $dedectedByUser;
    }
    
    /**
     * Returns the comment
     * 
     * @return string $comment
     */
    public function getComment()
    {
        return $this->comment;
    }
    
    /**
     * Sets the comment
     * 
     * @param string $comment
     * @return void
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
    
    /**
     * Returns the status
     * 
     * @return int status
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Sets the status
     * 
     * @param bool $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}