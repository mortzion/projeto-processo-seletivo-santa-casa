<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
  protected $fillable = [
    'nome',
    'crm',
    'telefone',
    'telefone_escritorio'
  ];

  public function especialidades()
  {
    return $this->belongsToMany('App\Models\Especialidade','medico_especialidades');
  }
}
