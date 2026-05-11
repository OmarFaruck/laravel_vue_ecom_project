<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Admin/Brand/BrandPage', [
            'brand' => Brand::all()
        ]);
    }

    public function create()
    {
        // Logic to show form for creating a new brand
        return Inertia::render('Admin/Brand/BrandCreate');
    }

    public function store(Request $request)
    {
        // Logic to validate and store a new brand
        $data = $request->validate([
            'image' => 'nullable|image',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:brands,slug',
        ]);

        if ($request->hasFile('image')) {

        $image = $request->file('image');

        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image->storeAs('brands', $imageName, 'public');

        $data['image'] = $imageName;
    }

        Brand::create([
            'image' => $data['image'] ?? null,
            'name' => $data['name'],
            'slug' => $data['slug'],
        ]);

        return redirect()->route('brand_page.index');
    }

    public function edit($id)
    {
        // Logic to show form for editing an existing brand
        $brand = Brand::findOrFail($id);
        return Inertia::render('Admin/Brand/BrandEdit', [
            'brand' => $brand,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Logic to validate and update an existing brand
        $data = $request->validate([
            'image' => 'nullable|image',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:brands,slug,' . $id,
        ]);

                  // image upload
    if ($request->hasFile('image')) {

        $image = $request->file('image');

        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image->storeAs('brands', $imageName, 'public');

        $data['image'] = $imageName;
    }

        $brand = Brand::findOrFail($id);
        $brand->update($data);
        return redirect()->route('brand_page.index');
    }

    public function destroy($id)
    {
        // Logic to delete a brand
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brand_page.index');
    }
}