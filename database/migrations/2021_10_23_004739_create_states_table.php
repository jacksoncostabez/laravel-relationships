<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned(); //para relacionamento das tabelas
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade'); // cascade faz com que os estados relacionados a um pais sejam excluidos caso o pais seja excluido
            $table->string('name', 100);
            $table->string('initials', 10);
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
        Schema::dropIfExists('states');
    }
}
