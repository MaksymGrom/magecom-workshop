<?php

declare(strict_types=1);

namespace Project\ErpPrice\Pricing\Price;

use Magento\Framework\Pricing\Adjustment\CalculatorInterface;
use Magento\Framework\Pricing\Price\AbstractPrice;
use Magento\Framework\Pricing\Price\BasePriceProviderInterface;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\Pricing\SaleableInterface;
use Project\ErpPrice\Model\Config;

class ErpPrice extends AbstractPrice implements BasePriceProviderInterface
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @param SaleableInterface $saleableItem
     * @param $quantity
     * @param CalculatorInterface $calculator
     * @param PriceCurrencyInterface $priceCurrency
     * @param Config $config
     */
    public function __construct(
        SaleableInterface $saleableItem,
        $quantity,
        CalculatorInterface $calculator,
        PriceCurrencyInterface $priceCurrency,
        Config $config
    ) {
        parent::__construct($saleableItem, $quantity, $calculator, $priceCurrency);
        $this->config = $config;
    }

    /**
     * Price type identifier string
     */
    const PRICE_CODE = 'erp_price';

    /**
     * @return bool|float|void
     */
    public function getValue()
    {
        if ($this->value === null) {
            $this->value = false;
            if (!$this->config->isEnabled()) {
                return $this->value;
            }
            $this->value = 1.;
        }

        return $this->value;
    }
}
