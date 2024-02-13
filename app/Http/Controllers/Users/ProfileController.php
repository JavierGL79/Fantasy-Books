<?php

namespace App\Http\Controllers\Users;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id)
        {
            // Lógica para mostrar el perfil del id del usuario
            $user = User::find($id);

            // Verifica si el usuario existe
            if (!$user) {
            // Si el usuario no existe, redirige o muestra un error
            return redirect()->route('/')->with('error', 'Usuario no encontrado');
            }

            // Muestra la vista del perfil del usuario encontrado
            return view('profiles.profile', compact('user'));
        }

    public function edit()
        {
            // Lógica para mostrar el formulario de edición del perfil
            $user = auth()->user();
            return view('profiles.profile_edit', compact('user'));
        }

    public function update(Request $request)
        {
            $request->validate([
                'username' => 'string|unique:users,username,'. auth()->user()->ID_Usuario,
                'name' => 'string',
                'last_name' => 'string',
                'last_name_2' => 'string',
                'email' => 'email|unique:users,email,'. auth()->user()->ID_Usuario,
            ]);

            $user = auth()->user();
            
            $user->update($request->all());

            return redirect()->route('profile.show')->with('success', 'Perfil actualizado exitosamente');
        }

        public function destroy($id)
        {
            // Busca al usuario por su ID
            $user = User::find($id);
        
            // Verifica si el usuario existe
            if (!$user) {
                // Si el usuario no existe, redirige con un mensaje de error
                return redirect()->route('profile.show')->with('error', 'Usuario no encontrado');
            }
        
            // Verifica si el usuario autenticado tiene permiso para eliminar al usuario
            if (auth()->user()->es_bibliotecario) {
                // Eliminar al usuario
                $user->delete();
                
                // Redirigir con un mensaje de éxito
                return redirect()->route('welcome')->with('success', 'Usuario eliminado exitosamente');
            } else {
                // Si el usuario autenticado no tiene permiso, redirigir con un mensaje de error
                return redirect()->route('profile.show')->with('error', 'No tienes permiso para eliminar este usuario');
            }
        }
}
