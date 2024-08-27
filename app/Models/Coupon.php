<?php

namespace App\Models;

use App\Models\CouponRule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    public function rule()
    {
        return $this->hasOne(CouponRule::class);
    }

    protected $fillable = [
        "code",
        "discount_type",
        "discount_value",
        "start_date",
        "end_date",
        "usage_limit",
        "type",
        "active"
    ];
}
