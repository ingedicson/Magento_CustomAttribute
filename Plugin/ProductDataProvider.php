<?php

namespace Ciandt\CustomAttribute\Plugin;

use Magento\Catalog\Ui\DataProvider\Product\ProductDataProvider as Subject;
use Psr\Log\LoggerInterface;

class ProductDataProvider
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function afterGetData(Subject $subject, $result)
    {
        // Asegúrate de que el atributo personalizado esté cargado en la colección
        $collection = $subject->getCollection();
        $collection->addAttributeToSelect('custom_product_attribute');

        foreach ($result['items'] as &$item) {
            if (isset($item['entity_id'])) {
                $productId = $item['entity_id'];
                $product = $collection->getItemById($productId);
                if ($product) {
                    $customAttribute = $product->getCustomAttribute('custom_product_attribute');
                    $item['custom_product_attribute'] = $customAttribute ? $customAttribute->getValue() : '';
                    $this->logger->info('Product ID: ' . $productId . ' - Custom Attribute: ' . $item['custom_product_attribute']);
                }
            }
        }

        return $result;
    }
}
