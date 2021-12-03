<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTAportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_t_aportes', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor', 15,2);
            $table->date('data');
            $table->longText('descricao')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('grupo_id')->constrained('tb_r_gruposaportes');
            $table->foreignId('categoria_id')->constrained('tb_t_categoriasaportes');
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
        Schema::dropIfExists('tb_t_aportes');
    }
}
