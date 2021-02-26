<?php

declare(strict_types=1);

namespace Project\ErpPrice\Model\Service;

use Magento\Framework\Exception\NotFoundException;
use Project\ErpPrice\Api\Data\PriceResultInterface;
use Project\ErpPrice\Api\Data\PriceResultInterfaceFactory;
use Project\ErpPrice\Api\GetErpPriceServiceInterface;
use Project\ErpPrice\Model\ResourceModel\ErpPrice\Collection;
use Project\ErpPrice\Model\ResourceModel\ErpPrice\CollectionFactory;

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
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * GetErpPriceService constructor.
     * @param PriceResultInterfaceFactory $priceFactory
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        PriceResultInterfaceFactory $priceFactory,
        CollectionFactory $collectionFactory
    ) {
        $this->priceFactory = $priceFactory;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @param int $id
     * @return PriceResultInterface
     * @throws NotFoundException
     */
    public function execute(int $id): PriceResultInterface
    {
        /** @var Collection $collection */
        $collection = $this->collectionFactory->create();

        $collection->join(
            ['c' => $collection->getTable('catalog_product_entity')],
            'main_table.sku = c.sku',
            'entity_id'
        );
        $collection->addFieldToFilter('c.entity_id', $id);
        $collection->load();

        $priceResult = null;

        foreach ($collection->getItems() as $erpPrice) {
            $priceValue = (float)$erpPrice->getPrice();
            if ($priceValue > 0) {
                $priceResult = min($priceValue, $priceResult === null ? $priceValue : $priceResult);
            }
        }

        if ($priceResult === null) {
            throw new NotFoundException(__('Price for product with id %1 not found', $id));
        }

        /** @var PriceResultInterface $price */
        $price = $this->priceFactory->create();
        $price->setPrice($priceResult);
        return $price;
    }
}
