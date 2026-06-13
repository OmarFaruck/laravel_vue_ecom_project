<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductVariantController extends Controller
{
    public function index(Request $request)
    {
         return Inertia::render('Admin/ProductVariant/ProductVariantPage',[
            'ProductVariant' => ProductVariant::all(),
            'Product' => Product::all(),
         ]);
    }

    public function create()
    {
         
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_color' => 'required',
            'product_size' => 'required',
            'product_quantity' => 'required|integer',
            'product_selling_price' => 'required|numeric',
            'product_image' => 'required|image',
            'product_id' => 'required|exists:products,id',
        ]);

        // Handle file upload for product_image
    if ($request->hasFile('product_image')) {

        $image = $request->file('product_image');

        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image->storeAs('product_image', $imageName, 'public');

        $data['product_image'] = $imageName;
    }

        ProductVariant::create([
            'product_color' => $data['product_color'],
            'product_size' => $data['product_size'],
            'product_quantity' => $data['product_quantity'],
            'product_selling_price' => $data['product_selling_price'],
            'product_image' => $data['product_image'],
            'product_id' => $data['product_id'],
        ]);

        return redirect()->route('product_variant_page.index');
    }

    public function edit($id)
    {
            $productVariant = ProductVariant::findOrFail($id);
            return Inertia::render('Admin/ProductVariant/ProductVariantPage', [
                'productVariant' => $productVariant,
                'Product' => Product::all(),
            ]);
         
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'product_color' => 'required',
            'product_size' => 'required',
            'product_quantity' => 'required|integer',
            'product_selling_price' => 'required|numeric',
            'product_image' => 'nullable|image',
            'product_id' => 'required|exists:products,id',
        ]);

        // Handle file upload for product_image
         if ($request->hasFile('product_image')) {

        $image = $request->file('product_image');

        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image->storeAs('product_image', $imageName, 'public');

        $data['product_image'] = $imageName;
    }

        $productVariant = ProductVariant::findOrFail($id);
        $productVariant->update([
            'product_color' => $data['product_color'],
            'product_size' => $data['product_size'],
            'product_quantity' => $data['product_quantity'],
            'product_selling_price' => $data['product_selling_price'],
            'product_image' => $data['product_image'] ?? $productVariant->product_image,
            'product_id' => $data['product_id'],
        ]);

        return redirect()->route('product_variant_page.index');
    }

    public function destroy($id)
    {
        $productVariant = ProductVariant::findOrFail($id);
        $productVariant->delete();

        return redirect()->route('product_variant_page.index');
    }
}