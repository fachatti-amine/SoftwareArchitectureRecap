<?php
declare(strict_types=1);

namespace App\DesignPatterns\FactoryPattern\BankingSystem;

enum AccountType: string
{
    case NORMAL = 'normal';
    case SAVINGS = 'savings';
}
