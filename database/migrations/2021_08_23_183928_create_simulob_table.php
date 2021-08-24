<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulob', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->integer('ml');
            $table->timestamps();
        });
        Schema::table('simulob', function (Blueprint $table) {
            $table->foreignId('simulacao_id')->constrained('simulacao')
            ->onUpdate('restrict')
            ->onDelete('cascade');
            $table->foreignId('oleo_base_id')->constrained('oleo_base')
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
        Schema::dropIfExists('simulob');
    }
}
