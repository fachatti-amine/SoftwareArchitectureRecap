<?php
declare(strict_types=1);

namespace App\src\DesignPatterns\FactoryPattern;

interface CurrencyConversion
{
    public function getBalanceInEuros(): float;
    public function getBalanceInCents(): int;
}