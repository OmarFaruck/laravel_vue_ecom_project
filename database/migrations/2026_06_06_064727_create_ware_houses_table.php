<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ware_houses', function (Blueprint $table) {
            $table->id();
            $table->string('warehouse_name');
            $table->string('warehouse_code')->unique();
            $table->string('warehouse_email')->nullable();
            $table->string('warehouse_phone')->nullable();
            $table->text('warehouse_address')->nullable();
            $table->string('warehouse_city')->nullable();
            $table->string('warehouse_districk')->nullable();
            $table->string('warehouse_area')->nullable();
            $table->string('warehouse_manager_name')->nullable();
            $table->string('warehouse_manager_number')->nullable();
            $table->text('warehouse_description')->nullable();
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ware_houses');
    }
};
