<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    public function create()
    {
        $positions = Position::all();
        return view('players.create', compact('positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id',
            'nota' => 'required|integer|min:0|max:10',
            'observacoes' => 'nullable|string',
            'idade' => 'required|integer|min:0',
            'estado' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
        ]);

        Player::create([
            'nome' => $request->nome,
            'position_id' => $request->position_id,
            'avaliador_id' => Auth::id(),
            'nota' => $request->nota,
            'observacoes' => $request->observacoes,
            'idade' => $request->idade,
            'estado' => $request->estado,
            'cidade' => $request->cidade,
        ]);

        return redirect()->route('dashboard')->with('success', 'Jogador cadastrado com sucesso!');
    }

    public function index()
    {
        $players = Player::where('avaliador_id', Auth::id())->get();
        return view('players.index', compact('players'));
    }
}
