<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductVariantController extends Controller
{
    public function index()
    {
         return Inertia::render('Admin/ProductVariant/ProductVariantPage',[
            'ProductVariantPage' => ProductVariant::all()
         ]);
    }

    public function create()
    {
         
    }

    public function store(Request $request)
    {
         
    }

    public function edit($id)
    {
         
    }

    public function update(Request $request, $id)
    {
         
    }

    public function destroy($id)
    {
        
    }
}
