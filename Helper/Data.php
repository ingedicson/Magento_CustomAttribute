<?php

namespace Ciandt\CustomAttribute\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_CUSTOM_ATTRIBUTE = 'custom_attribute/settings/enabled';

    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_CUSTOM_ATTRIBUTE,
            ScopeInterface::SCOPE_STORE
        );
    }
}
