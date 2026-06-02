<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSetting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageSettingController extends Controller
{
    public function index(Request $request)
    {
        // dd(PageSetting::get());
        return Inertia::render('Admin/PageSetting/PageSettingPage',[
          'PageSetting' => PageSetting::all()
        ]);
    }

    public function create()
    {
         
    }

    public function store(Request $request)
    {
       $pageSetting = $request->validate([
            'page_name' => 'required|string|max:255',
            'page_slug' => 'required|string|max:255',
            'page_title' => 'required|string|max:255',
            'page_description' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
            'page_position' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        PageSetting::create([
            'page_name' => $pageSetting['page_name'],
            'page_slug' => $pageSetting['page_slug'],
            'page_title' => $pageSetting['page_title'],
            'page_description' => $pageSetting['page_description'],
            'meta_title' => $pageSetting['meta_title'],
            'meta_description' => $pageSetting['meta_description'],
            'meta_keywords' => $pageSetting['meta_keywords'],
            'page_position' => $pageSetting['page_position'],
            'status' => $pageSetting['status'],
        ]);

        return redirect()->route('page_setting.index');
    }

    public function edit($id)
    {
        $PageSetting = PageSetting::findOrFail($id);
         return Inertia::render('Admin/PageSetting/PageSettingPage',[
          'PageSetting' => PageSetting::all()
        ]);
    }

    public function update(Request $request, $id)
    {
         $pageSetting = $request->validate([
            'page_name' => 'required|string|max:255',
            'page_slug' => 'required|string|max:255',
            'page_title' => 'required|string|max:255',
            'page_description' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
            'page_position' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        $PageSetting = PageSetting::findOrFail($id);
        $PageSetting->update([
            'page_name' => $pageSetting['page_name'],
            'page_slug' => $pageSetting['page_slug'],
            'page_title' => $pageSetting['page_title'],
            'page_description' => $pageSetting['page_description'],
            'meta_title' => $pageSetting['meta_title'],
            'meta_description' => $pageSetting['meta_description'],
            'meta_keywords' => $pageSetting['meta_keywords'],
            'page_position' => $pageSetting['page_position'],
            'status' => $pageSetting['status'],
        ]);

        return redirect()->route('page_setting.index');
    }

    public function destroy($id)
    {
        $pageSetting = PageSetting::findOrFail($id);
        $pageSetting->delete();
        return redirect()->route('page_setting.index');
    }
}
