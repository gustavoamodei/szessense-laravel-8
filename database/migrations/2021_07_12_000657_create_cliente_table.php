<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('nome', 100);
            $table->string('email', 50);
            $table->string('endereco', 255);
            $table->string('celular',15);
            $table->char('estado',2);
            $table->string('cidade',100);
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            
        });


        Schema::table('cliente', function (Blueprint $table) {
            $table->string('bairro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
