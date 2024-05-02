<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewProfile() {
        // dd(auth()->user());
        return view('User.profile');
    }
}
