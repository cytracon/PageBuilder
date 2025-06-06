<?php declare(strict_types=1);

namespace Cytracon\PageBuilder\Plugin;

use Magento\Bundle\Model\Option;
use Magento\Catalog\Model\Product;

class AddSkuToBundleOptionPlugin
{
    /**
     * This plugin adds the SKU to the bundle product dropdown option
     *
     * @param Option $subject
     * @param Product $selection
     * @return array
     */
    public function beforeAddSelection(
        Option $subject,
        Product $selection
    ): array {
        // Ensure the option type is 'select'
        if ($subject->getType() !== 'select') {
            return [$selection];
        }

        // Append SKU to product name
        // $selection->setName($selection->getName() . ' Art.' . $selection->getSku());
        $selection->setName($selection->getName());
       return [$selection];
    }
}
// <!-- Cytracon -->