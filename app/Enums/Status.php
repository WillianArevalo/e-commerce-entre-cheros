<?php

namespace App\Enums;

interface STATUS
{
    const ACTIVE = 1;
    const INACTIVE = 0;
    const PENDING = 0;
    const APPROVED = 1;
    const REJECTED = 2;
}