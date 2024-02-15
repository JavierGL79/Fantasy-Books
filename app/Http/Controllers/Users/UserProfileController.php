<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('user.edition', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,'.$user->id,
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'last_name_2' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        $user->update($validatedData);

        return redirect()->route('profile.show', ['id' => $user->id])->with('success', 'Profile updated successfully.');
    }
}
