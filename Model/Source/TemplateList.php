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

namespace Cytracon\PageBuilder\Model\Source;

class TemplateList implements \Cytracon\Builder\Model\Source\ListInterface
{
    /**
     * @var \Cytracon\PageBuilder\Model\TemplateFactory
     */
    protected $templateFactory;

    /**
     * @var \Magento\PageBuilder\Model\ResourceModel\Template\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param \Cytracon\PageBuilder\Model\TemplateFactory                          $templateFactory
     * @param \Cytracon\PageBuilder\Model\ResourceModel\Template\CollectionFactory $collectionFactory
     */
    public function __construct(
        \Cytracon\PageBuilder\Model\TemplateFactory $templateFactory,
        \Cytracon\PageBuilder\Model\ResourceModel\Template\CollectionFactory $collectionFactory
    ) {
        $this->templateFactory   = $templateFactory;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Get Item
     *
     * @param string $id
     * @return array
     */
    public function getItem($id)
    {
        $data = [];
        $template = $this->templateFactory->create();
        $template->load($id);
        if ($template->getId()) {
            $data = [
                'label'   => $template->getName(),
                'value'   => $template->getId(),
                'profile' => $template->getProfile()
            ];
        }
        return $data;
    }

    /**
     * Get list
     *
     * @param string $q
     * @param string $field
     * @return array
     */
    public function getList($q = '', $field = '')
    {
        $list = [];
        $collection = $this->collectionFactory->create();
        $collection->setOrder('name', 'ASC');
        if ($q) {
            if (is_array($q)) {
                $collection->addFieldToFilter('template_id', ['in' => $q]);
            } elseif (is_numeric($q)) {
                $collection->addFieldToFilter('template_id', $q);
            } else {
                $collection->addFieldToFilter('name', ['like' => '%' . $q . '%']);
            }
        }
        foreach ($collection as $item) {
            $list[] = [
                'label'   => $item->getName(),
                'value'   => $item->getId(),
                'profile' => $item->getProfile()
            ];
        }
        return $list;
    }
}
