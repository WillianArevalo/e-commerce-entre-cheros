<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(Categorie::class, "categorie_id");
    }

    public function subcategories()
    {
        return $this->belongsTo(SubCategorie::class, "subcategorie_id");
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class, "brand_id");
    }

    public function taxes()
    {
        return $this->belongsToMany(Tax::class, "taxes_products");
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class, "labels_products");
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function flash_offers()
    {
        return $this->hasOne(FlashOffer::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    protected $fillable = [
        "name",
        "short_description",
        "long_description",
        "main_image",
        "price",
        "offer_price",
        "offer_active",
        "offer_start_date",
        "offer_end_date", "sku",
        "stock", "barcode", "weight",
        "dimensions",
        "categorie_id",
        "subcategorie_id",
        "brand_id",
        "status"
    ];
}
