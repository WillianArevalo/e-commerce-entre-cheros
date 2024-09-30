<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    use HasFactory;

    protected $casts = [
        "attachments" => "array"
    ];

    public function ticket()
    {
        return $this->belongsTo(SupportTicket::class, "ticket_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        "ticket_id",
        "user_id",
        "comment",
        "attachments",
        "type_user"
    ];
}
