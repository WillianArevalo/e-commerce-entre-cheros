<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        "code",
        "symbol",
        "name",
        "exchange_rate",
        "is_default",
        "auto_update",
        "active"
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($currency) {
            if ($currency->is_default) {
                if (!$currency->getOriginal("is_default")) {
                    static::where("is_default", true)
                        ->where("id", "!=", $currency->id)
                        ->update(["is_default" => false]);
                }
            }
        });
    }

    public static function getDefault()
    {
        return self::where("is_default", true)->first();
    }
}