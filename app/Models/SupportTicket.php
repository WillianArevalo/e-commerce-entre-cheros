<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, "assigned_to");
    }

    public function lastRepliedBy()
    {
        return $this->belongsTo(User::class, "last_replied_by");
    }

    public function comments()
    {
        return $this->hasMany(TicketComment::class, "ticket_id");
    }

    protected $casts = [
        "opened_at" => "datetime",
        "resolved_at" => "datetime",
        "closed_at" => "datetime",
        "reopened_at" => "datetime",
        "assigned_at" => "datetime",
        "last_replied_at" => "datetime",
        "due_date" => "datetime"
    ];

    protected $fillable = [
        "user_id",
        "assigned_to",
        "ticket_number",
        "subject",
        "description",
        "status",
        "priority",
        "category",
        "opened_at",
        "resolved_at",
        "closed_at",
        "reopened_at",
        "assigned_at",
        "last_replied_at",
        "last_replied_by",
        "due_date"
    ];
}