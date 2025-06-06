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

namespace Cytracon\PageBuilder\Model;

class CompositeConfigProvider extends \Cytracon\Builder\Model\CompositeConfigProvider
{
    /**
     * @return array
     */
    public function getConfig()
    {
        $config = parent::getConfig();
        if (isset($config['modals']['templates'])) {
            $config['modals']['templates']['class'] = \Cytracon\PageBuilder\Data\Modal\Templates::class;
        }
        return $config;
    }
}
