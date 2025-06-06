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

class Instagram extends \Cytracon\Builder\Block\Element
{
    /**
     * @var \Cytracon\Core\Helper\Data
     */
    protected $coreHelper;

    /**
     * @var \Cytracon\PageBuilder\Helper\Data
     */
    protected $dataHelper;

    /**
     * Instagram constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Cytracon\Core\Helper\Data $coreHelper
     * @param \Cytracon\PageBuilder\Helper\Data $dataHelper
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Cytracon\Core\Helper\Data $coreHelper,
        \Cytracon\PageBuilder\Helper\Data $dataHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->coreHelper   =   $coreHelper;
        $this->dataHelper   =   $dataHelper;
    }

    /**
     * Get Instagram element title
     * @return string
     */
    public function getElementTitle()
    {
        $getTitle = $this->getElement()->getTitle();
        $title = $this->coreHelper->filter($getTitle);
        return $title;
    }

    /**
     * @return string
     */
    public function getTitleTag()
    {
        if ($titleTag = $this->getElement()->getTitleTag()) {
            return $titleTag;
        } else {
            return 'h2';
        }
    }

    /**
     * Get Instagram element description
     * @return string
     */
    public function getElementDescription()
    {
        $getDescription = $this->getElement()->getDescription();
        $description = $this->coreHelper->filter($getDescription);
        return $description;
    }

    /**
     * @return string|null
     */
    public function getInstagramToken()
    {
        $token = $this->dataHelper->getConfig('instagram/user_token');
        return $token;
    }

    /**
     * @param $username
     * @return string
     */
    public function getFollowLink($username)
    {
        return 'https://www.instagram.com/'.$username;
    }

    /**
     * @return string
     */
    public function getDataSize()
    {
        $element   = $this->getElement();
        $photoSize = $element->getData('photo_size');
        $size      = '1000x1000';
        switch ($photoSize) {
            case 'thumbnail':
                $size = '150x150';
                break;

            case 'small':
                $size = '320x320';
                break;

            case 'large':
                $size = '640x640';
                break;
        }
        return $size;
    }

    /**
     * @return string
     */
    public function getAdditionalStyleHtml()
    {
        $styleHtml = '';
        $element   = $this->getElement();

        if ($gap = (int)$element->getData('gap')) {
            $styles = [];
            $styles['padding'] = $this->getStyleProperty($gap / 2);
            $styleHtml .= $this->getStyles([
                '.mgz-grid-item'
            ], $styles);
        }

        $styles = [];
        $styles['font-size'] = $this->getStyleProperty($element->getData('text_size'));
        $styles['color'] = $this->getStyleColor($element->getData('text_color'));
        $styleHtml .= $this->getStyles(['.item-likes', '.item-comments'], $styles);

        $styles = [];
        $styles['background'] = $this->getStyleColor($element->getData('overlay_color'));
        $styleHtml .= $this->getStyles('.item-metadata', $styles);

        $styleHtml .= $this->getLineStyles();

        return $styleHtml;
    }
}
