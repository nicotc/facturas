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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->string('correlative')->unique();
            $table->foreignId('services_id')->constrained('services');
            $table->foreignId('contacts_id')->constrained('contacts');
            $table->foreignId('contacts_address_id')->constrained('contacts_address');
            $table->enum('status', ['pending approval', 'approved', 'rejected'])->default('pending approval');
            $table->foreignId('users_id')->constrained('users');
            $table->softDeletes();
            $table->timestamps();

        });

        Schema::create('budget_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budgets_id')->constrained('budgets');
            $table->string('description');
            $table->integer('quantity');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('budget_breakdowns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budgets_id')->constrained('budgets');
            $table->foreignId('budget_item_id')->constrained('budget_items');
            $table->foreignId('material_id')->constrained('materials');
            $table->integer('quantity');
            $table->float('cost_unit_base', 10, 4);
            $table->float('cost_unit_proyectado', 10, 4);
            $table->float('cal_base_cantidad', 10, 4);
            $table->float('cal_proyectado_cantidad', 10, 4);
            $table->float('cal_mano_obra', 10, 4);
            $table->float('cal_total_proyectado', 10, 4);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('budget_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budgets_id')->constrained('budgets');
            $table->foreignId('budget_item_id')->constrained('budget_items');
            $table->string('description');
            $table->integer('quantity');
            $table->float('cost_unitary', 10, 4);
            $table->float('total', 10, 4);
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
        Schema::dropIfExists('budget_extras');
        Schema::dropIfExists('budget_breakdowns');
        Schema::dropIfExists('budget_items');
        Schema::dropIfExists('budgets');

    }
};