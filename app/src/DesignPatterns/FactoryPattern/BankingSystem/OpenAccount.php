<?php
declare(strict_types=1);

namespace App\DesignPatterns\FactoryPattern\BankingSystem;

interface OpenAccount
{
    public static function openAccount(int $id, string $name, int $initialAmountInCents): static;
}