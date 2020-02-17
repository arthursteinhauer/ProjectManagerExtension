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
 * Project
 */
class Project extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    
    /**
     * name
     * 
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';
	
    /**
     * categories
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     * @cascade remove
     */
    protected $categories = null;
    
    /**
     * projectStartDate
     * 
     * @var \DateTime
     */
    protected $projectStartDate = null;
    
    /**
     * critical
     * 
     * @var bool
     */
    protected $critical = 0;
    
    /**
     * folder
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\Folder>
     * @cascade remove
     */
    protected $folder = null;
    
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
     * estimatedProjectFinishDate
     * 
     * @var \DateTime
     */
    protected $estimatedProjectFinishDate = null;	
    
    /**
     * projectFinishDate
     * 
     * @var \DateTime
     */
    protected $projectFinishDate = null;
    
    /**
     * status
     * 
     * @var int
     * @validate NotEmpty
     */
    protected $status = 0;
    
    /**
     * comment
     * 
     * @var string
     */
    protected $comment = '';
    
    /**
     * projectManager
     * 
     * @var \Ast\Projectmanager\Domain\Model\User
     * @validate NotEmpty
     */
    protected $projectManager = null;
    
    /**
     * business
     * 
     * @var \Ast\Projectmanager\Domain\Model\Business
     * @validate NotEmpty
     */
    protected $business = null;
    
    /**
     * additionalCosts
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\AdditionalCosts>
     * @cascade remove
     */
    protected $additionalCosts = null;    
    
    
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
     * Adds a Category
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $category
     * @return void
     */
    public function addCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $category)
    {
        $this->categories->attach($category);
    }
    
    /**
     * Removes a Category
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove The Category to be removed
     * @return void
     */
    public function removeCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove)
    {
        $this->categories->detach($categoryToRemove);
    }
    
    /**
     * Returns the categories
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $categories
     */
    public function getCategories()
    {
        return $this->categories;
    }
    
    /**
     * Sets the categories
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $categories
     * @return void
     */
    public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories)
    {
        $this->categories = $categories;
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
        $this->additionalCosts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->categories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the projectStartDate
     * 
     * @return \DateTime projectStartDate
     */
    public function getProjectStartDate()
    {
        return $this->projectStartDate;
    }
    
    /**
     * Sets the projectStartDate
     * 
     * @param \DateTime $projectStartDate
     * @return void
     */
    public function setProjectStartDate(\DateTime $projectStartDate = null)
    {
        $this->projectStartDate = $projectStartDate;
    }
    
    /**
     * Returns the projectFinishDate
     * 
     * @return \DateTime projectFinishDate
     */
    public function getProjectFinishDate()
    {
        return $this->projectFinishDate;
    }
    
    /**
     * Sets the projectFinishDate
     * 
     * @param \DateTime $projectFinishDate
     * @return void
     */
    public function setProjectFinishDate(\DateTime $projectFinishDate = null)
    {
        $this->projectFinishDate = $projectFinishDate;
    }
    
    
    /**
     * Returns the estimatedProjectFinishDate
     * 
     * @return \DateTime estimatedProjectFinishDate
     */
    public function getEstimatedProjectFinishDate()
    {
        return $this->estimatedProjectFinishDate;
    }
    
    /**
     * Sets the estimatedProjectFinishDate
     * 
     * @param \DateTime $estimatedProjectFinishDate
     * @return void
     */
    public function setEstimatedProjectFinishDate(\DateTime $estimatedProjectFinishDate = null)
    {
        $this->estimatedProjectFinishDate = $estimatedProjectFinishDate;
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
     * Returns the projectManager
     * 
     * @return \Ast\Projectmanager\Domain\Model\User $projectManager
     */
    public function getProjectManager()
    {
        return $this->projectManager;
    }
    
    /**
     * Sets the projectManager
     * 
     * @param \Ast\Projectmanager\Domain\Model\User $projectManager
     * @return void
     */
    public function setProjectManager(\Ast\Projectmanager\Domain\Model\User $projectManager = null)
    {
        $this->projectManager = $projectManager;
    }
    
    /**
     * Returns the business
     * 
     * @return \Ast\Projectmanager\Domain\Model\Business $business
     */
    public function getBusiness()
    {
        return $this->business;
    }
    
    /**
     * Sets the business
     * 
     * @param \Ast\Projectmanager\Domain\Model\Business $business
     * @return void
     */
    public function setBusiness(\Ast\Projectmanager\Domain\Model\Business $business)
    {
        $this->business = $business;
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
    
    /**
     * Returns the critical
     * 
     * @return bool critical
     */
    public function getCritical()
    {
        return $this->critical;
    }
    
    /**
     * Sets the critical
     * 
     * @param bool $critical
     * @return void
     */
    public function setCritical($critical)
    {
        $this->critical = $critical;
    }
    
    /**
     * Adds a AdditionalCosts
     * 
     * @param \Ast\Projectmanager\Domain\Model\AdditionalCosts $additionalCost
     * @return void
     */
    public function addAdditionalCost(\Ast\Projectmanager\Domain\Model\AdditionalCosts $additionalCost)
    {
        $this->additionalCosts->attach($additionalCost);
    }
    
    /**
     * Removes a AdditionalCosts
     * 
     * @param \Ast\Projectmanager\Domain\Model\AdditionalCosts $additionalCostToRemove The AdditionalCosts to be removed
     * @return void
     */
    public function removeAdditionalCost(\Ast\Projectmanager\Domain\Model\AdditionalCosts $additionalCostToRemove)
    {
        $this->additionalCosts->detach($additionalCostToRemove);
    }
    
    /**
     * Returns the additionalCosts
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\AdditionalCosts> $additionalCosts
     */
    public function getAdditionalCosts()
    {
        return $this->additionalCosts;
    }
    
    /**
     * Sets the additionalCosts
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ast\Projectmanager\Domain\Model\AdditionalCosts> $additionalCosts
     * @return void
     */
    public function setAdditionalCosts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $additionalCosts)
    {
        $this->additionalCosts = $additionalCosts;
    }

}