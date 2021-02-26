<?php

declare(strict_types=1);

namespace Project\ErpPrice\Test\Integration\Pricing\Price;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Pricing\Price\BasePrice;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

/**
 * Class ErpPriceTest
 */
class ErpPriceTest extends TestCase
{
    /**
     * @var ObjectManagerInterface
     */
    private $objectManger;

    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
    }

    /**
     * @magentoDataFixture dataFixture
     * @magentoConfigFixture project/erp_price/enabled 1
     */
    public function testCheckPrice()
    {
        $product = $this->getTestProduct();
        $price = $product->getPriceInfo()->getPrice(BasePrice::PRICE_CODE);
        $this->assertEquals(1, (int)$price->getValue(), 'Price must be equal 1');
    }

    /**
     * @magentoDbIsolation enabled
     * @magentoDataFixture dataFixture
     */
    public function testCheckPriceDisabled()
    {
        $product = $this->getTestProduct();
        $price = $product->getPriceInfo()->getPrice(BasePrice::PRICE_CODE);
        $this->assertEquals(10, (int)$price->getValue(), 'Price must be equal 10');
    }

    /**
     * @return Product
     */
    public function getTestProduct()
    {
        /** @var SearchCriteriaBuilder $searchCriteriaBuilder */
        $searchCriteriaBuilder = $this->objectManager->create(SearchCriteriaBuilder::class);
        $searchCriteriaBuilder->addFilter('sku', 'simple');
        /** @var ProductRepositoryInterface $productRepository */
        $productRepository = $this->objectManager->get(ProductRepositoryInterface::class);

        /** @var Product[] $products */
        $products = $productRepository->getList($searchCriteriaBuilder->create())->getItems();

        return reset($products);
    }

    public static function dataFixture()
    {
        require __DIR__ . '/../../_files/product.php';
        require __DIR__ . '/../../_files/prices.php';
    }
}
