<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico_Especialidade extends Model
{
  //
  protected $fillable = [
    'medico_id',
    'especialidade_id',
  ];

  protected $table = 'medico_especialidades';
}
