<?php

declare(strict_types=1);

namespace Project\ErpPrice\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class ErpPrice
 */
class ErpPrice extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('erp_price', 'id');
    }
}
