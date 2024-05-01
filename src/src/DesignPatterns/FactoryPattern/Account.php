<?php

namespace App\src\DesignPatterns\FactoryPattern;

abstract class Account implements CurrencyConversion, OwnerInfo, OpenAccount, MoneyOperation
{
    public function __construct(
        protected int $id,
        protected float $balanceInCents,
        protected string $accountOwner
    )
    {
    }

    public static function openAccount(int $id, string $name, int $initialAmountInCents): static
    {

        $account =  new static(
            id: $id,
            balanceInCents: $initialAmountInCents,
            accountOwner: $name,
            locked: false,
        );

        echo sprintf('Creating account for %s with inicial balance %.2f\n', $name, $account->getBalanceInEuros());

        return $account;
    }

    public function transferMoneyTo(Account $accountOwner, int $amountInCents): bool
    {

        if ($this === $accountOwner) {
            // TODO implement slow clap 👏
            return false;
        }

        try {
            $this->reduceMoney($amountInCents);
        } catch (TooLowBalanceForReduction $exception) {
            // todo react on exception
            return false;
        }

        $accountOwner->receiveMoneyFrom(senderAccount: $this, amountInCents: $amountInCents);

        echo sprintf('Transferred %.2f€ to %s', $amountInCents/100, $accountOwner);

        return true;
    }

    public function receiveMoneyFrom(Account $senderAccount, int $amountInCents): true
    {
        echo sprintf('You have received %.2f€ from %s', $amountInCents/100, $senderAccount->getOwnerName());

        $this->balanceInCents += $amountInCents;

        return true;
    }

    public function reduceMoney(int $amountInCents): true
    {
        if ($this->balanceInCents < $amountInCents) {
            throw new TooLowBalanceForReduction();
        }

        $this->balanceInCents -= $amountInCents;

        return true;
    }

    public function getBalanceInCents(): int
    {
        return $this->balanceInCents;
    }

    public function getBalanceInEuros(): float
    {
        return round($this->balanceInCents / 100, 2);
    }

    public function getOwnerName(): string
    {
        return $this->accountOwner;
    }
}