<?php

namespace src\DesignPatterns\FactoryPattern;

interface CurrencyConversion
{
    public function getBalanceInEuros(): float;
    public function getBalanceInCents(): int;
}