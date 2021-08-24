<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('simulacao');
        Schema::create('simulacao', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('nome_simulacao',50)->nullable();
            $table->float('ml_por_cento');
            $table->integer('ml_oleo_essencial');
            $table->integer('lucro');
            $table->decimal('preco_parcial', $precision = 10, $scale = 2);
            $table->decimal('margem_lucro', $precision = 10, $scale = 2);
            $table->decimal('total', $precision = 8, $scale = 2);
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
        Schema::table('simulacao', function (Blueprint $table) {
            $table->foreignId('frasco_id')->constrained('frasco');
            $table->foreignId('acessorio_id')->constrained('acessorio');
            $table->foreignId('cliente_id')->constrained('cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simulacao');
    }
}
