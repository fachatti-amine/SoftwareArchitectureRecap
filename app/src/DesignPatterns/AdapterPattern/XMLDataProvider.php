<?php
declare(strict_types=1);

namespace App\DesignPatterns\AdapterPattern;
class XMLDataProvider
{
    private const XML_PRODUCT_LIST_TEMPLATE = <<<'XML'
<?xml version="1.0" encoding="UTF-8"?>
<products>
{{__PRODUCTS__}}
</products>
XML;
    private const XML_PRODUCT_TEMPLATE = <<<'XML'
  <product>
    <name>{{__NAME__}}</name>
    <description>{{__DESCRIPTION__}}</description>
    <price>{{__PRICE__}}</price>
  </product>
XML;


    public function __construct(private ProductList $productList)
    {
    }

    public function getXmlProducts(ProductList $productList): string
    {
        return str_replace('{{___PRODUCTS__}}', $this->buildXMLProducts($productList), self::XML_PRODUCT_LIST_TEMPLATE);
    }

    private function buildXMLProducts(ProductList $productList): string
    {
        $products = '';

        foreach ($this->productList as $product) {
            $products .= $this->buildXmlProduct($product) . PHP_EOL;
        }

        return $products;
    }

    private function buildXmlProduct(Product $product): string
    {
        $productTemplate = self::XML_PRODUCT_TEMPLATE;

        str_replace('{{__NAME__}}', $product->getName(), $productTemplate);
        str_replace('{{__DESCRIPTION__}}', $product->getDescription(), $productTemplate);
        str_replace('{{__PRICE__}}', (string) round($product->getPrice(), 2), $productTemplate);

        return $productTemplate;
    }
}