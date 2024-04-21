<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Exibe o formulário para criar uma nova posição.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Armazena uma nova posição no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Position::create($request->only('nome'));

        return redirect()->route('dashboard')->with('success', 'Posição criada com sucesso!');
    }

    /**
     * Atualiza a posição de um usuário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePosition(Request $request)
    {
        $user = auth()->user();
        if ($user->faculdade && is_null($user->position_id)) {
            $user->position_id = $request->position;
            $user->save();
            return redirect()->route('dashboard')->with('success', 'Necessidade atualizada com sucesso!');
        }
        return redirect()->route('dashboard')->with('error', 'Erro ao atualizar a necessidade.');
    }

    public function dashboard()
    {
        $positions = Position::all();
        return view('dashboard', compact('positions'));
    }
}
