<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKangaroosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::create('kangaroos', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name')->unique();
        $table->string('nickname')->nullable();
        $table->float('weight');
        $table->float('height');
        $table->string('gender');
        $table->string('color')->nullable();
        $table->enum('friendliness', ['friendly', 'not friendly'])->nullable();
        $table->date('birthday');
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
        Schema::dropIfExists('kangaroos');
    }
}
