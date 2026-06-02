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
        Schema::create('pickup_points', function (Blueprint $table) {
            $table->id();
            $table->string('pickup_point_name')->nullable();
            $table->string('pickup_point_email')->nullable();
            $table->decimal('pickup_point_phone',60,2)->nullable();
            $table->string('pickup_point_address')->nullable();
            $table->string('pickup_point_city')->nullable();
            $table->string('pickup_point_area')->nullable();
            $table->string('pickup_point_manager_name')->nullable();
            $table->decimal('pickup_point_manager_number',60,2)->nullable();
            $table->text('pickup_point_description')->nullable();
            $table->string('pickup_point_open_time')->nullable();
            $table->string('pickup_point_close_time')->nullable();
             $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickup_points');
    }
};
