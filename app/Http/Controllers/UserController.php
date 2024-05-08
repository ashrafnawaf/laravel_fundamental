<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($id)
    {
        $user = User::with('profile.toko')->find($id);
        
        return view('admin.profile', [
            'user' => $user
        ]);
    }
}