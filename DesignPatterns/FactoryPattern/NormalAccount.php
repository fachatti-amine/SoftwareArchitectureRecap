<?php

namespace DesignPatterns\FactoryPattern;


class NormalAccount extends Account implements WithdrawMoneyAccount
{
    public function withdraw(int $amountInCents): bool
    {
        if ($this->balanceInCents < $amountInCents) {
            throw TooLowBalanceForWithdraw::create();
        }

        $this->balanceInCents = $this->balanceInCents - $amountInCents;

        $this->drawMoneyFromMachine();
    }

    private function drawMoneyFromMachine(): true
    {
        echo 'Please take the money from the ATM!';

        return true;
    }
}