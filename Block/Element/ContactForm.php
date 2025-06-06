<?php
/**
 * Cytracon
 *
 * This source file is subject to the Cytracon Software License, which is available at https://www.cytracon.com/license
 * Do not edit or add to this file if you wish to upgrade the to newer versions in the future.
 * If you wish to customize this module for your needs.
 * Please refer to https://www.cytracon.com for more information.
 *
 * @category  Cytracon
 * @package   Cytracon_PageBuilder
 * @copyright Copyright (C) 2019 Cytracon (https://www.cytracon.com)
 */

namespace Cytracon\PageBuilder\Block\Element;

class ContactForm extends \Cytracon\Builder\Block\Element
{
    /**
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getContactFormHtml()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $viewModel = $objectManager->get(\Magento\Contact\ViewModel\UserDataProvider::class);
        $contactForm = $this->getLayout()->createBlock(
            \Magento\Contact\Block\ContactForm::class,
            'contactForm',
            [
                'data' => [
                    'view_model' => $viewModel
                ]
            ]
        )->setTemplate('Magento_Contact::form.phtml');

        return $contactForm->toHtml();
    }

    /**
     * @return string
     */
    public function getAdditionalStyleHtml()
    {
        $styleHtml = '';
        $element   = $this->getElement();

        $styles = [];
        $styles['width'] = $this->getStyleProperty($element->getData('form_width'), true);
        $styleHtml .= $this->getStyles('.form.contact', $styles);

        if (!$element->getData('show_title')) {
            $styles = [];
            $styles['display'] = 'none';
            $styleHtml .= $this->getStyles('.form.contact .legend', $styles);
        }

        if (!$element->getData('show_description')) {
            $styles = [];
            $styles['display'] = 'none';
            $styleHtml .= $this->getStyles('.field.note', $styles);
        }

        return $styleHtml;
    }
}
