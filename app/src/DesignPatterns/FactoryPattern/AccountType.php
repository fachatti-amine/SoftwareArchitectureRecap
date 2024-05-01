<?php
declare(strict_types=1);

namespace App\src\DesignPatterns\FactoryPattern;

enum AccountType: string
{
    case NORMAL = 'normal';
    case SAVINGS = 'savings';
}
