<?php

namespace App\src\DesignPatterns\FactoryPattern;

interface WithdrawMoneyAccount
{
    /**
     * @param int $amountInCents
     * @return bool
     * @throws TooLowBalanceForWithdraw
     */
    public function withdraw(int $amountInCents): bool;
}