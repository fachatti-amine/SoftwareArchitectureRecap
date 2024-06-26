<?php
declare(strict_types=1);

namespace App\DesignPatterns\FactoryPattern\BankingSystem;

interface LockableAccount
{
    public function lockAccount(): bool;

    public function unlockAccount(): bool;

    public function isLocked(): bool;
}