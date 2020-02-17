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
 * Test case for class Ast\Projectmanager\Controller\ImagesController.
 *
 */
class ImagesControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Ast\Projectmanager\Controller\ImagesController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Ast\\Projectmanager\\Controller\\ImagesController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllImagessFromRepositoryAndAssignsThemToView()
	{

		$allImagess = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$imagesRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\ImagesRepository', array('findAll'), array(), '', FALSE);
		$imagesRepository->expects($this->once())->method('findAll')->will($this->returnValue($allImagess));
		$this->inject($this->subject, 'imagesRepository', $imagesRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('imagess', $allImagess);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenImagesToView()
	{
		$images = new \Ast\Projectmanager\Domain\Model\Images();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('images', $images);

		$this->subject->showAction($images);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenImagesToImagesRepository()
	{
		$images = new \Ast\Projectmanager\Domain\Model\Images();

		$imagesRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\ImagesRepository', array('add'), array(), '', FALSE);
		$imagesRepository->expects($this->once())->method('add')->with($images);
		$this->inject($this->subject, 'imagesRepository', $imagesRepository);

		$this->subject->createAction($images);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenImagesToView()
	{
		$images = new \Ast\Projectmanager\Domain\Model\Images();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('images', $images);

		$this->subject->editAction($images);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenImagesInImagesRepository()
	{
		$images = new \Ast\Projectmanager\Domain\Model\Images();

		$imagesRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\ImagesRepository', array('update'), array(), '', FALSE);
		$imagesRepository->expects($this->once())->method('update')->with($images);
		$this->inject($this->subject, 'imagesRepository', $imagesRepository);

		$this->subject->updateAction($images);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenImagesFromImagesRepository()
	{
		$images = new \Ast\Projectmanager\Domain\Model\Images();

		$imagesRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\ImagesRepository', array('remove'), array(), '', FALSE);
		$imagesRepository->expects($this->once())->method('remove')->with($images);
		$this->inject($this->subject, 'imagesRepository', $imagesRepository);

		$this->subject->deleteAction($images);
	}
}
