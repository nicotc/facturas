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
        Schema::create('desglose_extras', function (Blueprint $table) {
            $table->id();
            $table->string('numero_orden');
            $table->foreignId('desglose_items')->constrained();
            $table->integer('cantidad');
            $table->string('descripcion');
            $table->decimal('precio_base', 12, 2);
            $table->decimal('precio_total', 12, 2);
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
        Schema::dropIfExists('desglose_extras');
    }
};