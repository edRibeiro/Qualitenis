<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chaveamento extends Model
{
    //
    protected $fillable = ["numerodejogadores", "torneio_id", "classe_id", "minutosestimadosdepartida", "qtdset", "qtdgameporset", "dupla", "vagas"];

    public function torneio()
    {
        return $this->belongsTo('App\Torneio');
    }

    public function classe()
    {
        return $this->belongsTo('App\Classe');
    }

    public function inscricoes()
    {
        return $this->hasMany('App\Inscricao');
    }
    public function partidas()
    {
        return $this->hasMany('App\Partida');
    }
}
