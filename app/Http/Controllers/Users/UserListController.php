<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserListController extends Controller
{
    public function index()
    {
        $users = User::paginate(25);

        return view('user.UserList', ['users' => $users]);
    }
}
