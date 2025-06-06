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

namespace Cytracon\PageBuilder\Data\Element;

class PageBuilderTemplate extends \Cytracon\Builder\Data\Element\AbstractElement
{
    /**
     * @return \Cytracon\Builder\Data\Form\Element\Fieldset
     */
    public function prepareGeneralTab()
    {
        $general = parent::prepareGeneralTab();

            $general->addChildren(
                'template_id',
                'uiSelect',
                [
                    'sortOrder'       => 10,
                    'key'             => 'template_id',
                    'templateOptions' => [
                        'label'  => __('Select Template'),
                        'source' => 'pagebuilder_template',
                        'note'   => __('Choose which template load for this location.')
                    ]
                ]
            );

        return $general;
    }
}
