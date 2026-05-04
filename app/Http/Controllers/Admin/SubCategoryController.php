<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubCategoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/SubCategory/SubCategoryPage');
        // return view('admin.subcategory.subcategory');
    }

    public function create()
    {
        return Inertia::render('Admin/SubCategory/Create');
    }

    public function store(Request $request)
    {
        // Logic for storing subcategory
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
