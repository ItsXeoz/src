<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class userDetailController extends Controller
{
    //
    public function showUserDetail()
    {
        $users = User::with('answers')->get();
        return view('admin.user_page', compact('users'));

    }
    public function answers()
    {
        return $this->hasMany(\App\Models\Answer::class);
    }

}
