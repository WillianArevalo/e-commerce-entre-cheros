<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function shipping_method()
    {
        return $this->belongsTo(ShippingMethod::class);
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    protected $casts = [
        "shipped_at" => "datetime",
        "delivered_at" => "datetime",
        "cancelled_at" => "datetime",
        "completed_at" => "datetime",
        "estimated_delivery" => "datetime",
    ];

    protected $fillable = [
        "number_order",
        "status",
        "subtotal",
        "total",
        "tax",
        "discount",
        "tracking_number",
        "shipped_at",
        "delivered_at",
        "customer_id",
        "currency_id",
        "user_id",
        "shipping_method_id",
        "payment_method_id",
        "address_id",
        "cancelled_at",
        "completed_at",
        "reason_canceled",
        "customer_notes",
        "admin_notes",
        "estimated_delivery",
        "coupon_id",
        "payment_status",
    ];
}