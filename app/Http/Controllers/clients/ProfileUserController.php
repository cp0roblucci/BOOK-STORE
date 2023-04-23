<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileUserController extends Controller
{
    public function getprofileUser($user_id) {
        
        return view('clients.profile_user', compact('user_id'));
    }
}
