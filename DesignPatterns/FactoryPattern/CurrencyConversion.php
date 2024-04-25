<?php

namespace DesignPatterns\FactoryPattern;

interface CurrencyConversion
{
    public function getBalanceInEuros(): float;
    public function getBalanceInCents(): int;
}