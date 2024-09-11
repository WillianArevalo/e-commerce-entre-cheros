<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategorie extends Model
{
    use HasFactory;

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, "categorie_id");
    }

    public function products()
    {
        return $this->hasMany(Product::class, "subcategorie_id");
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subcategories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'categorie_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($subcategorie) {
            $subcategorie->slug = Str::slug($subcategorie->name);
        });
    }
}