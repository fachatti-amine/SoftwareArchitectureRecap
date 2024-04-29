<?php

namespace src\DesignPatterns\FactoryPattern;

interface LockableAccount
{
    public function lockAccount(): bool;

    public function unlockAccount(): bool;

    public function isLocked(): bool;
}