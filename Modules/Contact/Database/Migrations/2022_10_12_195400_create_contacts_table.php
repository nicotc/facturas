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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_home')->nullable();
            $table->string('phone_mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('notes')->nullable();
            $table->enum('type', ['client', 'provider']);
            $table->timestamps();
        });

        Schema::create('contacts_clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_id');
            $table->string('type');
            $table->string('rif');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->timestamps();
        });

        Schema::create('contacts_address', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_id');
            $table->string('address');
            $table->boolean('default')->default(false);
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
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('contacts_client');
        Schema::dropIfExists('contacts_address');
    }
};
