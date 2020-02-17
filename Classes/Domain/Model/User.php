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
class User extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
{
    /**
     * @var string
     * @validate NotEmpty, StringLength(minimum=4,maximum=20), Text
     */
    protected $username = '';



    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup>
     * @validate NotEmpty
     */
    protected $usergroup;

    /**
     * @var string
     * @validate NotEmpty, String, Text
     */
    protected $name = '';

    /**
     * @var string
     * @validate NotEmpty, String, Text
     */
    protected $telephone = '';	
	
    /**
     * @var string
     * @validate NotEmpty, EmailAddress
     */
    protected $email = '';	
	
    /**
     * hourlyRate
     * 
     * @var string
     * @validate Integer
     */
    protected $hourlyRate = '';
    
    /**
     * business
     * 
     * @var \Ast\Projectmanager\Domain\Model\Business
     * @validate NotEmpty
	 * 
	 */
    protected $business = null;
    
	
    /**
     * Returns the hourlyRate
     * 
     * @return string $hourlyRate
     */
    public function getHourlyRate()
    {
        return $this->hourlyRate;
    }
    
    /**
     * Sets the hourlyRate
     * 
     * @param string $hourlyRate
     * @return void
     */
    public function setHourlyRate($hourlyRate)
    {
        $this->hourlyRate = $hourlyRate;
    }
    
    /**
     * __construct
     */
	/*
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
 */   
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
    public function setBusiness(\Ast\Projectmanager\Domain\Model\Business $business=null)
    {
        $this->business = $business;
    }

}