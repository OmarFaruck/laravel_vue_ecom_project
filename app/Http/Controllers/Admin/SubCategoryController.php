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
        // return Inertia::render('Admin/SubCategory/Edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic for updating subcategory
    }

    public function destroy($id)
    {
        // Logic for deleting subcategory
    }
}
