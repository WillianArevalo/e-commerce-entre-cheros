<?php

namespace App\Enums;

enum ROLE: string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case CUSTOMER = 'customer';
}