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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained('sub_categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->foreignId('pickup_point_id')->constrained()->onDelete('cascade');
            $table->string('product_slider')->nullable();
            $table->string('product_slug')->unique();
            $table->integer('product_view')->default(0);
            $table->decimal('product_weight', 10, 2)->nullable(); 
            $table->string('product_name');
            $table->string('product_code')->unique();
            $table->text('product_tags')->nullable(); 
            $table->string('product_video')->nullable();
            $table->string('product_thumbnail')->nullable(); 
            $table->string('product_heading')->nullable();
            $table->text('product_description')->nullable();
            $table->string('product_warranty')->nullable();
            $table->integer('product_warranty_duration')->nullable();
            $table->text('product_warranty_conditions')->nullable();
            $table->text('product_return_policy')->nullable();
            $table->decimal('product_purchase_price', 10, 2)->nullable();
            $table->decimal('product_selling_price', 10, 2)->nullable(); 
            $table->string('warehouse')->nullable();
            $table->string('featured')->default(false);
            $table->string('today_deal')->default(false);
            $table->string('trendy_product')->default(false);
            $table->string('product_color')->default(false);
            $table->integer('product_size')->default(false);
            $table->integer('product_quantity')->default(false);
            $table->string('product_status')->default(true);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
