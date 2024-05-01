<?php
declare(strict_types=1);

namespace App\src\DesignPatterns\FactoryPattern;

use Exception;

class TooLowBalanceForReduction extends Exception
{
    public static function create(): self
    {
        return static("Your balance is less that wished reduced amount");
    }
}