<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrascoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frasco', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('nome', 100);
            $table->string('descricao', 255)->nullable();
            $table->decimal('preco', $precision = 8, $scale = 2);
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
        Schema::dropIfExists('frasco');
    }
}
