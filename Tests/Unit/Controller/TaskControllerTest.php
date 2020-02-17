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
 * Test case for class Ast\Projectmanager\Controller\TaskController.
 *
 */
class TaskControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Ast\Projectmanager\Controller\TaskController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Ast\\Projectmanager\\Controller\\TaskController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllTasksFromRepositoryAndAssignsThemToView()
	{

		$allTasks = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$taskRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\TaskRepository', array('findAll'), array(), '', FALSE);
		$taskRepository->expects($this->once())->method('findAll')->will($this->returnValue($allTasks));
		$this->inject($this->subject, 'taskRepository', $taskRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('tasks', $allTasks);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenTaskToView()
	{
		$task = new \Ast\Projectmanager\Domain\Model\Task();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('task', $task);

		$this->subject->showAction($task);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenTaskToTaskRepository()
	{
		$task = new \Ast\Projectmanager\Domain\Model\Task();

		$taskRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\TaskRepository', array('add'), array(), '', FALSE);
		$taskRepository->expects($this->once())->method('add')->with($task);
		$this->inject($this->subject, 'taskRepository', $taskRepository);

		$this->subject->createAction($task);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenTaskToView()
	{
		$task = new \Ast\Projectmanager\Domain\Model\Task();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('task', $task);

		$this->subject->editAction($task);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenTaskInTaskRepository()
	{
		$task = new \Ast\Projectmanager\Domain\Model\Task();

		$taskRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\TaskRepository', array('update'), array(), '', FALSE);
		$taskRepository->expects($this->once())->method('update')->with($task);
		$this->inject($this->subject, 'taskRepository', $taskRepository);

		$this->subject->updateAction($task);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenTaskFromTaskRepository()
	{
		$task = new \Ast\Projectmanager\Domain\Model\Task();

		$taskRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\TaskRepository', array('remove'), array(), '', FALSE);
		$taskRepository->expects($this->once())->method('remove')->with($task);
		$this->inject($this->subject, 'taskRepository', $taskRepository);

		$this->subject->deleteAction($task);
	}
}
