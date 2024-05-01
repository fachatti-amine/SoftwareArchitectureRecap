<?php

namespace App\src\DesignPatterns\FactoryPattern;

class SavingsAccount extends Account implements LockableAccount
{
    public function __construct(int $id, float $balanceInCents, string $accountOwner, private bool $locked = false)
    {
        parent::__construct($id, $balanceInCents, $accountOwner);
    }

    public function lockAccount(): bool
    {
        $this->locked = true;

        return true;
    }

    public function unlockAccount(): bool
    {
        $this->locked = false;

        return true;
    }

    public function isLocked(): bool
    {
        return $this->locked;
    }
}