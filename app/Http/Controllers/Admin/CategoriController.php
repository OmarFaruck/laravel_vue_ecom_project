<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categori;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $user_id=$request->header('$id');
        return Inertia::render("Admin/Categori/CategoriPage", [
            'Categori' => Categori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         $data=$request->validate([
            'name'=>'required',
            'description'=>'nullable'
         ]);
            Categori::create([
                'name'=>$data['name'],
                'description'=>$data['description']
            ]);

           return redirect()->route('category.index')->with('success','Categori created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
