<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    protected $dates = [
        'last_login',
        'last_activity',
        'last_password_change',
    ];

    use HasFactory, Notifiable;

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorites')->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function supportTickets()
    {
        return $this->hasMany(SupportTicket::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        "name",
        "last_name",
        "profile",
        'email',
        'password',
        'role',
        "locale",
        "timezone",
        "currency",
        "last_login",
        "last_activity",
        "last_password_change",
        "last_ip_address",
        "theme",
        "google_id",
        "google_profile",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_login' => 'datetime',
            'last_activity' => 'datetime',
            'last_password_change' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
