<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            
            // Basic Meta
            $table->string('meta_title')->nullable();
            $table->string('meta_author')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->string('meta_tag')->nullable();

            // Verification
            $table->string('google_verification')->nullable();
            $table->string('bing_verification')->nullable();
            $table->string('yandex_verification')->nullable();
            $table->string('alexa_verification')->nullable();

            // Analytics & Tracking
            $table->string('google_analytics')->nullable();
            $table->string('google_tag_manager')->nullable();
            $table->string('facebook_pixel')->nullable();

            // Adsense
            $table->string('google_adsense')->nullable();

            // Open Graph (Facebook)
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();

            // Twitter Card
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();

            // Canonical & Robots
            $table->string('canonical_url')->nullable();
            $table->string('robots')->default('index,follow');

            // Sitemap
            $table->string('sitemap_url')->nullable();

            // Schema Markup
            $table->longText('schema_markup')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seos');
    }
};
