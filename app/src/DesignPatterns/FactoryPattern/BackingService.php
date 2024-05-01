<?php
declare(strict_types=1);

namespace App\src\DesignPatterns\FactoryPattern;

use App\src\DesignPatterns\FactoryPattern\BankingSystem\Account;
use App\src\DesignPatterns\FactoryPattern\BankingSystem\AccountType;
use App\src\DesignPatterns\FactoryPattern\BankingSystem\CurrencyConversion;
use App\src\DesignPatterns\FactoryPattern\BankingSystem\LockableAccount;
use App\src\DesignPatterns\FactoryPattern\BankingSystem\MoneyOperation;
use App\src\DesignPatterns\FactoryPattern\BankingSystem\NormalAccount;
use App\src\DesignPatterns\FactoryPattern\BankingSystem\OpenAccountInfoDto;
use App\src\DesignPatterns\FactoryPattern\BankingSystem\OwnerInfo;
use App\src\DesignPatterns\FactoryPattern\BankingSystem\SavingsAccount;
use App\src\DesignPatterns\FactoryPattern\BankingSystem\WithdrawMoneyAccount;

class BackingService implements MoneyOperation, OwnerInfo, CurrencyConversion , LockableAccount, WithdrawMoneyAccount
{

    public function openAccount(OpenAccountInfoDto $infoDto): Account
    {
        return match ($infoDto->type) {
            AccountType::NORMAL => new NormalAccount(
                id: $infoDto->id,
                balanceInCents: $infoDto->initialAmountInCents,
                accountOwner: $infoDto->name
            ),
            AccountType::SAVINGS => new SavingsAccount(
                id: $infoDto->id,
                balanceInCents: $infoDto->initialAmountInCents,
                accountOwner: $infoDto->name
            ),
        };
    }

    public function transferMoneyTo(Account $to, int $amountInCents): bool
    {
        // TODO: Implement transferMoneyTo() method.
        return true;
    }

    public function receiveMoneyFrom(Account $senderAccount, int $amountInCents): bool
    {
        // TODO: Implement receiveMoneyFrom() method.
        return true;
    }

    public function getBalanceInEuros(): float
    {
        // TODO: Implement getBalanceInEuros() method.
    }

    public function getBalanceInCents(): int
    {
        // TODO: Implement getBalanceInCents() method.
    }

    public function reduceMoney(int $amountInCents): true
    {
        // TODO: Implement reduceMoney() method.
    }

    public function getOwnerName(): string
    {
        // TODO: Implement getOwnerName() method.
    }

    public function lockAccount(): bool
    {
        // TODO: Implement lockAccount() method.
    }

    public function unlockAccount(): bool
    {
        // TODO: Implement unlockAccount() method.
    }

    public function isLocked(): bool
    {
        // TODO: Implement isLocked() method.
    }

    public function withdraw(int $amountInCents): bool
    {
        // TODO: Implement withdraw() method.
    }
}