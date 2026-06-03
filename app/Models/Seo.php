<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = [
        // Basic Meta
        'meta_title',
        'meta_author',
        'meta_description',
        'meta_keyword',
        'meta_tag',

        // Verification
        'google_verification',
        'bing_verification',
        'yandex_verification',
        'alexa_verification',

        // Analytics & Tracking
        'google_analytics',
        'google_tag_manager',
        'facebook_pixel',

        // Adsense
        'google_adsense',

        // Open Graph (Facebook)
        'og_title',
        'og_description',
        'og_image',

        // Twitter Card
        'twitter_title',
        'twitter_description',
        'twitter_image',

        // Canonical & Robots
        'canonical_url',
        'robots',

        // Sitemap
        'sitemap_url',

        // Schema Markup
        'schema_markup',
    ];
}
