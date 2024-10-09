<?php

namespace App\Enums;

enum STATUS: int
{
    case ACTIVE = 1;
    case INACTIVE = 0;
    case PENDING = 0;
    case APPROVED = 1;
    case REJECTED = 2;
}