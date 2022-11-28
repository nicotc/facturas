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
        Schema::create('desglose_items', function (Blueprint $table) {
            $table->id();
            $table->string('numero_orden');
            $table->longText('descripcion')->nullable();
            $table->string('area')->nullable();
            $table->integer('cantidad')->nullable();
            $table->decimal('precio_unitario', 12, 2)->nullable();
            $table->decimal('total', 12, 2)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('desglose_items');
    }
};
