<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoansController extends Controller
{
    public function show()
    {
        return view('profiles.user_Loans');
    }
}
