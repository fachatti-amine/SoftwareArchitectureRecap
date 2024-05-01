<?php
declare(strict_types=1);

namespace App\tests\DesignPatterns\AdapterPattern;

require_once '../../../vendor/autoload.php';

use App\DesignPatterns\AdapterPattern\JsonProductsProvider;
use App\DesignPatterns\AdapterPattern\Product;
use App\DesignPatterns\AdapterPattern\ProductList;
use Generator;
use PHPUnit\Framework\TestCase;

class JsonProductsProviderTest extends TestCase
{

    private JsonProductsProvider $jsonProductsProvider;


    protected function setUp(): void
    {
        $this->jsonProductsProvider = new JsonProductsProvider();
    }

    /**
     * @dataProvider productsProvider
     */
    public function testGetXmlProducts(ProductList $productList, string $json): void
    {
        $jsonResult = $this->jsonProductsProvider->getXmlProducts($productList);
        self::assertSame($json, $jsonResult);
    }


    public static function productsProvider(): Generator
    {
        yield 'A product list test' => [
            'productList' => new ProductList([
                new Product(name: 'Phone', price: 100.20, description: 'A simple Phone'),
                new Product(name: 'Tablet', price: 200.20, description: 'A simple Tablet'),
                new Product(name: 'Laptop', price: 500.20, description: 'A simple Laptop'),
            ]),
            'json' => <<<'JSON'
{
  "products": [
    {
      "name": "Phone",
      "description": "A simple Phone",
      "price": 100.2
    },
    {
      "name": "Tablet",
      "description": "A simple Tablet",
      "price": 200.2
    },
    {
      "name": "Laptop",
      "description": "A simple Laptop",
      "price": 500.2
    }
  ]
}
JSON

        ];
    }


}