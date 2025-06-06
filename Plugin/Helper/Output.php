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

namespace Cytracon\PageBuilder\Plugin\Helper;

class Output
{
    /**
     * @var \Cytracon\PageBuilder\Helper\Data
     */
    protected $dataHelper;

    /**
     * @param \Cytracon\PageBuilder\Helper\Data $dataHelper
     */
    public function __construct(
        \Cytracon\PageBuilder\Helper\Data $dataHelper
    ) {
        $this->dataHelper = $dataHelper;
    }

    /**
     * @param $subject
     * @param $result
     * @return string
     */
    public function afterProductAttribute(
        $subject,
        $result
    ) {
        return $this->dataHelper->filter($result);
    }

    /**
     * @param $subject
     * @param $result
     * @return string
     */
    public function afterCategoryAttribute(
        $subject,
        $result
    ) {
        return $this->dataHelper->filter($result);
    }
}
