<?php
declare(strict_types=1);

namespace App\DesignPatterns\FactoryPattern\BankingSystem;

interface CurrencyConversion
{
    public function getBalanceInEuros(): float;
    public function getBalanceInCents(): int;
}