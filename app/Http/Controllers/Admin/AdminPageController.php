<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminPageController extends Controller
{
    public function index(Request $request)
    {
        
        return Inertia::render('Admin/PageCreate/PageCreatePage',[
            'pages'=>Page::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Page/Create');
    }

    public function store(Request $request)
    {
        // Validate and store the page data
            $data = $request->validate([
                'name'=>'required', 
                 'slug' => 'required',
            ]);
           Page::create([
            'name'=>$data['name'],
            'slug'=>$data['slug']
           ]);

        return redirect()->route('page_create.index');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return Inertia::render('Admin/Page/Edit', [
            'page' => $page
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'=>'required',
            'slug'=>'required',
        ]);

        $page = Page::findOrFail($id);
        $page->update([
            'name'=>$data['name'],
            'slug'=>$data['slug']
        ]);

        return redirect()->route('page_create.index');
    }

    public function destroy($id)
    {
        // Delete the page data by ID
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->route('page_create.index');
    }
}
