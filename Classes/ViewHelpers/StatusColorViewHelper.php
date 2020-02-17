<?php
namespace Ast\Projectmanager\ViewHelpers;

class StatusColorViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * chooses the colorClass of a status
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
                  
        return $statusEntries[$status]->color;
    }       
}
