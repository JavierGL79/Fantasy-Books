<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id)
        {
            // Lógica para mostrar el perfil del id del usuario
            $user = User::find($id);

            // Verifica si el usuario existe
            /*if (!$user) {
            // Si el usuario no existe, redirige o muestra un error
            return redirect()->route('welcome')->with('error', 'Usuario no encontrado');
            }*/

            // Muestra la vista del perfil del usuario encontrado
            return view('user.profile', ['user' => $user]);
        }

    
}
