<?php

declare(strict_types=1);

namespace Project\ErpPrice\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class Config
 */
class Config
{
    const CONFIG_XML_PATH_PROJECT_ERP_PRICE_ENABLED = 'project/erp_price/enabled';

    /**
     * @var ScopeConfigInterface
     */
    private $config;

    /**
     * Config constructor.
     * @param ScopeConfigInterface $config
     */
    public function __construct(
        ScopeConfigInterface $config
    ) {
        $this->config = $config;
    }

    /**
     * @param string $scopeType
     * @param null|int|string $scopeCode
     * @return bool
     */
    public function isEnabled($scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null): bool
    {
        return (bool)$this->config->isSetFlag(
            self::CONFIG_XML_PATH_PROJECT_ERP_PRICE_ENABLED,
            $scopeType,
            $scopeCode
        );
    }
}
