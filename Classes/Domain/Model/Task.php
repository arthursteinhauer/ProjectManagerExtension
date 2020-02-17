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
 * Task
 */
class Task extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * project
     * 
     * @var \Ast\Projectmanager\Domain\Model\Project
     * @validate NotEmpty
     */
    protected $project = null;
    
    /**
     * folder
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\Folder>
     * @cascade remove
     */
    protected $folder = null;
    
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
     * estimatedTimeInHours
     * 
     * @var float
     */
    protected $estimatedTimeInHours = 0.0;
    
    /**
     * estimatedCosts
     * 
     * @var float
     */
    protected $estimatedCosts = 0.0;
    
    /**
     * requiredTimeInHours
     * 
     * @var float
     */
    protected $requiredTimeInHours = 0.0;
    
    /**
     * requiredCosts
     * 
     * @var float
     */
    protected $requiredCosts = 0.0;
    
    /**
     * approachDescription
     * 
     * @var string
     */
    protected $approachDescription = '';
    
    /**
     * taskStartDate
     * 
     * @var \DateTime
     */
    protected $taskStartDate = null;	
    
    /**
     * estimatedTaskFinishDate
     * 
     * @var \DateTime
     */
    protected $estimatedTaskFinishDate = null;		
	
    /**
     * taskFinishDate
     * 
     * @var \DateTime
     */
    protected $taskFinishDate = null;
    
    /**
     * status
     * 
     * @var int
     * @validate NotEmpty
     */
    protected $status = false;
    
    /**
     * comment
     * 
     * @var string
     */
    protected $comment = '';
    
    /**
     * taskMaster
     * 
     * @var \Ast\Projectmanager\Domain\Model\User
     */
    protected $taskMaster = null;
    
    /**
     * bugs
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\Bug>
     * @cascade remove
     */
    protected $bugs = null;    
    
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
        $this->folder = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->bugs = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the project
     * 
     * @return \Ast\Projectmanager\Domain\Model\Project $project
     */
    public function getProject()
    {
        return $this->project;
    }
    
    /**
     * Sets the project
     * 
     * @param \Ast\Projectmanager\Domain\Model\Project $project
     * @return void
     */
    public function setProject(\Ast\Projectmanager\Domain\Model\Project $project)
    {
        $this->project = $project;
    }
    
    /**
     * Returns the approachDescription
     * 
     * @return string $approachDescription
     */
    public function getApproachDescription()
    {
        return $this->approachDescription;
    }
    
    /**
     * Sets the approachDescription
     * 
     * @param string $approachDescription
     * @return void
     */
    public function setApproachDescription($approachDescription)
    {
        $this->approachDescription = $approachDescription;
    }
    
    /**
     * Returns the taskStartDate
     * 
     * @return \DateTime $taskStartDate
     */
    public function getTaskStartDate()
    {
        return $this->taskStartDate;
    }
    
    /**
     * Sets the taskStartDate
     * 
     * @param \DateTime $taskStartDate
     * @return void
     */
    public function setTaskStartDate(\DateTime $taskStartDate = null)
    {
        $this->taskStartDate = $taskStartDate;
    }
    
    /**
     * Returns the taskFinishDate
     * 
     * @return \DateTime $taskFinishDate
     */
    public function getTaskFinishDate()
    {
        return $this->taskFinishDate;
    }
    
    /**
     * Sets the taskFinishDate
     * 
     * @param \DateTime $taskFinishDate
     * @return void
     */
    public function setTaskFinishDate(\DateTime $taskFinishDate = null)
    {
        $this->taskFinishDate = $taskFinishDate;
    }
    
    /**
     * Returns the estimatedTaskFinishDate
     * 
     * @return \DateTime $estimatedTaskFinishDate
     */
    public function getEstimatedTaskFinishDate()
    {
        return $this->estimatedTaskFinishDate;
    }
    
    /**
     * Sets the estimatedTaskFinishDate
     * 
     * @param \DateTime $estimatedTaskFinishDate
     * @return void
     */
    public function setEstimatedTaskFinishDate(\DateTime $estimatedTaskFinishDate = null)
    {
        $this->estimatedTaskFinishDate = $estimatedTaskFinishDate;
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
     * Returns the estimatedTimeInHours
     * 
     * @return float estimatedTimeInHours
     */
    public function getEstimatedTimeInHours()
    {
        return $this->estimatedTimeInHours;
    }
    
    /**
     * Sets the estimatedTimeInHours
     * 
     * @param float $estimatedTimeInHours
     * @return void
     */
    public function setEstimatedTimeInHours($estimatedTimeInHours)
    {
        $this->estimatedTimeInHours = $estimatedTimeInHours;
    }
    
    /**
     * Returns the requiredTimeInHours
     * 
     * @return float requiredTimeInHours
     */
    public function getRequiredTimeInHours()
    {
        return $this->requiredTimeInHours;
    }
    
    /**
     * Sets the requiredTimeInHours
     * 
     * @param float $requiredTimeInHours
     * @return void
     */
    public function setRequiredTimeInHours($requiredTimeInHours)
    {
        $this->requiredTimeInHours = $requiredTimeInHours;
    }
    
    /**
     * Returns the estimatedCosts
     * 
     * @return float $estimatedCosts
     */
    public function getEstimatedCosts()
    {
        return $this->estimatedCosts;
    }
    
    /**
     * Sets the estimatedCosts
     * 
     * @param float $estimatedCosts
     * @return void
     */
    public function setEstimatedCosts($estimatedCosts)
    {
        $this->estimatedCosts = $estimatedCosts;
    }
    
    /**
     * Returns the requiredCosts
     * 
     * @return float $requiredCosts
     */
    public function getRequiredCosts()
    {
        return $this->requiredCosts;
    }
    
    /**
     * Sets the requiredCosts
     * 
     * @param float $requiredCosts
     * @return void
     */
    public function setRequiredCosts($requiredCosts)
    {
        $this->requiredCosts = $requiredCosts;
    }
    
    /**
     * Adds a Bug
     * 
     * @param \Ast\Projectmanager\Domain\Model\Bug $bug
     * @return void
     */
    public function addBug(\Ast\Projectmanager\Domain\Model\Bug $bug)
    {
        $this->bugs->attach($bug);
    }
    
    /**
     * Removes a Bug
     * 
     * @param \Ast\Projectmanager\Domain\Model\Bug $bugToRemove The Bug to be removed
     * @return void
     */
    public function removeBug(\Ast\Projectmanager\Domain\Model\Bug $bugToRemove)
    {
        $this->bugs->detach($bugToRemove);
    }
    
    /**
     * Returns the bugs
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\Bug> $bugs
     */
    public function getBugs()
    {
        return $this->bugs;
    }
    
    /**
     * Sets the bugs
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\Bug> $bugs
     * @return void
     */
    public function setBugs(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $bugs)
    {
        $this->bugs = $bugs;
    }
    
    /**
     * Adds a Folder
     * 
     * @param \Ast\Projectmanager\Domain\Model\Folder $folder
     * @return void
     */
    public function addFolder(\Ast\Projectmanager\Domain\Model\Folder $folder)
    {
        $this->folder->attach($folder);
    }
    
    /**
     * Removes a Folder
     * 
     * @param \Ast\Projectmanager\Domain\Model\Folder $fileToRemove The Folder to be removed
     * @return void
     */
    public function removeFolder(\Ast\Projectmanager\Domain\Model\Folder $folderToRemove)
    {
        $this->folder->detach($folderToRemove);
    }
    
    /**
     * Returns the folder
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\Folder> $folder
     */
    public function getFolder()
    {
        return $this->folder;
    }
    
    /**
     * Sets the folder
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\Folder> $folder
     * @return void
     */
    public function setFolder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $folder)
    {
        $this->folder = $folder;
    }
    
    /**
     * Returns the taskMaster
     * 
     * @return \Ast\Projectmanager\Domain\Model\User taskMaster
     */
    public function getTaskMaster()
    {
        return $this->taskMaster;
    }
    
    /**
     * Sets the taskMaster
     * 
     * @param \Ast\Projectmanager\Domain\Model\User $taskMaster
     * @return void
     */
    public function setTaskMaster(\Ast\Projectmanager\Domain\Model\User $taskMaster)
    {
        $this->taskMaster = $taskMaster;
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
     * @param int $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}