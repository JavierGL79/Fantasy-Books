<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::all());
    }
}
