<?php

declare(strict_types=1);

namespace Project\ErpPrice\Model\Data;

use Magento\Framework\Exception\LocalizedException;
use Project\ErpPrice\Api\Data\PriceResultInterface;

class PriceResult implements PriceResultInterface
{
    /**
     * @var float
     */
    private $price;

    /**
     * @param float $price
     * @return PriceResultInterface
     */
    public function setPrice(float $price): PriceResultInterface
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     * @throws LocalizedException
     */
    public function getPrice(): float
    {
        if (!is_float($this->price)) {
            throw new LocalizedException(__('Price must be defined before use'));
        }

        return $this->price;
    }
}
