<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use App\Models\TrendyProduct;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TrendyProductController extends Controller
{
    public function index(Request $request)
        {
             
            return Inertia::render('Admin/TrendyProduct/TrendyProductPage',[
                'trendyproducts' => TrendyProduct::all(),
                'product_color' => ProductVariant::all(),
                'product_size' => ProductVariant::all(),

            ]);
        }

        public function create()
        {
            return Inertia::render('Admin/TrendyProduct/TrendyProductCreate');
        }

        public function store(Request $request)
        { 
            
           
            $data = $request->validate([
                'image' => 'required|image',
                'heading' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'prize' => 'required|string|max:255',
                'cancelprize' => 'required|string|max:255',
                'product_color' => 'required|string|max:255',
                'product_size' => 'required|string|max:255',
 
                'description' => 'required|string',
 
                'description' => 'required|string|max:255', 
                'slug' => 'required|string|max:255',

            ]);

            

            // image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('trendyproducts', $imageName, 'public');
                $data['image'] = $imageName;
            } 
            TrendyProduct::create([
                'image' => $data['image'],
                'heading' => $data['heading'],
                'title' => $data['title'],
                'prize' => $data['prize'],
                'cancelprize' => $data['cancelprize'],
                'product_color' => $data['product_color'],
                'product_size' => $data['product_size'],
                'description' => $data['description'],
                'slug' => $data['slug'],
            ]);

             
            return redirect()->route('trendy_products.index');
        }

            public function edit($id)
            {
                $trendyproduct = TrendyProduct::findOrFail($id);
                return Inertia::render('Admin/TrendyProduct/TrendyProductEdit', [
                    'trendyproduct' => $trendyproduct,
                ]);
            }

            public function update(Request $request, $id)
            {
                $trendyproduct = TrendyProduct::findOrFail($id);

                $data = $request->validate([
                    'image' => 'nullable|image',
                    'heading' => 'required|string|max:255',
                    'title' => 'required|string|max:255',
                    'prize' => 'required|string|max:255',
                    'cancelprize' => 'required|string|max:255',
                    'product_color' => 'required|string|max:255',
                    'product_size' => 'required|string|max:255',
 
                    'description' => 'required|string',
 
                    'description' => 'required|string|max:255', 
                    'slug' => 'required|string|max:255',
                ]);

                // image upload
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('trendyproducts', $imageName, 'public');
                    $data['image'] = $imageName;
                } else {
                    unset($data['image']);
                }

                $trendyproduct->update([
                     'heading' => $data['heading'],
                     'title' => $data['title'],
                     'prize' => $data['prize'],
                     'cancelprize' => $data['cancelprize'],
                     'product_color' => $data['product_color'],
                     'product_size' => $data['product_size'],
                     'description' => $data['description'],
                     'slug' => $data['slug'],
                ]);

                return redirect()->route('trendy_products.index');
            }

            public function destroy($id)
            {
                $trendyproduct = TrendyProduct::findOrFail($id);
                $trendyproduct->delete();

                return redirect()->route('trendy_products.index');
            }
}
