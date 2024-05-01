<?php
declare(strict_types=1);

namespace App\DesignPatterns\FactoryPattern\BankingSystem;

use Exception;

class TooLowBalanceForReduction extends Exception
{
    public static function create(): self
    {
        return static("Your balance is less that wished reduced amount");
    }
}