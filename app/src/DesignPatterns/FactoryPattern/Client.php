<?php

namespace App\src\DesignPatterns\FactoryPattern;

use App\src\DesignPatterns\FactoryPattern\BankingSystem\AccountType;
use App\src\DesignPatterns\FactoryPattern\BankingSystem\OpenAccountInfoDto;

class Client
{

    private static int $id = 0;

    public function __construct(
        private readonly string $name,
        private readonly BackingService $bankingSerivice,
    )
    {
        ++static::$id;
    }

    public function openAccount(int $initialAmount = 0, AccountType $type = AccountType::NORMAL): bool
    {
        $account = $this->bankingSerivice->openAccount(
            new OpenAccountInfoDto(
                id: static::$id,
                name: $this->name,
                initialAmountInCents: $initialAmount,
                type: $type,
            )
        );

        echo "thank you for choosing our bank!: ". $account->getOwnerName() . " with id : " . static::$id;

        return true;
    }

    public function getId(): int
    {
        return static::$id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}