<?php

namespace Ast\Projectmanager\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 
 *
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
 * Test case for class \Ast\Projectmanager\Domain\Model\Project.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ProjectTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Ast\Projectmanager\Domain\Model\Project
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Ast\Projectmanager\Domain\Model\Project();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName()
	{
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEstimatedTimeInHoursReturnsInitialValueForFloat()
	{
		$this->assertSame(
			0.0,
			$this->subject->getEstimatedTimeInHours()
		);
	}

	/**
	 * @test
	 */
	public function setEstimatedTimeInHoursForFloatSetsEstimatedTimeInHours()
	{
		$this->subject->setEstimatedTimeInHours(3.14159265);

		$this->assertAttributeEquals(
			3.14159265,
			'estimatedTimeInHours',
			$this->subject,
			'',
			0.000000001
		);
	}

	/**
	 * @test
	 */
	public function getEstimatedCostsReturnsInitialValueForFloat()
	{
		$this->assertSame(
			0.0,
			$this->subject->getEstimatedCosts()
		);
	}

	/**
	 * @test
	 */
	public function setEstimatedCostsForFloatSetsEstimatedCosts()
	{
		$this->subject->setEstimatedCosts(3.14159265);

		$this->assertAttributeEquals(
			3.14159265,
			'estimatedCosts',
			$this->subject,
			'',
			0.000000001
		);
	}

	/**
	 * @test
	 */
	public function getRequiredTimeInHoursReturnsInitialValueForFloat()
	{
		$this->assertSame(
			0.0,
			$this->subject->getRequiredTimeInHours()
		);
	}

	/**
	 * @test
	 */
	public function setRequiredTimeInHoursForFloatSetsRequiredTimeInHours()
	{
		$this->subject->setRequiredTimeInHours(3.14159265);

		$this->assertAttributeEquals(
			3.14159265,
			'requiredTimeInHours',
			$this->subject,
			'',
			0.000000001
		);
	}

	/**
	 * @test
	 */
	public function getRequiredCostsReturnsInitialValueForFloat()
	{
		$this->assertSame(
			0.0,
			$this->subject->getRequiredCosts()
		);
	}

	/**
	 * @test
	 */
	public function setRequiredCostsForFloatSetsRequiredCosts()
	{
		$this->subject->setRequiredCosts(3.14159265);

		$this->assertAttributeEquals(
			3.14159265,
			'requiredCosts',
			$this->subject,
			'',
			0.000000001
		);
	}

	/**
	 * @test
	 */
	public function getProjectFinishDateReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getProjectFinishDate()
		);
	}

	/**
	 * @test
	 */
	public function setProjectFinishDateForDateTimeSetsProjectFinishDate()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setProjectFinishDate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'projectFinishDate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStatusReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setStatusForIntSetsStatus()
	{	}

	/**
	 * @test
	 */
	public function getCommentReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getComment()
		);
	}

	/**
	 * @test
	 */
	public function setCommentForStringSetsComment()
	{
		$this->subject->setComment('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'comment',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFilesReturnsInitialValueForFiles()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getFiles()
		);
	}

	/**
	 * @test
	 */
	public function setFilesForObjectStorageContainingFilesSetsFiles()
	{
		$file = new \Ast\Projectmanager\Domain\Model\Files();
		$objectStorageHoldingExactlyOneFiles = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneFiles->attach($file);
		$this->subject->setFiles($objectStorageHoldingExactlyOneFiles);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneFiles,
			'files',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addFileToObjectStorageHoldingFiles()
	{
		$file = new \Ast\Projectmanager\Domain\Model\Files();
		$filesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$filesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($file));
		$this->inject($this->subject, 'files', $filesObjectStorageMock);

		$this->subject->addFile($file);
	}

	/**
	 * @test
	 */
	public function removeFileFromObjectStorageHoldingFiles()
	{
		$file = new \Ast\Projectmanager\Domain\Model\Files();
		$filesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$filesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($file));
		$this->inject($this->subject, 'files', $filesObjectStorageMock);

		$this->subject->removeFile($file);

	}

	/**
	 * @test
	 */
	public function getImagesReturnsInitialValueForImages()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getImages()
		);
	}

	/**
	 * @test
	 */
	public function setImagesForObjectStorageContainingImagesSetsImages()
	{
		$image = new \Ast\Projectmanager\Domain\Model\Images();
		$objectStorageHoldingExactlyOneImages = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneImages->attach($image);
		$this->subject->setImages($objectStorageHoldingExactlyOneImages);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneImages,
			'images',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addImageToObjectStorageHoldingImages()
	{
		$image = new \Ast\Projectmanager\Domain\Model\Images();
		$imagesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$imagesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($image));
		$this->inject($this->subject, 'images', $imagesObjectStorageMock);

		$this->subject->addImage($image);
	}

	/**
	 * @test
	 */
	public function removeImageFromObjectStorageHoldingImages()
	{
		$image = new \Ast\Projectmanager\Domain\Model\Images();
		$imagesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$imagesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($image));
		$this->inject($this->subject, 'images', $imagesObjectStorageMock);

		$this->subject->removeImage($image);

	}

	/**
	 * @test
	 */
	public function getProjectManagerReturnsInitialValueForUser()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getProjectManager()
		);
	}

	/**
	 * @test
	 */
	public function setProjectManagerForUserSetsProjectManager()
	{
		$projectManagerFixture = new \Ast\Projectmanager\Domain\Model\User();
		$this->subject->setProjectManager($projectManagerFixture);

		$this->assertAttributeEquals(
			$projectManagerFixture,
			'projectManager',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTaskReturnsInitialValueForTask()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getTask()
		);
	}

	/**
	 * @test
	 */
	public function setTaskForObjectStorageContainingTaskSetsTask()
	{
		$task = new \Ast\Projectmanager\Domain\Model\Task();
		$objectStorageHoldingExactlyOneTask = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneTask->attach($task);
		$this->subject->setTask($objectStorageHoldingExactlyOneTask);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneTask,
			'task',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addTaskToObjectStorageHoldingTask()
	{
		$task = new \Ast\Projectmanager\Domain\Model\Task();
		$taskObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$taskObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($task));
		$this->inject($this->subject, 'task', $taskObjectStorageMock);

		$this->subject->addTask($task);
	}

	/**
	 * @test
	 */
	public function removeTaskFromObjectStorageHoldingTask()
	{
		$task = new \Ast\Projectmanager\Domain\Model\Task();
		$taskObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$taskObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($task));
		$this->inject($this->subject, 'task', $taskObjectStorageMock);

		$this->subject->removeTask($task);

	}

	/**
	 * @test
	 */
	public function getBusinessReturnsInitialValueForBusiness()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getBusiness()
		);
	}

	/**
	 * @test
	 */
	public function setBusinessForBusinessSetsBusiness()
	{
		$businessFixture = new \Ast\Projectmanager\Domain\Model\Business();
		$this->subject->setBusiness($businessFixture);

		$this->assertAttributeEquals(
			$businessFixture,
			'business',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAdditionalCostsReturnsInitialValueForAdditionalCosts()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getAdditionalCosts()
		);
	}

	/**
	 * @test
	 */
	public function setAdditionalCostsForObjectStorageContainingAdditionalCostsSetsAdditionalCosts()
	{
		$additionalCost = new \Ast\Projectmanager\Domain\Model\AdditionalCosts();
		$objectStorageHoldingExactlyOneAdditionalCosts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneAdditionalCosts->attach($additionalCost);
		$this->subject->setAdditionalCosts($objectStorageHoldingExactlyOneAdditionalCosts);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneAdditionalCosts,
			'additionalCosts',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addAdditionalCostToObjectStorageHoldingAdditionalCosts()
	{
		$additionalCost = new \Ast\Projectmanager\Domain\Model\AdditionalCosts();
		$additionalCostsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$additionalCostsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($additionalCost));
		$this->inject($this->subject, 'additionalCosts', $additionalCostsObjectStorageMock);

		$this->subject->addAdditionalCost($additionalCost);
	}

	/**
	 * @test
	 */
	public function removeAdditionalCostFromObjectStorageHoldingAdditionalCosts()
	{
		$additionalCost = new \Ast\Projectmanager\Domain\Model\AdditionalCosts();
		$additionalCostsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$additionalCostsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($additionalCost));
		$this->inject($this->subject, 'additionalCosts', $additionalCostsObjectStorageMock);

		$this->subject->removeAdditionalCost($additionalCost);

	}
}
