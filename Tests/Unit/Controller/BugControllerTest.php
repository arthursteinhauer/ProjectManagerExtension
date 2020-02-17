<?php
namespace Ast\Projectmanager\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Ast\Projectmanager\Controller\BugController.
 *
 */
class BugControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Ast\Projectmanager\Controller\BugController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Ast\\Projectmanager\\Controller\\BugController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllBugsFromRepositoryAndAssignsThemToView()
	{

		$allBugs = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$bugRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\BugRepository', array('findAll'), array(), '', FALSE);
		$bugRepository->expects($this->once())->method('findAll')->will($this->returnValue($allBugs));
		$this->inject($this->subject, 'bugRepository', $bugRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('bugs', $allBugs);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenBugToView()
	{
		$bug = new \Ast\Projectmanager\Domain\Model\Bug();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('bug', $bug);

		$this->subject->showAction($bug);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenBugToBugRepository()
	{
		$bug = new \Ast\Projectmanager\Domain\Model\Bug();

		$bugRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\BugRepository', array('add'), array(), '', FALSE);
		$bugRepository->expects($this->once())->method('add')->with($bug);
		$this->inject($this->subject, 'bugRepository', $bugRepository);

		$this->subject->createAction($bug);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenBugToView()
	{
		$bug = new \Ast\Projectmanager\Domain\Model\Bug();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('bug', $bug);

		$this->subject->editAction($bug);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenBugInBugRepository()
	{
		$bug = new \Ast\Projectmanager\Domain\Model\Bug();

		$bugRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\BugRepository', array('update'), array(), '', FALSE);
		$bugRepository->expects($this->once())->method('update')->with($bug);
		$this->inject($this->subject, 'bugRepository', $bugRepository);

		$this->subject->updateAction($bug);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenBugFromBugRepository()
	{
		$bug = new \Ast\Projectmanager\Domain\Model\Bug();

		$bugRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\BugRepository', array('remove'), array(), '', FALSE);
		$bugRepository->expects($this->once())->method('remove')->with($bug);
		$this->inject($this->subject, 'bugRepository', $bugRepository);

		$this->subject->deleteAction($bug);
	}
}
