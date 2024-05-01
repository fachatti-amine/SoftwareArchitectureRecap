<?php
declare(strict_types=1);

namespace App\src\DesignPatterns\FactoryPattern;

interface MoneyOperation
{
    public function transferMoneyTo(Account $accountOwner, int $amountInCents): true;
    public function receiveMoneyFrom(Account $senderAccount, int $amountInCents): true;
    public function reduceMoney(int $amountInCents): true;
}