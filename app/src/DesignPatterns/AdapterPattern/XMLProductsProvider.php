<?php
declare(strict_types=1);

namespace App\DesignPatterns\AdapterPattern;

require_once '../../../vendor/autoload.php';

class XMLProductsProvider
{
    private const XML_PRODUCT_LIST_TEMPLATE = <<<'XML'
<?xml version="1.0" encoding="UTF-8"?>
<products>
%PRODUCTS%
</products>
XML;
    private const XML_PRODUCT_TEMPLATE = <<<'XML'
  <product>
    <name>%NAME%</name>
    <description>%DESCRIPTION%</description>
    <price>%PRICE%</price>
  </product>
XML;

    public function getXmlProducts(ProductList $productList): string
    {
        return str_replace('%PRODUCTS%', $this->buildXMLProducts($productList), self::XML_PRODUCT_LIST_TEMPLATE);
    }

    private function buildXMLProducts(ProductList $productList): string
    {
        $products = '';

        foreach ($productList->getProducts() as $key => $product) {
            $products .= $this->buildXmlProduct($product);
            $products .=  $key < count($productList->getProducts()) - 1 ? PHP_EOL: '';
        }

        return $products;
    }

    private function buildXmlProduct(Product $product): string
    {
        $productTemplate = self::XML_PRODUCT_TEMPLATE;

        $productTemplate = str_replace('%NAME%', $product->getName(), $productTemplate);
        $productTemplate = str_replace('%DESCRIPTION%', $product->getDescription(), $productTemplate);
        $productTemplate = str_replace('%PRICE%', (string) round($product->getPrice(), 2), $productTemplate);

        return $productTemplate;
    }
}