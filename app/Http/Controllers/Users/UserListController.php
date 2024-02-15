<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserListController extends Controller
{
    public function index()
    {
        $users = User::orderBy('last_name')->paginate(20);

        return view('user.UserList', ['users' => $users]);
    }
}
