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
 * Test case for class Ast\Projectmanager\Controller\AdditionalCostsController.
 *
 */
class AdditionalCostsControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Ast\Projectmanager\Controller\AdditionalCostsController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Ast\\Projectmanager\\Controller\\AdditionalCostsController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllAdditionalCostssFromRepositoryAndAssignsThemToView()
	{

		$allAdditionalCostss = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$additionalCostsRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\AdditionalCostsRepository', array('findAll'), array(), '', FALSE);
		$additionalCostsRepository->expects($this->once())->method('findAll')->will($this->returnValue($allAdditionalCostss));
		$this->inject($this->subject, 'additionalCostsRepository', $additionalCostsRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('additionalCostss', $allAdditionalCostss);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenAdditionalCostsToView()
	{
		$additionalCosts = new \Ast\Projectmanager\Domain\Model\AdditionalCosts();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('additionalCosts', $additionalCosts);

		$this->subject->showAction($additionalCosts);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenAdditionalCostsToAdditionalCostsRepository()
	{
		$additionalCosts = new \Ast\Projectmanager\Domain\Model\AdditionalCosts();

		$additionalCostsRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\AdditionalCostsRepository', array('add'), array(), '', FALSE);
		$additionalCostsRepository->expects($this->once())->method('add')->with($additionalCosts);
		$this->inject($this->subject, 'additionalCostsRepository', $additionalCostsRepository);

		$this->subject->createAction($additionalCosts);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenAdditionalCostsToView()
	{
		$additionalCosts = new \Ast\Projectmanager\Domain\Model\AdditionalCosts();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('additionalCosts', $additionalCosts);

		$this->subject->editAction($additionalCosts);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenAdditionalCostsInAdditionalCostsRepository()
	{
		$additionalCosts = new \Ast\Projectmanager\Domain\Model\AdditionalCosts();

		$additionalCostsRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\AdditionalCostsRepository', array('update'), array(), '', FALSE);
		$additionalCostsRepository->expects($this->once())->method('update')->with($additionalCosts);
		$this->inject($this->subject, 'additionalCostsRepository', $additionalCostsRepository);

		$this->subject->updateAction($additionalCosts);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenAdditionalCostsFromAdditionalCostsRepository()
	{
		$additionalCosts = new \Ast\Projectmanager\Domain\Model\AdditionalCosts();

		$additionalCostsRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\AdditionalCostsRepository', array('remove'), array(), '', FALSE);
		$additionalCostsRepository->expects($this->once())->method('remove')->with($additionalCosts);
		$this->inject($this->subject, 'additionalCostsRepository', $additionalCostsRepository);

		$this->subject->deleteAction($additionalCosts);
	}
}
