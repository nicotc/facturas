<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gastos_id')->constrained();
            $table->date('fecha');
            $table->longText('descripcion')->nullable();
            $table->decimal('abono', 12, 2)->nullable();
            $table->longText('nota')->nullable();
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
        Schema::dropIfExists('gastos_detalles');
    }
};
