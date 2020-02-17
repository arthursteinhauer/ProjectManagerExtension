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
 * Times
 */
class Times extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
	
    /**
     * name
     * 
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';
	
    /**
     * task
     * 
     * @var \Ast\Projectmanager\Domain\Model\Task
     * @validate NotEmpty
     */
    protected $task = null;	
	
    /**
     * start
     * 
     * @var \DateTime
     * @validate NotEmpty
     */
    protected $start = null;
	
	/**
     * TimeNeeded
	 * @validate NotEmpty
     * 
     * @var \DateTime
     */
    protected $timeNeeded = null;	
	
    /**
     * comment
     * 
     * @var string
     */
    protected $comment = '';
    
    
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
     * Returns the task
     * 
     * @return \Ast\Projectmanager\Domain\Model\Task $task
     */
    public function getTask()
    {
        return $this->task;
    }
    
    /**
     * Sets the task
     * 
     * @param \Ast\Projectmanager\Domain\Model\Task $task
     * @return void
     */
    public function setTask(\Ast\Projectmanager\Domain\Model\Task $task)
    {
        $this->task = $task;
    }	
	
    /**
     * Returns the start
     * 
     * @return \DateTime $start
     */
    public function getStart()
    {
        return $this->start;
    }
    
    /**
     * Sets the start
     * 
     * @param \DateTime $start
     * @return void
     */
    public function setStart(\DateTime $start)
    {
        $this->start = $start;
    }   
	
    /**
     * Returns the timeNeeded
     * 
     * @return \DateTime $timeNeeded
     */
    public function getTimeNeeded()
    {
        return $this->timeNeeded;
    }
    
    /**
     * Sets the timeNeeded
     * 
     * @param \DateTime $timeNeeded
     * @return void
     */
    public function setTimeNeeded(\DateTime $timeNeeded)
    {
        $this->timeNeeded = $timeNeeded;
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

}