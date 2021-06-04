<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ChatController extends Controller
{
    
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        
        return Inertia::render("Chat",[
            'users' => $users
        ]);
    }
}
