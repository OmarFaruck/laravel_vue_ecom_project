<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Admin/Category/CategoryPage', [
            'Category' => Category::all()
        ]);
        // return view('Admin.Category.CategoryPage');
    }

    public function create()
    {
        return Inertia::render('Admin/Category/CreateCategoryPage');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'description'=>'nullable',
            'slug'=>'nullable'
        ]);

        Category::create([
            'name'=>$data['name'],
            'description'=>$data['description'],
            'slug'=>$data['slug']
        ]);

      return redirect()
        ->route('category.index')
        ->with('success', 'Category created successfully');
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return Inertia::render('Admin/Category/EditCategoryPage', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'=>'required',
            'description'=>'nullable',
            'slug'=>'nullable'
        ]);

        $category = Category::findOrFail($id);
        // $category->update([
        //     'name'=>$data['name'],
        //     'description'=>$data['description']
        // ]);
        $category->update($data);


        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        
        return redirect()
            ->route('category.index');
    }
}
