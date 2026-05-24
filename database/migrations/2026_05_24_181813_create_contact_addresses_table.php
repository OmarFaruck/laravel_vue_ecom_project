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
        Schema::create('contact_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('message');
            $table->string('address_1')->nullable();
            $table->string('ouremail_1')->nullable();
            $table->decimal('phone_1', 60, 2)->nullable();
            $table->string('address_2')->nullable();
            $table->string('ouremail_2')->nullable();
            $table->decimal('phone_2', 60, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_addresses');
    }
};
