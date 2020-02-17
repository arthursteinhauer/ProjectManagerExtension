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
 * Test case for class \Ast\Projectmanager\Domain\Model\Bug.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class BugTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Ast\Projectmanager\Domain\Model\Bug
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Ast\Projectmanager\Domain\Model\Bug();
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
	public function getImageReturnsInitialValueForImages()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForObjectStorageContainingImagesSetsImage()
	{
		$image = new \Ast\Projectmanager\Domain\Model\Images();
		$objectStorageHoldingExactlyOneImage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneImage->attach($image);
		$this->subject->setImage($objectStorageHoldingExactlyOneImage);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneImage,
			'image',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addImageToObjectStorageHoldingImage()
	{
		$image = new \Ast\Projectmanager\Domain\Model\Images();
		$imageObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$imageObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($image));
		$this->inject($this->subject, 'image', $imageObjectStorageMock);

		$this->subject->addImage($image);
	}

	/**
	 * @test
	 */
	public function removeImageFromObjectStorageHoldingImage()
	{
		$image = new \Ast\Projectmanager\Domain\Model\Images();
		$imageObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$imageObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($image));
		$this->inject($this->subject, 'image', $imageObjectStorageMock);

		$this->subject->removeImage($image);

	}

	/**
	 * @test
	 */
	public function getDedectedByUserReturnsInitialValueForUser()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getDedectedByUser()
		);
	}

	/**
	 * @test
	 */
	public function setDedectedByUserForUserSetsDedectedByUser()
	{
		$dedectedByUserFixture = new \Ast\Projectmanager\Domain\Model\User();
		$this->subject->setDedectedByUser($dedectedByUserFixture);

		$this->assertAttributeEquals(
			$dedectedByUserFixture,
			'dedectedByUser',
			$this->subject
		);
	}
}
