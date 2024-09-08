<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_id",
        "address_line_1",
        "address_line_2",
        "city",
        "state",
        "country",
        "zip_code",
        "type",
        "slug",
        "default",
        "active"
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($address) {
            $address->slug = Str::slug($address->type);
        });
    }
}