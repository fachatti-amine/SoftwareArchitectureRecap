<?php

namespace App\DesignPatterns\AdapterPattern;

class JsonProductsSaver
{

    public function save(string $productsList): void
    {
        echo 'saving products: ' . $productsList . PHP_EOL;
    }
}