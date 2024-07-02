<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class, "taxes_products");
    }

    protected $fillable = [
        'name',
        'rate',
    ];
}
