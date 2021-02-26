<?php

declare(strict_types=1);

namespace Project\ErpPrice\Model\Service;

use Project\ErpPrice\Api\Data\PriceResultInterface;
use Project\ErpPrice\Api\Data\PriceResultInterfaceFactory;
use Project\ErpPrice\Api\GetErpPriceServiceInterface;

/**
 * Class GetErpPriceService
 */
class GetErpPriceService implements GetErpPriceServiceInterface
{
    /**
     * @var PriceResultInterfaceFactory
     */
    private $priceFactory;

    /**
     * GetErpPriceService constructor.
     * @param PriceResultInterfaceFactory $priceFactory
     */
    public function __construct(
        PriceResultInterfaceFactory $priceFactory
    ) {
        $this->priceFactory = $priceFactory;
    }

    public function execute(int $id): PriceResultInterface
    {
        /** @var PriceResultInterface $price */
        $price = $this->priceFactory->create();
        $price->setPrice(1.);
        return $price;
    }
}
