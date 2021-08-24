<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimuloeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simuloe', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->integer('gotas_oe');
            $table->timestamps();
        });
        Schema::table('simuloe', function (Blueprint $table) {
            $table->foreignId('simulacao_id')->constrained('simulacao')
            ->onUpdate('restrict')
            ->onDelete('cascade');
            $table->foreignId('oleo_essencial_id')->constrained('oleo_essencial')
            ->onUpdate('restrict')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simuloe');
    }
}
