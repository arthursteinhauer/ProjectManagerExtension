<?php
namespace Ast\Projectmanager\ViewHelpers;

class StatusEntryViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * chooses the entry of a status
     *
     * @param int $status
	 * @param array $statusEntries
     * @return 
     * 
     * ©2016
     * Author:
     * Arthur Steinhauer
     * a.steinhauer@website-professional.de
     * 
     */
    public function render($status,$statusEntries) {
                  
        return $statusEntries[$status]->value;
    }       
}
