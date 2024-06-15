<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'position_id', 'avaliador_id', 'nota', 'observacoes', 'idade', 'estado', 'cidade'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function avaliador()
    {
        return $this->belongsTo(User::class, 'avaliador_id');
    }
}
