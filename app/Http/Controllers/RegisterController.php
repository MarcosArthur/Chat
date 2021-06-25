<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Inertia\Inertia;

class RegisterController extends Controller
{

    public function index()
    {
        return Inertia::render("Register");
    }

    public function store(RegisterRequest $request)
    {
        
    }
}
