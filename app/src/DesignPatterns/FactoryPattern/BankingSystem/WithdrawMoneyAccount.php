<?php
declare(strict_types=1);

namespace App\DesignPatterns\FactoryPattern\BankingSystem;

interface WithdrawMoneyAccount
{
    /**
     * @param int $amountInCents
     * @return bool
     * @throws TooLowBalanceForWithdraw
     */
    public function withdraw(int $amountInCents): bool;
}