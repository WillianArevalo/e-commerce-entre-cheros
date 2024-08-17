<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "is_active",
        "min_weight",
        "max_weight",
        "location",
        "cost",
        "time"
    ];
}
