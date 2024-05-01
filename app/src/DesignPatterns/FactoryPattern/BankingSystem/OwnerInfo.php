<?php
declare(strict_types=1);

namespace App\src\DesignPatterns\FactoryPattern\BankingSystem;

interface OwnerInfo
{
    public function getOwnerName(): string;
}
