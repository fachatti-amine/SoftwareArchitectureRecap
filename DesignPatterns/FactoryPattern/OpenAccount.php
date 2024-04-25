<?php

namespace DesignPatterns\FactoryPattern;

interface OpenAccount
{
    public static function openAccount(int $id, string $name, int $initialAmountInCents): static;
}