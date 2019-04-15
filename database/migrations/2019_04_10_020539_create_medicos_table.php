<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('medicos', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('nome');
      $table->string('crm')->unique();
      $table->string('telefone');
      $table->string("telefone_escritorio")->nullable(true);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('medicos');
  }
}
