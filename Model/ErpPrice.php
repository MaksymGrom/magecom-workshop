<?php

declare(strict_types=1);

namespace Project\ErpPrice\Model;

use Magento\Framework\Model\AbstractExtensibleModel;

/**
 * Class ErpPrice
 */
class ErpPrice extends AbstractExtensibleModel
{
    public function _construct()
    {
        parent::_construct();
        $this->_init(ResourceModel\ErpPrice::class);
    }
}
