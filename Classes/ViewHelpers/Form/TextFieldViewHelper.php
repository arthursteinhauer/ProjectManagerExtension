<?php
namespace Ast\Projectmanager\ViewHelpers\Form;

/*                                                                        *
 * This script is backported from the TYPO3 Flow package "TYPO3.Fluid".   *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 *  of the License, or (at your option) any later version.                *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * View Helper which creates a text field (<input type="text">).
 *
 * = Examples =
 *
 * <code title="Example">
 * <f:form.textfield name="myTextBox" value="default value" />
 * </code>
 * <output>
 * <input type="text" name="myTextBox" value="default value" />
 * </output>
 *
 * @api
 */
class TextfieldViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper
{

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerTagAttribute('aria-describedby', 'string', 'Relation to other element');		

    }

    /**
     * Renders the textfield.
     *
     * @param bool $required If the field is required or not
     * @param string $type The field type, e.g. "text", "email", "url" etc.
     * @return string
     * @api
     */
    public function render($required = false, $type = 'text')
    {
        $name = $this->getName();
        $this->registerFieldNameForFormTokenGeneration($name);
        $this->setRespectSubmittedDataValue(true);

        $this->tag->addAttribute('type', $type);
        $this->tag->addAttribute('name', $name);

        $value = $this->getValueAttribute();

        if ($value !== null) {
            $this->tag->addAttribute('value', $value);
        }

        if ($required !== false) {
            $this->tag->addAttribute('required', 'required');
        }

        $this->addAdditionalIdentityPropertiesIfNeeded();
        $this->setErrorClassAttribute();

        return $this->tag->render();
    }
}

