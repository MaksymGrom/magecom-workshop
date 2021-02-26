<?php

declare(strict_types=1);

namespace Project\ErpPrice\Pricing\Price;

use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\Pricing\Adjustment\CalculatorInterface;
use Magento\Framework\Pricing\Price\AbstractPrice;
use Magento\Framework\Pricing\Price\BasePriceProviderInterface;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\Pricing\SaleableInterface;
use Project\ErpPrice\Api\GetErpPriceServiceInterface;
use Project\ErpPrice\Model\Config;

class ErpPrice extends AbstractPrice implements BasePriceProviderInterface
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var GetErpPriceServiceInterface
     */
    private $getErpPriceService;

    /**
     * @param SaleableInterface $saleableItem
     * @param $quantity
     * @param CalculatorInterface $calculator
     * @param PriceCurrencyInterface $priceCurrency
     * @param Config $config
     * @param GetErpPriceServiceInterface $getErpPriceService
     */
    public function __construct(
        SaleableInterface $saleableItem,
        $quantity,
        CalculatorInterface $calculator,
        PriceCurrencyInterface $priceCurrency,
        Config $config,
        GetErpPriceServiceInterface $getErpPriceService
    ) {
        parent::__construct($saleableItem, $quantity, $calculator, $priceCurrency);
        $this->config = $config;
        $this->getErpPriceService = $getErpPriceService;
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

            try {
                $price = $this->getErpPriceService->execute((int)$this->product->getId());
                $this->value = $price->getPrice();
            } catch (NotFoundException $exception) {
                $this->value = false;
            }
        }

        return $this->value;
    }
}
