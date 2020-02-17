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
 * Test case for class Ast\Projectmanager\Controller\FilesController.
 *
 */
class FilesControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Ast\Projectmanager\Controller\FilesController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Ast\\Projectmanager\\Controller\\FilesController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllFilessFromRepositoryAndAssignsThemToView()
	{

		$allFiless = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$filesRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\FilesRepository', array('findAll'), array(), '', FALSE);
		$filesRepository->expects($this->once())->method('findAll')->will($this->returnValue($allFiless));
		$this->inject($this->subject, 'filesRepository', $filesRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('filess', $allFiless);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenFilesToView()
	{
		$files = new \Ast\Projectmanager\Domain\Model\Files();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('files', $files);

		$this->subject->showAction($files);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenFilesToFilesRepository()
	{
		$files = new \Ast\Projectmanager\Domain\Model\Files();

		$filesRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\FilesRepository', array('add'), array(), '', FALSE);
		$filesRepository->expects($this->once())->method('add')->with($files);
		$this->inject($this->subject, 'filesRepository', $filesRepository);

		$this->subject->createAction($files);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenFilesToView()
	{
		$files = new \Ast\Projectmanager\Domain\Model\Files();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('files', $files);

		$this->subject->editAction($files);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenFilesInFilesRepository()
	{
		$files = new \Ast\Projectmanager\Domain\Model\Files();

		$filesRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\FilesRepository', array('update'), array(), '', FALSE);
		$filesRepository->expects($this->once())->method('update')->with($files);
		$this->inject($this->subject, 'filesRepository', $filesRepository);

		$this->subject->updateAction($files);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenFilesFromFilesRepository()
	{
		$files = new \Ast\Projectmanager\Domain\Model\Files();

		$filesRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\FilesRepository', array('remove'), array(), '', FALSE);
		$filesRepository->expects($this->once())->method('remove')->with($files);
		$this->inject($this->subject, 'filesRepository', $filesRepository);

		$this->subject->deleteAction($files);
	}
}
