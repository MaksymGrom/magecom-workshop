<?php

use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Project\ErpPrice\Model\ErpPrice;

/** @var ObjectManagerInterface $objectManager */
$objectManager = Bootstrap::getObjectManager();

/** @var ErpPrice $erpPrice */
$erpPrice = $objectManager->create(ErpPrice::class);

$erpPrice->setPrice(1.);
$erpPrice->setSku('simple');

$resourceModel = $objectManager->create(\Project\ErpPrice\Model\ResourceModel\ErpPrice::class);
$resourceModel->save($erpPrice);
