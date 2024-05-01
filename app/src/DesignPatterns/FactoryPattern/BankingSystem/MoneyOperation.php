<?php
declare(strict_types=1);

namespace App\DesignPatterns\FactoryPattern\BankingSystem;

interface MoneyOperation
{
    public function transferMoneyTo(Account $to, int $amountInCents): true;
    public function receiveMoneyFrom(Account $senderAccount, int $amountInCents): true;
    public function reduceMoney(int $amountInCents): true;
}