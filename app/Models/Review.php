<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $casts = [
        "approved_at" => "datetime",
        "rejected_at" => "datetime",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, "approved_by");
    }

    public function rejectBy()
    {
        return $this->belongsTo(User::class, "rejected_by");
    }

    protected $fillable = [
        "product_id",
        "user_id",
        "reason",
        "rating",
        "comment",
        "is_approved",
        "approved_at",
        "deleted_at",
        "rejected_at",
        "approved_by",
        "rejected_by",
    ];
}