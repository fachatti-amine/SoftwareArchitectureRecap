<?php
declare(strict_types=1);

namespace App\DesignPatterns\AdapterPattern;

require_once '../../../vendor/autoload.php';

class JsonProductsProvider
{
    private const XML_PRODUCT_LIST_TEMPLATE = <<<'JSON'
{
  "products": [
    %PRODUCTS%
  ]
}
JSON;
    private const XML_PRODUCT_TEMPLATE = <<<'JSON'
  {
      "name": "%NAME%",
      "description": "%DESCRIPTION%",
      "price": %PRICE%
    }
JSON;

    public function getXmlProducts(ProductList $productList): string
    {
        return str_replace('%PRODUCTS%', $this->buildXMLProducts($productList), self::XML_PRODUCT_LIST_TEMPLATE);
    }

    private function buildXMLProducts(ProductList $productList): string
    {
        $products = '';

        foreach ($productList->getProducts() as $key => $product) {
            $products .= $this->buildXmlProduct($product);
            $products .=  $key < count($productList->getProducts()) - 1 ? ',' . PHP_EOL: '';
        }

        return $products;
    }

    private function buildXmlProduct(Product $product): string
    {
        $productTemplate = self::XML_PRODUCT_TEMPLATE;
        $productTemplate = str_replace('%NAME%', $product->getName(), $productTemplate);
        $productTemplate = str_replace('%DESCRIPTION%', $product->getDescription(), $productTemplate);

        return str_replace('%PRICE%', (string) round($product->getPrice(), 2), $productTemplate);
    }
}