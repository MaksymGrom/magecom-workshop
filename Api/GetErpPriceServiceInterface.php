<?php

declare(strict_types=1);

namespace Project\ErpPrice\Api;

use Magento\Framework\Exception\NotFoundException;
use Project\ErpPrice\Api\Data\PriceResultInterface;

/**
 * Interface GetErpPriceServiceInterface
 */
interface GetErpPriceServiceInterface
{
    /**
     * @param int $id
     * @return PriceResultInterface
     * @throws NotFoundException
     */
    public function execute(int $id): PriceResultInterface;
}
