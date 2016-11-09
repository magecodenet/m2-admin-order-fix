<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MageCode\AdminOrderFix\Model\Quote;

class AddressRateResultError extends \Magento\Quote\Model\Quote\Address\RateResult\Error
{
    public function updateRatePrice()
    {
        return false;
    }
}
