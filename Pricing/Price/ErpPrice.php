<?php

declare(strict_types=1);

namespace Project\ErpPrice\Pricing\Price;

use Magento\Framework\Pricing\Price\AbstractPrice;
use Magento\Framework\Pricing\Price\BasePriceProviderInterface;

class ErpPrice extends AbstractPrice implements BasePriceProviderInterface
{
    /**
     * Price type identifier string
     */
    const PRICE_CODE = 'erp_price';

    /**
     * @return bool|float|void
     */
    public function getValue()
    {
        return 1.;
    }
}
