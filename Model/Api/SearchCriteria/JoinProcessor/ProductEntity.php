<?php

declare(strict_types=1);

namespace Project\ErpPrice\Model\Api\SearchCriteria\JoinProcessor;

use Magento\Framework\Api\SearchCriteria\CollectionProcessor\JoinProcessor\CustomJoinInterface;
use Magento\Framework\Data\Collection\AbstractDb;

class ProductEntity implements CustomJoinInterface
{

    public function apply(AbstractDb $collection)
    {
        // TODO: Implement apply() method.
    }
}
