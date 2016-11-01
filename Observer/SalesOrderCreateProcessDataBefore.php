<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MageCode\AdminOrderFix\Observer;

use Magento\Framework\Event\ObserverInterface;

class SalesOrderCreateProcessDataBefore implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $orderModel = $observer->getOrderCreateModel();
        $request = $observer->getRequestModel();

        $quote = $orderModel->getQuote();
        $grandTotal = (float)$quote->getGrandTotal();
        if (!$grandTotal) {
            $quote->setTotalsCollectedFlag(false);
            $quote->collectTotals();
            $request->getPost()->set('payment', null);
            $quote->removePayment();
        }
    }

}
