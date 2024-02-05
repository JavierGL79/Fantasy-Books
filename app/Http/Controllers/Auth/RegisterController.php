<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserCreado;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'unique:users', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'last_name_2' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                'regex:/.{4}/',
                'confirmed',
            ],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'username' =>  $data['username'],
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'last_name_2' => $data['last_name_2'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'es_bibliotecario' => isset($data['es_bibliotecario']),
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $this->authorize('create', $user);

        try {
            $newUser = User::create([
                'name' => $request->get('nombre'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);

            // Disparar el evento UserCreado
            UserCreado::dispatch($newUser);

            return redirect()->back()->with('status', 'Creado correctamente');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath())->with('success', 'Registration successfully completed');
    }
}
