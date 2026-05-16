<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CollectionController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Admin/Collection/CollectionPage',[
            'collections' => Collection::all(),
        ]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image',
            'heading' => 'required|string|max:255',
            'title' => 'nullable|string',
        ]);

         // image upload
    if ($request->hasFile('image')) {

        $image = $request->file('image');

        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image->storeAs('collection', $imageName, 'public');

        $data['image'] = $imageName;
    }

        Collection::create([
            'image' => $data['image'],
            'heading' => $data['heading'],
            'title' => $data['title'] ?? null,
        ]);

        

        return redirect()->route('collection.index');
    }

    public function edit($id)
    {
            $collection = Collection::findOrFail($id);
        return Inertia::render('Admin/Collection/CollectionEdit', [
            'collection' => $collection,
        ]);
    }

    public function update(Request $request, $id)
    {
        $collection = Collection::findOrFail($id);

        $data = $request->validate([
            'image' => 'nullable|image',
            'heading' => 'required|string|max:255',
            'title' => 'nullable|string',
        ]);

            // image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('collection', $imageName, 'public');
        $data['image'] = $imageName;    
    }
   

         $collection->update([
            'image' => $data['image'] ?? $collection->image,
            'heading' => $data['heading'],
            'title' => $data['title'] ?? $collection->title,
        ]);

        return redirect()->route('collection.index');
    }

    public function destroy($id)
    {
        $collection = Collection::findOrFail($id);
        $collection->delete();

        return redirect()->route('collection.index');
    }
}
