<?php
namespace Ciandt\CustomAttribute\Block\Product;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Registry;
use Ciandt\CustomAttribute\Helper\Data as CustomAttributeHelper;

class CustomAttribute extends Template
{
    protected $_registry;
    protected $_productRepository;
    protected $customAttributeHelper;

    public function __construct(
        Context $context,
        Registry $registry,
        ProductRepositoryInterface $productRepository,
        CustomAttributeHelper $customAttributeHelper,
        array $data = []
    ) {
        $this->_registry = $registry;
        $this->_productRepository = $productRepository;
        $this->customAttributeHelper = $customAttributeHelper;
        parent::__construct($context, $data);
    }

    public function getProduct()
    {
        return $this->_registry->registry('current_product');
    }

    public function getCustomAttributeHelper()
    {
        return $this->customAttributeHelper;
    }
}
