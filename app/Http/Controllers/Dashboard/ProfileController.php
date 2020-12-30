<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function account()
    {
        return view('dashboard.settings.account');
    }

    public function changePassword()
    {
        return view('dashboard.settings.change_pass');
    }

}
