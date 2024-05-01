<?php

namespace App\src\DesignPatterns\FactoryPattern;

final readonly class OpenAccountInfoDto
{
    public function __construct(
        public int $id,
        public string $name,
        public int $initialAmountInCents,
        public AccountType $type
    )
    {
    }
}