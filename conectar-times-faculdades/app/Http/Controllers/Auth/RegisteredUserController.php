<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule; // Importe Rule corretamente
use Illuminate\Validation\Rules; // Importe Rules corretamente
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function createFaculdade(): View
    {
        return view('auth.register_faculdade');
    }

    public function createAvaliador(): View
    {
        return view('auth.register_avaliador');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['required', 'string', Rule::in(['faculdade', 'avaliador'])], // Validar o tipo de usuário
            'estado' => ['nullable', 'string', 'max:255'], // Validar o estado
            'cidade' => ['nullable', 'string', 'max:255'], // Validar a cidade
        ]);

        // Definir as colunas de faculdade e avaliador com base no tipo de usuário
        $faculdade = $request->user_type === 'faculdade';
        $avaliador = $request->user_type === 'avaliador';

        // Criar o usuário com os valores adequados para as colunas faculdade e avaliador
        $user = User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'faculdade' => $faculdade,
            'avaliador' => $avaliador,
            'estado' => $request->estado, // Adicionar o estado
            'cidade' => $request->cidade, // Adicionar a cidade
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}