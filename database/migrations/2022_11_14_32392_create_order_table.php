<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderrs', function (Blueprint $table) {
            $table->id();
            $table->integer('totalAmount');
            $table->unsignedBigInteger('number_table');
            $table->integer('minutes')->nullable();
            $table->foreign('number_table')->references('id')->on('tables');
            $table->timestamps();
            $table->enum('status', ['PENDIENTE', 'PREPARANDO PEDIDO', 'PEDIDO LISTO']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderrs');
    }
};
