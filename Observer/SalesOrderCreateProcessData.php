<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MageCode\AdminOrderFix\Observer;

use Magento\Framework\Event\ObserverInterface;

class SalesOrderCreateProcessData implements ObserverInterface
{
    private $registry;

    public function __construct(
        \Magento\Framework\Registry $registry
    ) {
        $this->registry = $registry;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $this->registry->register('MageCode.AdminOrderFix', true);
    }

}
