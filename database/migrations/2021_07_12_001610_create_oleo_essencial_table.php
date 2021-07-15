<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOleoEssencialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oleo_essencial', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('nome', 100);
            $table->integer('ml');
            $table->decimal('valor_compra', $precision = 8, $scale = 2);
            $table->decimal('preco_gota', $precision = 8, $scale = 2);
            $table->date('validade')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oleo_essencial');
    }
}
