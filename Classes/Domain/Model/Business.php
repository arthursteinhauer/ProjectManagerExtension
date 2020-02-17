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
 * Business
 */
class Business extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * categories
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     * @cascade remove
     */
    protected $categories = null;
    
    /**
     * businessDirector
     * 
     * @var string
     */
    protected $businessDirector = '';
    
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
     * street
     * 
     * @var string
     */
    protected $street = '';
    
    /**
     * streetNumber
     * 
     * @var string
     */
    protected $streetNumber = '';
    
    /**
     * zip
     * 
     * @var string
     */
    protected $zip = '';
    
    /**
     * city
     * 
     * @var string
     */
    protected $city = '';
    
    /**
     * country
     * 
     * @var string
     */
    protected $country = '';
    
    /**
     * county
     * 
     * @var string
     */
    protected $county = '';
    
    /**
     * telephone
     * 
     * @var string
     */
    protected $telephone = '';
    
    /**
     * handy
     * 
     * @var string
     */
    protected $handy = '';
    
    /**
     * fax
     * 
     * @var string
     */
    protected $fax = '';
    
    /**
     * email
     * 
     * @var string
     */
    protected $email = '';

    /**
     * web
     *
     * @var string
     */
    protected $web = '';
    
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
     * Returns the street
     * 
     * @return string $street
     */
    public function getStreet()
    {
        return $this->street;
    }
    
    /**
     * Sets the street
     * 
     * @param string $street
     * @return void
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }
    
    /**
     * Returns the zip
     * 
     * @return string $zip
     */
    public function getZip()
    {
        return $this->zip;
    }
    
    /**
     * Sets the zip
     * 
     * @param string $zip
     * @return void
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }
    
    /**
     * Returns the city
     * 
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * Sets the city
     * 
     * @param string $city
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
    }
    
    /**
     * Returns the country
     * 
     * @return string $country
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    /**
     * Sets the country
     * 
     * @param string $country
     * @return void
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }
    
    /**
     * Returns the county
     * 
     * @return string $county
     */
    public function getCounty()
    {
        return $this->county;
    }
    
    /**
     * Sets the county
     * 
     * @param string $county
     * @return void
     */
    public function setCounty($county)
    {
        $this->county = $county;
    }
    
    /**
     * Returns the businessDirector
     * 
     * @return string $businessDirector
     */
    public function getBusinessDirector()
    {
        return $this->businessDirector;
    }
    
    /**
     * Sets the businessDirector
     * 
     * @param string $businessDirector
     * @return void
     */
    public function setBusinessDirector($businessDirector)
    {
        $this->businessDirector = $businessDirector;
    }
    
    /**
     * Returns the telephone
     * 
     * @return string $telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }
    
    /**
     * Sets the telephone
     * 
     * @param string $telephone
     * @return void
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }
    
    /**
     * Returns the handy
     * 
     * @return string $handy
     */
    public function getHandy()
    {
        return $this->handy;
    }
    
    /**
     * Sets the handy
     * 
     * @param string $handy
     * @return void
     */
    public function setHandy($handy)
    {
        $this->handy = $handy;
    }
    
    /**
     * Returns the fax
     * 
     * @return string $fax
     */
    public function getFax()
    {
        return $this->fax;
    }
    
    /**
     * Sets the fax
     * 
     * @param string $fax
     * @return void
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }
    
    /**
     * Returns the email
     * 
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Sets the email
     * 
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the web
     *
     * @return string $web
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Sets the web
     *
     * @param string $web
     * @return void
     */
    public function setWeb($web)
    {
        $this->web = $web;
    }
    
    /**
     * Returns the streetNumber
     * 
     * @return string streetNumber
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }
    
    /**
     * Sets the streetNumber
     * 
     * @param string $streetNumber
     * @return void
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
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
		$this->categories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();        
    }

}