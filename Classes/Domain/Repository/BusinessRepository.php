<?php
namespace Ast\Projectmanager\Domain\Repository;

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
 * The repository for Businesses
 */
class BusinessRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    // Order by name
    protected $defaultOrderings = array(
        'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );
    
    /**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\Category $category
     * @param string $search
     * @param integer $offset
     * @param integer $limit
	 * @param string $orderProperty
	 * @param string $orderStr
     */
    public function findSearchForm($category, $search, $offset, $limit, $orderProperty, $orderStr)
    {
        $query = $this->createQuery();
		if($orderStr=='asc')$query->setOrderings (array($orderProperty => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
		else	  $query->setOrderings (array($orderProperty => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
        if (!empty($category)) {
			$query->matching(
				$query->logicalAnd(
					$query->contains('categories', $category),
					$query->logicalOr(
						$query->like('name', '%' . $search . '%'),
						$query->like('categories.title', '%' . $search . '%'),
						$query->like('telephone', '%' . $search . '%'),
						$query->like('email', '%' . $search . '%')
					)				
				)
			);
		} else {
			$query->matching(
				$query->logicalOr(
					$query->like('name', '%' . $search . '%'),
					$query->like('categories.title', '%' . $search . '%'),
					$query->like('telephone', '%' . $search . '%'),
					$query->like('email', '%' . $search . '%')
				)								
			);			
		}
        $query->setOffset($offset);
        $query->setLimit($limit); 
        return $query->execute();
    }			
    
    /**
     * @param string $search
     */
	/*
    public function countSearchForm($search)
    {
        $query = $this->createQuery();
        $query->matching($query->like('name', '%' . $search . '%'));
        return $query->count();
    }
	*/
    /**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\Category $category
     * @param string $search
     */
    public function countSearchForm($category, $search)
    {
        $query = $this->createQuery();
        if (!empty($category)) {
			$query->matching(
				$query->logicalAnd(
					$query->contains('categories', $category),
					$query->logicalOr(
						$query->like('name', '%' . $search . '%'),
						$query->like('categories.title', '%' . $search . '%'),
						$query->like('telephone', '%' . $search . '%'),
						$query->like('email', '%' . $search . '%')
					)				
				)
			);
		} else {
			$query->matching(
				$query->logicalOr(
					$query->like('name', '%' . $search . '%'),
					$query->like('categories.title', '%' . $search . '%'),
					$query->like('telephone', '%' . $search . '%'),
					$query->like('email', '%' . $search . '%')
				)								
			);			
		}
        return $query->count();
    }
}