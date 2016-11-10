<?php

namespace MageCode\AdminOrderFix\Model\Quote;

class QuoteRepository extends \Magento\Quote\Model\QuoteRepository
{
    protected function loadQuote($loadMethod, $loadField, $identifier, array $sharedStoreIds = [])
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        if (empty($sharedStoreIds)) {
            $sesionQuote = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Backend\Model\Session\Quote');
            $sharedStoreIds = [$sesionQuote->getQuote()->getStoreId()];
        }
        return parent::loadQuote($loadMethod, $loadField, $identifier, $sharedStoreIds);
    }
}
