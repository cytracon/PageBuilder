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

namespace Cytracon\PageBuilder\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Cytracon\Builder\Helper\Data
     */
    protected $builderHelper;

    /**
     * @param \Magento\Framework\App\Helper\Context      $context
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Cytracon\Builder\Helper\Data               $builderHelper
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Cytracon\Builder\Helper\Data $builderHelper
    ) {
        parent::__construct($context);
        $this->storeManager  = $storeManager;
        $this->builderHelper = $builderHelper;
    }

    /**
     * @param  string $key
     * @param  null|int $store
     * @return null|string
     */
    public function getConfig($key, $store = null)
    {
        $store     = $this->storeManager->getStore($store);
        $websiteId = $store->getWebsiteId();
        $result    = $this->scopeConfig->getValue(
            'mgzpagebuilder/' . $key,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $store
        );
        return $result;
    }

    /**
     * @return boolean
     */
    public function isEnable()
    {
        return $this->getConfig('general/enable');
    }

    /**
     * @param  string $profile
     * @return string
     */
    public function getProfileHtml($profile)
    {
        return $this->builderHelper->prepareProfileBlock(
            \Cytracon\PageBuilder\Block\Profile::class,
            $profile
        )->toHtml();
    }

    /**
     * @param  string $value
     * @return string
     */
    public function filter($value)
    {
        if ($value && is_string($value)) {
            $key  = $this->getKey();
            $prex = '/\[' . $key . '\](.*?)\[\/' . $key . '\]/si';
            preg_match_all($prex, $value, $matches, PREG_SET_ORDER);
            if ($matches) {
                $search = $replace = [];
                foreach ($matches as $row) {
                    $search[]  = $row[0];
                    $replace[] = $this->getProfileHtml($row[1]);
                }
                $value = str_replace($search, $replace, $value);
            }
        }
        return $value;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return 'mgz_pagebuilder';
    }
}
