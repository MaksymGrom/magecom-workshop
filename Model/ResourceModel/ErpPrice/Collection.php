<?php

declare(strict_types=1);

namespace Project\ErpPrice\Model\ResourceModel\ErpPrice;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Project\ErpPrice\Model\ErpPrice;
use Project\ErpPrice\Model\ResourceModel\ErpPrice as ResourceModel;

/**
 * Class Collection
 */
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(ErpPrice::class, ResourceModel::class);
    }
}
