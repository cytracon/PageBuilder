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

namespace Cytracon\PageBuilder\Block;

class Profile extends \Cytracon\Builder\Block\Profile
{
    /**
     * @var \Cytracon\PageBuilder\Helper\Data
     */
    protected $dataHelper;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Cytracon\Builder\Helper\Data                     $builderHelper
     * @param \Cytracon\PageBuilder\Helper\Data                 $dataHelper
     * @param array                                            $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Cytracon\Builder\Helper\Data $builderHelper,
        \Cytracon\PageBuilder\Helper\Data $dataHelper,
        array $data = []
    ) {
        parent::__construct($context, $builderHelper, $data);
        $this->dataHelper = $dataHelper;
    }

    /**
     * Override this method in descendants to produce html
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->dataHelper->isEnable()) {
            return;
        }
        return parent::_toHtml();
    }
}
