<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeSliderController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Admin/HomeSlider/HomeSliderPage',[
            'homeslider' => HomeSlider::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/HomeSlider/HomeSliderCreate');
    }

    public function store(Request $request)
    {
       $data = $request->validate([
            'image' => 'required|image',
            'heading' => 'required|string|max:255',
            'offer' => 'nullable|string',
        ]);

         // image upload
    if ($request->hasFile('image')) {

        $image = $request->file('image');

        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image->storeAs('homeslider', $imageName, 'public');

        $data['image'] = $imageName;
    }

        HomeSlider::create([
            'image' => $data['image'],
            'heading' => $data['heading'],
            'offer' => $data['offer'] ?? null,
        ]);

        return redirect()->route('home_slider.index');
    }

    public function edit($id)
    {
        $homeslider = HomeSlider::findOrFail($id);
        return Inertia::render('Admin/HomeSlider/HomeSliderPage', [
            'homeslider' => $homeslider,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validation and updating logic here
       $data = $request->validate([
            'image' => 'nullable|image',
            'heading' => 'required|string|max:255',
            'offer' => 'nullable|string',
        ]);

          // image upload
    if ($request->hasFile('image')) {

        $image = $request->file('image');

        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image->storeAs('homeslider', $imageName, 'public');

        $data['image'] = $imageName;
    }

        $homeslider = HomeSlider::findOrFail($id);
        $homeslider->update($data);

        return redirect()->route('home_slider.index');
    }

    public function destroy($id)
    {
        // Deletion logic here
        $homeslider = HomeSlider::findOrFail($id);
        $homeslider->delete();

        return redirect()->route('home_slider.index');
    }
}
