<?php

declare(strict_types=1);

namespace Project\ErpPrice\Api\Data;

/**
 * Interface PriceInterface
 */
interface PriceResultInterface
{
    /**
     * @param float $price
     * @return $this
     */
    public function setPrice(float $price): PriceResultInterface;

    /**
     * @return float
     */
    public function getPrice(): float;
}
