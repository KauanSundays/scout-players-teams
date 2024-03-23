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
use Illuminate\Validation\Rules;
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
            'user_type' => ['required', 'string'], // Validação para o campo de tipo de usuário
        ]);

        $user = DB::transaction(function () use ($request) {
            $userType = $request->user_type;
            $isFaculdade = $userType === 'faculdade';

            $user = User::create([
                'nome' => $request->nome,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'avaliador' => !$isFaculdade, // Define avaliador como false se for faculdade, caso contrário, true
                'faculdade' => $isFaculdade, // Define faculdade como true se for faculdade, caso contrário, false
            ]);

            event(new Registered($user));

            Auth::login($user);

            return $user;
        });

        return redirect(RouteServiceProvider::HOME);
    }
}
