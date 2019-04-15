<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicoEspecialidadesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('medico_especialidades', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('medico_id')->unsigned();
      $table->bigInteger('especialidade_id')->unsigned();

      $table->foreign('especialidade_id')->references('id')->on('especialidades')->onDelete('cascade');
      $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('medico_especialidades');
  }
}
