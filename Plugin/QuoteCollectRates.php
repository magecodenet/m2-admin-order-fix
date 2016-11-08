<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MageCode\AdminOrderFix\Plugin;

class QuoteCollectRates
{
    private $registry;

    public function __construct(
        \Magento\Framework\Registry $registry
    ) {
        $this->registry = $registry;
    }

    public function aroundCollectTotals($subject, \Closure $proceed)
    {
        if ($this->registry->registry('MageCode.AdminOrderFix')) {
            $subject->setTotalsCollectedFlag(false);
        }
        return $proceed();
    }
}
