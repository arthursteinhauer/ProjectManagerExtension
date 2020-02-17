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
 * User
 */
class UserGroup extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup
{
    /**
     * businessRead
     * 
     * @var bool
     */
    protected $businessRead = 0;

    /**
     * businessEdit
     * 
     * @var bool
     */
    protected $businessEdit = 0;

    /**
     * businessDelete
     * 
     * @var bool
     */
    protected $businessDelete = 0;

    /**
     * businessNew
     * 
     * @var bool
     */
    protected $businessNew = 0;

    /**
     * businessFiles
     * 
     * @var bool
     */
    protected $businessFiles = 0;

    /**
     * businessFilesUpload
     * 
     * @var bool
     */
    protected $businessFilesUpload = 0;

    /**
     * businessFilesDelete
     * 
     * @var bool
     */
    protected $businessFilesDelete = 0;

    /**
     * businessFilesFolderNew
     * 
     * @var bool
     */
    protected $businessFilesFolderNew = 0;

    /**
     * businessFilesFolderDelete
     * 
     * @var bool
     */
    protected $businessFilesFolderDelete = 0;

    /**
     * businessUsers
     * 
     * @var bool
     */
    protected $businessUsers = 0;

    /**
     * businessProjects
     * 
     * @var bool
     */
    protected $businessProjects = 0;	
	
    /**
     * userRead
     * 
     * @var bool
     */
    protected $userRead = 0;

    /**
     * userEdit
     * 
     * @var bool
     */
    protected $userEdit = 0;

    /**
     * userDelete
     * 
     * @var bool
     */
    protected $userDelete = 0;

    /**
     * userNew
     * 
     * @var bool
     */
    protected $userNew = 0;
	
    /**
     * userTasks
     * 
     * @var bool
     */
    protected $userTasks = 0;

    /**
     * userProjects
     * 
     * @var bool
     */
    protected $userProjects = 0;

   /**
     * projectRead
     * 
     * @var bool
     */
    protected $projectRead = 0;

    /**
     * projectEdit
     * 
     * @var bool
     */
    protected $projectEdit = 0;

    /**
     * projectDelete
     * 
     * @var bool
     */
    protected $projectDelete = 0;

    /**
     * projectNew
     * 
     * @var bool
     */
    protected $projectNew = 0;

    /**
     * projectFiles
     * 
     * @var bool
     */
    protected $projectFiles = 0;

    /**
     * projectFilesUpload
     * 
     * @var bool
     */
    protected $projectFilesUpload = 0;

    /**
     * projectFilesDelete
     * 
     * @var bool
     */
    protected $projectFilesDelete = 0;

    /**
     * projectFilesFolderNew
     * 
     * @var bool
     */
    protected $projectFilesFolderNew = 0;

    /**
     * projectFilesFolderDelete
     * 
     * @var bool
     */
    protected $projectFilesFolderDelete = 0;


    /**
     * projectTaskss
     * 
     * @var bool
     */
    protected $projectTasks = 0;	
	
   /**
     * taskRead
     * 
     * @var bool
     */
    protected $taskRead = 0;

    /**
     * taskEdit
     * 
     * @var bool
     */
    protected $taskEdit = 0;

    /**
     * taskDelete
     * 
     * @var bool
     */
    protected $taskDelete = 0;

    /**
     * taskNew
     * 
     * @var bool
     */
    protected $taskNew = 0;

    /**
     * taskFiles
     * 
     * @var bool
     */
    protected $taskFiles = 0;

    /**
     * taskFilesUpload
     * 
     * @var bool
     */
    protected $taskFilesUpload = 0;

    /**
     * taskFilesDelete
     * 
     * @var bool
     */
    protected $taskFilesDelete = 0;

    /**
     * taskFilesFolderNew
     * 
     * @var bool
     */
    protected $taskFilesFolderNew = 0;

    /**
     * taskFilesFolderDelete
     * 
     * @var bool
     */
    protected $taskFilesFolderDelete = 0;


    /**
     * taskTimes
     * 
     * @var bool
     */
    protected $taskTimes = 0;	

    /**
     * taskTimesNew
     * 
     * @var bool
     */
    protected $taskTimesNew = 0;	
	
    /**
     * timeRead
     * 
     * @var bool
     */
    protected $timeRead = 0;

    /**
     * timeEdit
     * 
     * @var bool
     */
    protected $timeEdit = 0;

    /**
     * timeDelete
     * 
     * @var bool
     */
    protected $timeDelete = 0;

    /**
     * timeNew
     * 
     * @var bool
     */
    protected $timeNew = 0;
	
	
	
	/**
     * Returns the businessRead
     * 
     * @return bool businessRead
     */
    public function getBusinessRead()
    {
        return $this->businessRead;
    }
    
    /**
     * Sets the businessRead
     * 
     * @param bool $businessRead
     * @return void
     */
    public function setBusinessRead($businessRead)
    {
        $this->businessRead = $businessRead;
    }
	
	/**
     * Returns the businessEdit
     * 
     * @return bool businessEdit
     */
    public function getBusinessEdit()
    {
        return $this->businessEdit;
    }
    
    /**
     * Sets the businessEdit
     * 
     * @param bool $businessEdit
     * @return void
     */
    public function setBusinessEdit($businessEdit)
    {
        $this->businessEdit = $businessEdit;
    }	
	
	/**
     * Returns the businessDelete
     * 
     * @return bool businessDelete
     */
    public function getBusinessDelete()
    {
        return $this->businessDelete;
    }
    
    /**
     * Sets the businessDelete
     * 
     * @param bool $businessDelete
     * @return void
     */
    public function setBusinessDelete($businessDelete)
    {
        $this->businessDelete = $businessDelete;
    }	
	
	/**
     * Returns the businessNew
     * 
     * @return bool businessNew
     */
    public function getBusinessNew()
    {
        return $this->businessNew;
    }
    
    /**
     * Sets the businessNew
     * 
     * @param bool $businessNew
     * @return void
     */
    public function setBusinessNew($businessNew)
    {
        $this->businessNew = $businessNew;
    }		
	
	/**
     * Returns the businessFiles
     * 
     * @return bool businessFiles
     */
    public function getBusinessFiles()
    {
        return $this->businessFiles;
    }
    
    /**
     * Sets the businessFiles
     * 
     * @param bool $businessFiles
     * @return void
     */
    public function setBusinessFiles($businessFiles)
    {
        $this->businessFiles = $businessFiles;
    }	
		
	/**
     * Returns the businessFilesUpload
     * 
     * @return bool businessFilesUpload
     */
    public function getBusinessFilesUpload()
    {
        return $this->businessFilesUpload;
    }	
	
    /**
     * Sets the businessFilesUpload
     * 
     * @param bool $businessFilesUpload
     * @return void
     */
    public function setBusinessFilesUpload($businessFilesUpload)
    {
        $this->businessFilesUpload = $businessFilesUpload;
    }
	
	/**
     * Returns the businessFilesDelete
     * 
     * @return bool businessFilesDelete
     */
    public function getBusinessFilesDelete()
    {
        return $this->businessFilesDelete;
    }	
	
    /**
     * Sets the businessFilesDelete
     * 
     * @param bool $businessFilesDelete
     * @return void
     */
    public function setBusinessFilesDelete($businessFilesDelete)
    {
        $this->businessFilesDelete = $businessFilesDelete;
    }			

	/**
     * Returns the businessFilesFolderNew
     * 
     * @return bool businessFilesFolderNew
     */
    public function getBusinessFilesFolderNew()
    {
        return $this->businessFilesFolderNew;
    }	
	
    /**
     * Sets the businessFilesFolderNew
     * 
     * @param bool $businessFilesFolderNew
     * @return void
     */
    public function setBusinessFilesFolderNew($businessFilesFolderNew)
    {
        $this->businessFilesFolderNew = $businessFilesFolderNew;
    }
	/**
     * Returns the businessFilesFolderDelete
     * 
     * @return bool businessFilesFolderDelete
     */
    public function getBusinessFilesFolderDelete()
    {
        return $this->businessFilesFolderDelete;
    }	
	
    /**
     * Sets the businessFilesFolderDelete
     * 
     * @param bool $businessFilesFolderDelete
     * @return void
     */
    public function setBusinessFilesFolderDelete($businessFilesFolderDelete)
    {
        $this->businessFilesFolderDelete = $businessFilesFolderDelete;
    }

	/**
     * Returns the businessUsers
     * 
     * @return bool businessUsers
     */
    public function getBusinessUsers()
    {
        return $this->businessUsers;
    }	
	
    /**
     * Sets the businessUsers
     * 
     * @param bool $businessUsers
     * @return void
     */
    public function setBusinessUsers($businessUsers)
    {
        $this->businessUsers = $businessUsers;
    }
	
	/**
     * Returns the businessProjects
     * 
     * @return bool businessProjects
     */
    public function getBusinessProjects()
    {
        return $this->businessProjects;
    }	
	
    /**
     * Sets the businessProjects
     * 
     * @param bool $businessProjects
     * @return void
     */
    public function setBusinessProjects($businessProjects)
    {
        $this->businessProjects = $businessProjects;
    }	


	/**
     * Returns the userRead
     * 
     * @return bool userRead
     */
    public function getUserRead()
    {
        return $this->userRead;
    }
    
    /**
     * Sets the userRead
     * 
     * @param bool $userRead
     * @return void
     */
    public function setUserRead($userRead)
    {
        $this->userRead = $userRead;
    }
	
	/**
     * Returns the userEdit
     * 
     * @return bool userEdit
     */
    public function getUserEdit()
    {
        return $this->userEdit;
    }
    
    /**
     * Sets the userEdit
     * 
     * @param bool $userEdit
     * @return void
     */
    public function setUserEdit($userEdit)
    {
        $this->userEdit = $userEdit;
    }	
	
	/**
     * Returns the userDelete
     * 
     * @return bool userDelete
     */
    public function getUserDelete()
    {
        return $this->userDelete;
    }
    
    /**
     * Sets the userDelete
     * 
     * @param bool $userDelete
     * @return void
     */
    public function setUserDelete($userDelete)
    {
        $this->userDelete = $userDelete;
    }	
	
	/**
     * Returns the userNew
     * 
     * @return bool userNew
     */
    public function getUserNew()
    {
        return $this->userNew;
    }
    
    /**
     * Sets the userNew
     * 
     * @param bool $userNew
     * @return void
     */
    public function setUserNew($userNew)
    {
        $this->userNew = $userNew;
    }	
	
	/**
     * Returns the userTasks
     * 
     * @return bool userTasks
     */
    public function getUserTasks()
    {
        return $this->userTasks;
    }	
	
    /**
     * Sets the userTasks
     * 
     * @param bool $userTasks
     * @return void
     */
    public function setUserTasks($userTasks)
    {
        $this->userTasks = $userTasks;
    }
	
	/**
     * Returns the userProjects
     * 
     * @return bool userProjects
     */
    public function getUserProjects()
    {
        return $this->userProjects;
    }	
	
    /**
     * Sets the userProjects
     * 
     * @param bool $userProjects
     * @return void
     */
    public function setUserProjects($userProjects)
    {
        $this->userProjects = $userProjects;
    }		

	
	/**
     * Returns the projectRead
     * 
     * @return bool projectRead
     */
    public function getProjectRead()
    {
        return $this->projectRead;
    }
    
    /**
     * Sets the projectRead
     * 
     * @param bool $projectRead
     * @return void
     */
    public function setProjectRead($projectRead)
    {
        $this->projectRead = $projectRead;
    }
	
	/**
     * Returns the projectEdit
     * 
     * @return bool projectEdit
     */
    public function getProjectEdit()
    {
        return $this->projectEdit;
    }
    
    /**
     * Sets the projectEdit
     * 
     * @param bool $projectEdit
     * @return void
     */
    public function setProjectEdit($projectEdit)
    {
        $this->projectEdit = $projectEdit;
    }	
	
	/**
     * Returns the projectDelete
     * 
     * @return bool projectDelete
     */
    public function getProjectDelete()
    {
        return $this->projectDelete;
    }
    
    /**
     * Sets the projectDelete
     * 
     * @param bool $projectDelete
     * @return void
     */
    public function setProjectDelete($projectDelete)
    {
        $this->projectDelete = $projectDelete;
    }	
	
	/**
     * Returns the projectNew
     * 
     * @return bool projectNew
     */
    public function getProjectNew()
    {
        return $this->projectNew;
    }
    
    /**
     * Sets the projectNew
     * 
     * @param bool $projectNew
     * @return void
     */
    public function setProjectNew($projectNew)
    {
        $this->projectNew = $projectNew;
    }		
	
	/**
     * Returns the projectFiles
     * 
     * @return bool projectFiles
     */
    public function getProjectFiles()
    {
        return $this->projectFiles;
    }
    
    /**
     * Sets the projectFiles
     * 
     * @param bool $projectFiles
     * @return void
     */
    public function setProjectFiles($projectFiles)
    {
        $this->projectFiles = $projectFiles;
    }	
		
	/**
     * Returns the projectFilesUpload
     * 
     * @return bool projectFilesUpload
     */
    public function getProjectFilesUpload()
    {
        return $this->projectFilesUpload;
    }	
	
    /**
     * Sets the projectFilesUpload
     * 
     * @param bool $projectFilesUpload
     * @return void
     */
    public function setProjectFilesUpload($projectFilesUpload)
    {
        $this->projectFilesUpload = $projectFilesUpload;
    }
	
	/**
     * Returns the projectFilesDelete
     * 
     * @return bool projectFilesDelete
     */
    public function getProjectFilesDelete()
    {
        return $this->projectFilesDelete;
    }	
	
    /**
     * Sets the projectFilesDelete
     * 
     * @param bool $projectFilesDelete
     * @return void
     */
    public function setProjectFilesDelete($projectFilesDelete)
    {
        $this->projectFilesDelete = $projectFilesDelete;
    }			

	/**
     * Returns the projectFilesFolderNew
     * 
     * @return bool projectFilesFolderNew
     */
    public function getProjectFilesFolderNew()
    {
        return $this->projectFilesFolderNew;
    }	
	
    /**
     * Sets the projectFilesFolderNew
     * 
     * @param bool $projectFilesFolderNew
     * @return void
     */
    public function setProjectFilesFolderNew($projectFilesFolderNew)
    {
        $this->projectFilesFolderNew = $projectFilesFolderNew;
    }
	/**
     * Returns the projectFilesFolderDelete
     * 
     * @return bool projectFilesFolderDelete
     */
    public function getProjectFilesFolderDelete()
    {
        return $this->projectFilesFolderDelete;
    }	
	
    /**
     * Sets the projectFilesFolderDelete
     * 
     * @param bool $projectFilesFolderDelete
     * @return void
     */
    public function setProjectFilesFolderDelete($projectFilesFolderDelete)
    {
        $this->projectFilesFolderDelete = $projectFilesFolderDelete;
    }

	/**
     * Returns the projectTasks
     * 
     * @return bool projectTasks
     */
    public function getProjectTasks()
    {
        return $this->projectTasks;
    }	
	
    /**
     * Sets the projectTasks
     * 
     * @param bool $projectTasks
     * @return void
     */
    public function setProjectTasks($projectTasks)
    {
        $this->projectTasks = $projectTasks;
    }

	/**
     * Returns the taskRead
     * 
     * @return bool taskRead
     */
    public function getTaskRead()
    {
        return $this->taskRead;
    }
    
    /**
     * Sets the taskRead
     * 
     * @param bool $taskRead
     * @return void
     */
    public function setTaskRead($taskRead)
    {
        $this->taskRead = $taskRead;
    }
	
	/**
     * Returns the taskEdit
     * 
     * @return bool taskEdit
     */
    public function getTaskEdit()
    {
        return $this->taskEdit;
    }
    
    /**
     * Sets the taskEdit
     * 
     * @param bool $taskEdit
     * @return void
     */
    public function setTaskEdit($taskEdit)
    {
        $this->taskEdit = $taskEdit;
    }	
	
	/**
     * Returns the taskDelete
     * 
     * @return bool taskDelete
     */
    public function getTaskDelete()
    {
        return $this->taskDelete;
    }
    
    /**
     * Sets the taskDelete
     * 
     * @param bool $taskDelete
     * @return void
     */
    public function setTaskDelete($taskDelete)
    {
        $this->taskDelete = $taskDelete;
    }	
	
	/**
     * Returns the taskNew
     * 
     * @return bool taskNew
     */
    public function getTaskNew()
    {
        return $this->taskNew;
    }
    
    /**
     * Sets the taskNew
     * 
     * @param bool $taskNew
     * @return void
     */
    public function setTaskNew($taskNew)
    {
        $this->taskNew = $taskNew;
    }		
	
	/**
     * Returns the taskFiles
     * 
     * @return bool taskFiles
     */
    public function getTaskFiles()
    {
        return $this->taskFiles;
    }
    
    /**
     * Sets the taskFiles
     * 
     * @param bool $taskFiles
     * @return void
     */
    public function setTaskFiles($taskFiles)
    {
        $this->taskFiles = $taskFiles;
    }	
		
	/**
     * Returns the taskFilesUpload
     * 
     * @return bool taskFilesUpload
     */
    public function getTaskFilesUpload()
    {
        return $this->taskFilesUpload;
    }	
	
    /**
     * Sets the taskFilesUpload
     * 
     * @param bool $taskFilesUpload
     * @return void
     */
    public function setTaskFilesUpload($taskFilesUpload)
    {
        $this->taskFilesUpload = $taskFilesUpload;
    }
	
	/**
     * Returns the taskFilesDelete
     * 
     * @return bool taskFilesDelete
     */
    public function getTaskFilesDelete()
    {
        return $this->taskFilesDelete;
    }	
	
    /**
     * Sets the taskFilesDelete
     * 
     * @param bool $taskFilesDelete
     * @return void
     */
    public function setTaskFilesDelete($taskFilesDelete)
    {
        $this->taskFilesDelete = $taskFilesDelete;
    }			

	/**
     * Returns the taskFilesFolderNew
     * 
     * @return bool taskFilesFolderNew
     */
    public function getTaskFilesFolderNew()
    {
        return $this->taskFilesFolderNew;
    }	
	
    /**
     * Sets the taskFilesFolderNew
     * 
     * @param bool $taskFilesFolderNew
     * @return void
     */
    public function setTaskFilesFolderNew($taskFilesFolderNew)
    {
        $this->taskFilesFolderNew = $taskFilesFolderNew;
    }
	/**
     * Returns the taskFilesFolderDelete
     * 
     * @return bool taskFilesFolderDelete
     */
    public function getTaskFilesFolderDelete()
    {
        return $this->taskFilesFolderDelete;
    }	
	
    /**
     * Sets the taskFilesFolderDelete
     * 
     * @param bool $taskFilesFolderDelete
     * @return void
     */
    public function setTaskFilesFolderDelete($taskFilesFolderDelete)
    {
        $this->taskFilesFolderDelete = $taskFilesFolderDelete;
    }

	/**
     * Returns the taskTimes
     * 
     * @return bool taskTimes
     */
    public function getTaskTimes()
    {
        return $this->taskTimes;
    }	
	
    /**
     * Sets the taskTimes
     * 
     * @param bool $taskTimes
     * @return void
     */
    public function setTaskTimes($taskTimes)
    {
        $this->taskTimes = $taskTimes;
    }	
	
	/**
     * Returns the taskTimesNew
     * 
     * @return bool taskTimesNew
     */
    public function getTaskTimesNew()
    {
        return $this->taskTimesNew;
    }	
	
    /**
     * Sets the taskTimesNew
     * 
     * @param bool $taskTimesNew
     * @return void
     */
    public function setTaskTimesNew($taskTimesNew)
    {
        $this->taskTimesNew = $taskTimesNew;
    }
	
	/**
     * Returns the timerRead
     * 
     * @return bool timerRead
     */
    public function getTimerRead()
    {
        return $this->timerRead;
    }
    
    /**
     * Sets the timerRead
     * 
     * @param bool $timerRead
     * @return void
     */
    public function setTimerRead($timerRead)
    {
        $this->timerRead = $timerRead;
    }
	
	/**
     * Returns the timerEdit
     * 
     * @return bool timerEdit
     */
    public function getTimerEdit()
    {
        return $this->timerEdit;
    }
    
    /**
     * Sets the timerEdit
     * 
     * @param bool $timerEdit
     * @return void
     */
    public function setTimerEdit($timerEdit)
    {
        $this->timerEdit = $timerEdit;
    }	
	
	/**
     * Returns the timerDelete
     * 
     * @return bool timerDelete
     */
    public function getTimerDelete()
    {
        return $this->timerDelete;
    }
    
    /**
     * Sets the timerDelete
     * 
     * @param bool $timerDelete
     * @return void
     */
    public function setTimerDelete($timerDelete)
    {
        $this->timerDelete = $timerDelete;
    }	
	
	/**
     * Returns the timerNew
     * 
     * @return bool timerNew
     */
    public function getTimerNew()
    {
        return $this->timerNew;
    }
    
    /**
     * Sets the timerNew
     * 
     * @param bool $timerNew
     * @return void
     */
    public function setTimerNew($timerNew)
    {
        $this->timerNew = $timerNew;
    }	
}	