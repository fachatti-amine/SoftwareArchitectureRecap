<?php

namespace DesignPatterns\FactoryPattern;

use Exception;

class TooLowBalanceForReduction extends Exception
{
    public static function create(): self
    {
        return static("Your balance is less that wished reduced amount");
    }
}