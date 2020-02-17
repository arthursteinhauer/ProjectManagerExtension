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
 * Test case for class Ast\Projectmanager\Controller\TimesController.
 *
 */
class TimesControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Ast\Projectmanager\Controller\TimesController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Ast\\Projectmanager\\Controller\\TimesController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllTimessFromRepositoryAndAssignsThemToView()
	{

		$allTimess = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$timesRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\TimesRepository', array('findAll'), array(), '', FALSE);
		$timesRepository->expects($this->once())->method('findAll')->will($this->returnValue($allTimess));
		$this->inject($this->subject, 'timesRepository', $timesRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('timess', $allTimess);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenTimesToView()
	{
		$times = new \Ast\Projectmanager\Domain\Model\Times();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('times', $times);

		$this->subject->showAction($times);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenTimesToTimesRepository()
	{
		$times = new \Ast\Projectmanager\Domain\Model\Times();

		$timesRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\TimesRepository', array('add'), array(), '', FALSE);
		$timesRepository->expects($this->once())->method('add')->with($times);
		$this->inject($this->subject, 'timesRepository', $timesRepository);

		$this->subject->createAction($times);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenTimesToView()
	{
		$times = new \Ast\Projectmanager\Domain\Model\Times();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('times', $times);

		$this->subject->editAction($times);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenTimesInTimesRepository()
	{
		$times = new \Ast\Projectmanager\Domain\Model\Times();

		$timesRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\TimesRepository', array('update'), array(), '', FALSE);
		$timesRepository->expects($this->once())->method('update')->with($times);
		$this->inject($this->subject, 'timesRepository', $timesRepository);

		$this->subject->updateAction($times);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenTimesFromTimesRepository()
	{
		$times = new \Ast\Projectmanager\Domain\Model\Times();

		$timesRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\TimesRepository', array('remove'), array(), '', FALSE);
		$timesRepository->expects($this->once())->method('remove')->with($times);
		$this->inject($this->subject, 'timesRepository', $timesRepository);

		$this->subject->deleteAction($times);
	}
}
