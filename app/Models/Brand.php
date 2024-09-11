<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class, "brand_id");
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        "name",
        "slug",
        "logo",
        "banner",
        "website",
        "description"
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($brand) {
            $brand->slug = Str::slug($brand->name);
        });
    }
}