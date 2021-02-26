<?php

declare(strict_types=1);

namespace Project\ErpPrice\Test\Integration\Model;

use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
use Project\ErpPrice\Model\Config;

/**
 * Class ConfigTest
 */
class ConfigTest extends TestCase
{
    /**
     * @var ObjectManagerInterface
     */
    private $objectManger;

    /**
     * @var Config
     */
    private $config;

    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->config = $this->objectManager->get(Config::class);
    }

    public function testDefaultValue()
    {
        $this->assertFalse(
            $this->config->isEnabled(),
            'Config must be disabled by default'
        );
    }

    /**
     * @magentoConfigFixture project/erp_price/enabled 1
     */
    public function testEnbaledValue()
    {
        $this->assertTrue(
            $this->config->isEnabled(),
            'Config must be enabled'
        );
    }
}
