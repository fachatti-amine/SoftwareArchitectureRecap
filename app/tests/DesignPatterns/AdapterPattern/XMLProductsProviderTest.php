<?php
declare(strict_types=1);

namespace App\tests\DesignPatterns\AdapterPattern;

require_once '../../../vendor/autoload.php';

use App\DesignPatterns\AdapterPattern\Product;
use App\DesignPatterns\AdapterPattern\ProductList;
use App\DesignPatterns\AdapterPattern\XMLProductsProvider;
use Generator;
use PHPUnit\Framework\TestCase;

class XMLProductsProviderTest extends TestCase
{

    private XMLProductsProvider $xmlProductsProvider;


    protected function setUp(): void
    {
        $this->xmlProductsProvider = new XMLProductsProvider();
    }

    /**
     * @dataProvider productsProvider
     */
    public function testGetXmlProducts(ProductList $productList, string $xml): void
    {
        $xmlResult = $this->xmlProductsProvider->getXmlProducts($productList);
        self::assertSame($xml, $xmlResult);
    }


    public static function productsProvider(): Generator
    {
        yield 'A product list test' => [
            'productList' => new ProductList([
                new Product(name: 'Phone', price: 100.20, description: 'A simple Phone'),
                new Product(name: 'Tablet', price: 200.20, description: 'A simple Tablet'),
                new Product(name: 'Laptop', price: 500.20, description: 'A simple Laptop'),
            ]),
            'xml' => <<<'XML'
<?xml version="1.0" encoding="UTF-8"?>
<products>
  <product>
    <name>Phone</name>
    <description>A simple Phone</description>
    <price>100.2</price>
  </product>
  <product>
    <name>Tablet</name>
    <description>A simple Tablet</description>
    <price>200.2</price>
  </product>
  <product>
    <name>Laptop</name>
    <description>A simple Laptop</description>
    <price>500.2</price>
  </product>
</products>
XML

        ];
    }


}