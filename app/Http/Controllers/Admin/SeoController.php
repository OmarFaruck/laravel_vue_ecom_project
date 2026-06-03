<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SeoController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Admin/Seo/SeoPage', [
            'SeoPage' => Seo::all()
        ]);
    }

    public function create() {}

    public function store(Request $request)
    {
        $data = $request->validate([
            'meta_title' => 'required|string|max:255',
            'meta_author' => 'required|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
            'meta_tag' => 'nullable|string',
            'google_verification' => 'nullable|string',
            'bing_verification' => 'nullable|string',
            'yandex_verification' => 'nullable|string',
            'alexa_verification' => 'nullable|string',
            'google_adsense' => 'nullable|string',
            'google_tag_manager' => 'nullable|string',
            'google_analytics' => 'nullable|string',
            'facebook_pixel' => 'nullable|string',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',  //og_description = Open Graph Description
            'og_image' => 'nullable|image',        //og_image = Open Graph Image
            'twitter_title' => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string',
            'twitter_image' => 'nullable|image',
            'canonical_url' => 'nullable|url',
            'robots' => 'nullable|string',
            'schema_markup' => 'nullable|string',
            'sitemap_url' => 'nullable|url',
        ]);

        // Handle og_image upload
        if ($request->hasFile('og_image')) {
            $ogImage = $request->file('og_image');
            $ogImageName = time() . '_og.' . $ogImage->getClientOriginalExtension();
            $ogImage->storeAs('seopage', $ogImageName, 'public');
            $data['og_image'] = $ogImageName;
        }

        // Handle twitter_image upload
        if ($request->hasFile('twitter_image')) {
            $twitterImage = $request->file('twitter_image');
            $twitterImageName = time() . '_twitter.' . $twitterImage->getClientOriginalExtension();
            $twitterImage->storeAs('seopage', $twitterImageName, 'public');
            $data['twitter_image'] = $twitterImageName;
        }

        Seo::create([
            'meta_title' => $data['meta_title'],
            'meta_author' => $data['meta_author'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'meta_keyword' => $data['meta_keyword'] ?? null,
            'meta_tag' => $data['meta_tag'] ?? null,
            'google_verification' => $data['google_verification'] ?? null,
            'google_analytics' => $data['google_analytics'] ?? null,
            'bing_verification' => $data['bing_verification'] ?? null,
            'yandex_verification' => $data['yandex_verification'] ?? null,
            'alexa_verification' => $data['alexa_verification'] ?? null,
            'google_tag_manager' => $data['google_tag_manager'] ?? null,
            'google_adsense' => $data['google_adsense'] ?? null,
            'og_title' => $data['og_title'] ?? null,
            'og_description' => $data['og_description'] ?? null,
            'og_image' => $data['og_image'] ?? null,
            'facebook_pixel' => $data['facebook_pixel'] ?? null,
            'twitter_title' => $data['twitter_title'] ?? null,
            'twitter_description' => $data['twitter_description'] ?? null,
            'twitter_image' => $data['twitter_image'] ?? null,
            'canonical_url' => $data['canonical_url'] ?? null,
            'robots' => $data['robots'] ?? null,
            'schema_markup' => $data['schema_markup'] ?? null,
            'sitemap_url' => $data['sitemap_url'] ?? null,
        ]);

        return redirect()->route('seo_page.index');
    }

    public function edit($id)
    {
        $SeoPage = Seo::findOrFail($id);
        return Inertia::render('Admin/Seo/SeoPage', [
            'SeoPage' => $SeoPage,
        ]);
    }


    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'meta_title' => 'required|string|max:255',
            'meta_author' => 'required|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
            'meta_tag' => 'nullable|string',
            'google_verification' => 'nullable|string',
            'bing_verification' => 'nullable|string',
            'yandex_verification' => 'nullable|string',
            'alexa_verification' => 'nullable|string',
            'google_adsense' => 'nullable|string',
            'google_tag_manager' => 'nullable|string',
            'google_analytics' => 'nullable|string',
            'facebook_pixel' => 'nullable|string',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',  //og_description = Open Graph Description
            'og_image' => 'nullable|image',        //og_image = Open Graph Image
            'twitter_title' => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string',
            'twitter_image' => 'nullable|image',
            'canonical_url' => 'nullable|url',
            'robots' => 'nullable|string',
            'schema_markup' => 'nullable|string',
            'sitemap_url' => 'nullable|url',
        ]);


        $SeoPage = Seo::findOrFail($id);

        // Handle og_image upload
        if ($request->hasFile('og_image')) {
            $ogImage = $request->file('og_image');
            $ogImageName = time() . '_og.' . $ogImage->getClientOriginalExtension();
            $ogImage->storeAs('seopage', $ogImageName, 'public');
            $validated['og_image'] = $ogImageName;
        }

        // Handle twitter_image upload
        if ($request->hasFile('twitter_image')) {
            $twitterImage = $request->file('twitter_image');
            $twitterImageName = time() . '_twitter.' . $twitterImage->getClientOriginalExtension();
            $twitterImage->storeAs('seopage', $twitterImageName, 'public');
            $validated['twitter_image'] = $twitterImageName;
        }

        $SeoPage->update([
            'meta_title' => $validated['meta_title'],
            'meta_author' => $validated['meta_author'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'meta_keyword' => $validated['meta_keyword'] ?? null,
            'meta_tag' => $validated['meta_tag'] ?? null,
            'google_verification' => $validated['google_verification'] ?? null,
            'google_analytics' => $validated['google_analytics'] ?? null,
            'bing_verification' => $validated['bing_verification'] ?? null,
            'yandex_verification' => $validated['yandex_verification'] ?? null,
            'alexa_verification' => $validated['alexa_verification'] ?? null,
            'google_tag_manager' => $validated['google_tag_manager'] ?? null,
            'google_adsense' => $validated['google_adsense'] ?? null,
            'og_title' => $validated['og_title'] ?? null,
            'og_description' => $validated['og_description'] ?? null,
            'og_image' => $validated['og_image'] ?? null,
            'facebook_pixel' => $validated['facebook_pixel'] ?? null,
            'twitter_title' => $validated['twitter_title'] ?? null,
            'twitter_description' => $validated['twitter_description'] ?? null,
            'twitter_image' => $validated['twitter_image'] ?? null,
            'canonical_url' => $validated['canonical_url'] ?? null,
            'robots' => $validated['robots'] ?? null,
            'schema_markup' => $validated['schema_markup'] ?? null,
            'sitemap_url' => $validated['sitemap_url'] ?? null,

        ]);

        return redirect()->route('seo_page.index');
    }

    public function destroy($id)
    {
        $SeoPage = Seo::findOrFail($id);
        $SeoPage->delete();
        return redirect()->route('seo_page.index');
    }
}
