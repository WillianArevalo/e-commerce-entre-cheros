<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponRule extends Model
{
    use HasFactory;

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    protected $table = "coupon_rule";

    protected $fillable = [
        "coupon_id",
        "predefined_rule",
        "parameters",
    ];
}
