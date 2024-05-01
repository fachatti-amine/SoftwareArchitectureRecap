<?php

namespace App\src\DesignPatterns\FactoryPattern;

use Exception;

class TooLowBalanceForWithdraw extends Exception
{
    public static function create(): self
    {
        return static("Your balance is less that wished amount to be withdrawn");
    }
}