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
        Schema::create('abonados', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('numero_orden');
            $table->longText('descripcion')->nullable();
            $table->decimal('abonado', 12, 2);
            $table->string('forma_pago');
            $table->string('numero_referencia');
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
        Schema::dropIfExists('abonados');
    }
};
