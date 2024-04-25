<?php

namespace DesignPatterns\FactoryPattern;

enum AccountType: string
{
    case NORMAL = 'normal';
    case SAVINGS = 'savings';
}
