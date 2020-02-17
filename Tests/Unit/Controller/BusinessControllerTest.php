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
 * Test case for class Ast\Projectmanager\Controller\BusinessController.
 *
 */
class BusinessControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Ast\Projectmanager\Controller\BusinessController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Ast\\Projectmanager\\Controller\\BusinessController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllBusinessesFromRepositoryAndAssignsThemToView()
	{

		$allBusinesses = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$businessRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\BusinessRepository', array('findAll'), array(), '', FALSE);
		$businessRepository->expects($this->once())->method('findAll')->will($this->returnValue($allBusinesses));
		$this->inject($this->subject, 'businessRepository', $businessRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('businesses', $allBusinesses);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenBusinessToView()
	{
		$business = new \Ast\Projectmanager\Domain\Model\Business();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('business', $business);

		$this->subject->showAction($business);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenBusinessToBusinessRepository()
	{
		$business = new \Ast\Projectmanager\Domain\Model\Business();

		$businessRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\BusinessRepository', array('add'), array(), '', FALSE);
		$businessRepository->expects($this->once())->method('add')->with($business);
		$this->inject($this->subject, 'businessRepository', $businessRepository);

		$this->subject->createAction($business);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenBusinessToView()
	{
		$business = new \Ast\Projectmanager\Domain\Model\Business();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('business', $business);

		$this->subject->editAction($business);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenBusinessInBusinessRepository()
	{
		$business = new \Ast\Projectmanager\Domain\Model\Business();

		$businessRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\BusinessRepository', array('update'), array(), '', FALSE);
		$businessRepository->expects($this->once())->method('update')->with($business);
		$this->inject($this->subject, 'businessRepository', $businessRepository);

		$this->subject->updateAction($business);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenBusinessFromBusinessRepository()
	{
		$business = new \Ast\Projectmanager\Domain\Model\Business();

		$businessRepository = $this->getMock('Ast\\Projectmanager\\Domain\\Repository\\BusinessRepository', array('remove'), array(), '', FALSE);
		$businessRepository->expects($this->once())->method('remove')->with($business);
		$this->inject($this->subject, 'businessRepository', $businessRepository);

		$this->subject->deleteAction($business);
	}
}
