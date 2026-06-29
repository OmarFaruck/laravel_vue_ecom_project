<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JustArrived;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JustArrivedController extends Controller
{
    public function index(Request $request)
        {
            return Inertia::render('Admin/JustArrived/JustArrivedPage',[
                'justarriveds' => JustArrived::all(),
                  'product_color' => ProductVariant::all(),
                'product_size' => ProductVariant::all(),
            ]);
        }

        public function create()
        {
            return Inertia::render('Admin/JustArrived/JustArrivedCreate');
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

            ]);

            // image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('justarrived', $imageName, 'public');
                $data['image'] = $imageName;
            }

            JustArrived::create([
                'image' => $data['image'],
                'heading' => $data['heading'],
                'title' => $data['title'],
                'prize' => $data['prize'],
                'cancelprize' => $data['cancelprize'],
                 'product_color' => $data['product_color'],
                'product_size' => $data['product_size'],
            ]);

            return redirect()->route('just_arrived.index');
        }

            public function edit($id)
            {
                $justarrived = JustArrived::findOrFail($id);
                return Inertia::render('Admin/JustArrived/JustArrivedEdit', [
                    'justarrived' => $justarrived,
                ]);
            }

            public function update(Request $request, $id)
            {
                $justarrived = JustArrived::findOrFail($id);

                $data = $request->validate([
                    'image' => 'nullable|image',
                    'heading' => 'required|string|max:255',
                    'title' => 'required|string|max:255',
                    'prize' => 'required|string|max:255',
                    'cancelprize' => 'required|string|max:255',
                     'product_color' => 'required|string|max:255',
                    'product_size' => 'required|string|max:255',
                ]);

                // image upload
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('justarrived', $imageName, 'public');
                    $data['image'] = $imageName;
                } else {
                    unset($data['image']);
                }

                $justarrived->update($data);

                return redirect()->route('just_arrived.index');
            }

            public function destroy($id)
            {
                $justarrived = JustArrived::findOrFail($id);
                $justarrived->delete();

                return redirect()->route('just_arrived.index');
            }
}
