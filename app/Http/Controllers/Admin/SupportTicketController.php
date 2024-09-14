<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.support_tickets.index', ["users" => $users]);
    }

    public function show(string $id)
    {
        return view('admin.support_tickets.show');
    }
}