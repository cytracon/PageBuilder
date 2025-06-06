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

class ProductSlider extends \Cytracon\Builder\Block\ListProduct
{
    /**
     * @var \Cytracon\Core\Model\ProductList
     */
    protected $productList;

    /**
     * @var \Cytracon\Core\Helper\Data
     */
    protected $coreHelper;

    /**
     * @param \Magento\Catalog\Block\Product\Context            $context
     * @param \Magento\Framework\App\Http\Context               $httpContext
     * @param \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency
     * @param \Magento\Framework\Url\Helper\Data                $urlHelper
     * @param \Cytracon\Core\Model\ProductList            $productList
     * @param \Cytracon\Core\Helper\Data                         $coreHelper
     * @param array                                             $data
     */
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        \Magento\Framework\Url\Helper\Data $urlHelper,
        \Cytracon\Core\Model\ProductListFactory $productListFactory,
        \Cytracon\Core\Helper\Data $coreHelper,
        array $data = []
    ) {
        parent::__construct($context, $httpContext, $priceCurrency, $urlHelper, $data);
        $this->productListFactory = $productListFactory;
        $this->coreHelper         = $coreHelper;
    }

    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        parent::_construct();
        $this->addData([
            'cache_lifetime' => 86400,
            'cache_tags'     => [\Magento\Catalog\Model\Product::CACHE_TAG]
        ]);
    }

    /**
     * Get cache key informative items
     *
     * @return array
     */
    public function getCacheKeyInfo()
    {
        $cache = [
            'MGZ_BUILDERS_PRODUCT_SLIDER',
            $this->priceCurrency->getCurrencySymbol(),
            $this->_storeManager->getStore()->getId(),
            $this->_design->getDesignTheme()->getId(),
            $this->httpContext->getValue(\Magento\Customer\Model\Context::CONTEXT_GROUP),
            intval($this->getRequest()->getParam($this->getData('page_var_name'), 1)),
            $this->coreHelper->serialize($this->getRequest()->getParams()),
            $this->getData('element_id'),
            $this->getData('element_type')
        ];
        return $cache;
    }

    public function getItems()
    {
        $storeId          = \Magento\Store\Model\Store::DEFAULT_STORE_ID;
        $element          = $this->getElement();
        $order            = $element->getData('orer_by');
        $totalItems       = (int)$element->getData('max_items');
        $isShowOutOfStock = (int)$element->getData('show_out_of_stock');
        $items            = $this->productListFactory->create()->getProductCollection(
            $element->getSource(),
            $totalItems,
            $order,
            $element->getData('condition'),
            $storeId,
            $isShowOutOfStock
        );
        $count          = count($items);
        $colection      = [];
        $itemsPerColumn = (int)$element->getData('items_per_column') ? (int)$element->getData('items_per_column') : 1;
        if ($count % $itemsPerColumn == 0) {
            $column = $count / $itemsPerColumn;
        } else {
            $column = floor($count / $itemsPerColumn) + 1;
        }
        $i = $x = 0;
        foreach ($items as $_item) {
            if ($i < $column) {
                $i++;
            } else {
                $i = 1;
                $x++;
            }
            $colection[$i][$x] = $_item;
        }

        return $colection;
    }

    /**
     * @return string
     */
    public function getAdditionalStyleHtml()
    {
        $styleHtml = $this->getOwlCarouselStyles();

        $styleHtml .= $this->getLineStyles();

        return $styleHtml;
    }
}
