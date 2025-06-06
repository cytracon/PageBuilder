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

class Builder extends \Cytracon\Builder\Block\Builder
{
    /**
     * Path to template file in theme.
     *
     * @var string
     */
    protected $_template = 'Cytracon_PageBuilder::builder.phtml';

    /**
     * @var \Cytracon\PageBuilder\Helper\Data
     */
    protected $dataHelper;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Cytracon\Builder\Model\CompositeConfigProvider   $configProvider
     * @param \Cytracon\PageBuilder\Helper\Data                 $dataHelper
     * @param array                                            $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Cytracon\PageBuilder\Model\CompositeConfigProvider $configProvider,
        \Cytracon\PageBuilder\Helper\Data $dataHelper,
        array $data = []
    ) {
        parent::__construct($context, $configProvider, $data);
        $this->dataHelper = $dataHelper;
    }
}
