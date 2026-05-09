<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Admin/SubCategory/SubCategoryPage',[
           
            'subcategories' => SubCategory::with('category')->get(),
            'category' => Category::select('id', 'name')->get(),
        ]); 
    }

    public function create()
    {
        return Inertia::render('Admin/SubCategory/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);
        
        SubCategory::create([
            'name' => $data['name'],
            'category_id' => $data['category_id'],
        ]);

        return redirect()->route('subcategory.index');
    }

    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::select('id', 'name')->get();

        return Inertia::render('Admin/SubCategory/Edit', [
            'subcategory' => $subcategory,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update([
            'name' => $data['name'],
            'category_id' => $data['category_id'],
        ]);

        return redirect()->route('subcategory.index');
    }

    public function destroy($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->route('subcategory.index');
    }
}
