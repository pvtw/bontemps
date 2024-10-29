<?php

declare(strict_types=1);

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case COOK = 'cook';
    case CUSTOMER = 'customer';
    case MANAGER = 'manager';
    case WAITER = 'waiter';
}
