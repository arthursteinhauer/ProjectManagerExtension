<?php
namespace Ast\Projectmanager\Domain\Model;
/* 
 * ©2016
 * Author:
 * Arthur Steinhauer
 * a.steinhauer@website-professional.de
 */ 

class FileReference extends \TYPO3\CMS\Extbase\Domain\Model\FileReference
{
    /**
     * Uid of a sys_file
     * 
     * @var integer
     */
    protected $originalFileIdentifier;
    
    /**
     * @param \TYPO3\CMS\Core\Resource\FileReference $originalResource
     */
    public function setOriginalResource(\TYPO3\CMS\Core\Resource\FileReference $originalResource) {
        $this->originalResource = $originalResource;
        $this->originalFileIdentifier = (int)$originalResource->getOriginalFile()->getUid();
    }
}

