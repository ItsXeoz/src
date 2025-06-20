<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function showUserDashboard()
    {
        return view('user.dashboard_user_page');
    }
}
