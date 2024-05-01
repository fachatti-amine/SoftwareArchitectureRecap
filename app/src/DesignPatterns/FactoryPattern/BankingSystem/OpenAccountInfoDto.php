<?php
declare(strict_types=1);

namespace App\DesignPatterns\FactoryPattern\BankingSystem;
require_once '../../../../vendor/autoload.php';

final readonly class OpenAccountInfoDto
{
    public function __construct(
        public int $id,
        public string $name,
        public int $initialAmountInCents,
        public AccountType $type
    )
    {
    }
}