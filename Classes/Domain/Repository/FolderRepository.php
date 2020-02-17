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
 * The repository for Folder
 */
class FolderRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
	/*
	 * Default ordering for all queries created by this repository
	 */
	protected $defaultOrderings = array(
		'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
	);

	public function initializeObject() {
		$querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
		$querySettings->setRespectStoragePage(FALSE);
		$this->setDefaultQuerySettings($querySettings);
	}
	
	/**
	 * @param \Ast\Projectmanager\Domain\Model\Folder $folder	
	 * @param \Ast\Projectmanager\Domain\Model\Task $task
	 */
	public function findByParentAndTask(\Ast\Projectmanager\Domain\Model\Folder $folder, \Ast\Projectmanager\Domain\Model\Task $task) {
        $query = $this->createQuery();

		$query->matching(
			$query->logicalAnd(
				$query->equals('parent', $folder),
				$query->equals('task', $task)
			)
		);
		
        return $query->execute();		
	}
	
	/**
	 * @param \Ast\Projectmanager\Domain\Model\Folder $folder	
	 * @param \Ast\Projectmanager\Domain\Model\Project $project
	 */
	public function findByParentAndProject(\Ast\Projectmanager\Domain\Model\Folder $folder, \Ast\Projectmanager\Domain\Model\Project $project) {
        $query = $this->createQuery();

		$query->matching(
			$query->logicalAnd(
				$query->equals('parent', $folder),
				$query->equals('project', $project)
			)
		);
		
        return $query->execute();		
	}	
    
}