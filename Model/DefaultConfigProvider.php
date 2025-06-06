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

use Magento\Framework\App\ObjectManager;

class DefaultConfigProvider extends \Cytracon\Builder\Model\DefaultConfigProvider
{
    /**
     * @return array
     */
    public function getConfig()
    {
        $config = parent::getConfig();
        $helper = ObjectManager::getInstance()->get(\Cytracon\PageBuilder\Helper\Data::class);
        $config['profile'] = [
            'builder'     => \Cytracon\PageBuilder\Block\Builder::class,
            'key'         => $helper->getKey(),
            'home'        => 'https://www.cytracon.com/cytracon-page-builder.html?utm_campaign=mgzbuilder&utm_source=mgz_user&utm_medium=backend',
            'templateUrl' => 'https://www.cytracon.com/productfile/pagebuilder/templates.php'
        ];
        return $config;
    }
}
