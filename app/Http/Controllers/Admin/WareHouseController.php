<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WareHouse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WareHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/WareHouse/WareHousePage',[
            'WareHouse' => WareHouse::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'warehouse_name' => 'required',
            'warehouse_code' => 'required',
            'warehouse_email' => 'required',
            'warehouse_phone' => 'required',
            'warehouse_address' => 'required',
            'warehouse_city' => 'required',
            'warehouse_districk' => 'required',
            'warehouse_area' => 'required',
            'warehouse_manager_name' => 'required',
            'warehouse_manager_number' => 'required',
            'warehouse_description' => '',
            'status' => '',
        ]);
        WareHouse::create([
            'warehouse_name' => $data['warehouse_name'],
            'warehouse_code' => $data['warehouse_code'],
            'warehouse_email' => $data['warehouse_email'],
            'warehouse_phone' => $data['warehouse_phone'],
            'warehouse_address' => $data['warehouse_address'],
            'warehouse_city' => $data['warehouse_city'],
            'warehouse_districk' => $data['warehouse_districk'],
            'warehouse_area' => $data['warehouse_area'],
            'warehouse_manager_name' => $data['warehouse_manager_name'],
            'warehouse_manager_number' => $data['warehouse_manager_number'],
            'warehouse_description' => $data['warehouse_description'] ?? null,
            'status' => $data['status'] ?? null,
        ]);
        return redirect()->route('warehouse_page.index');
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
        $WareHouse = WareHouse::findOrFail($id);
         return Inertia::render('Admin/WareHouse/WareHousePage',[ 
            'WareHouse' => $WareHouse,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $warehousedata = $request->validate([
            'warehouse_name' => 'required',
            'warehouse_code' => 'required',
            'warehouse_email' => 'required',
            'warehouse_phone' => 'required',
            'warehouse_address' => 'required',
            'warehouse_city' => 'required',
            'warehouse_districk' => 'required',
            'warehouse_area' => 'required',
            'warehouse_manager_name' => 'required',
            'warehouse_manager_number' => 'required',
            'warehouse_description' => '',
            'status' => '',
        ]);
        $warehouse = WareHouse::findOrFail($id);
        $warehouse->update([
            'warehouse_name' => $warehousedata['warehouse_name'],
            'warehouse_code' => $warehousedata['warehouse_code'],
            'warehouse_email' => $warehousedata['warehouse_email'],
            'warehouse_phone' => $warehousedata['warehouse_phone'],
            'warehouse_address' => $warehousedata['warehouse_address'],
            'warehouse_city' => $warehousedata['warehouse_city'],
            'warehouse_districk' => $warehousedata['warehouse_districk'],
            'warehouse_area' => $warehousedata['warehouse_area'],
            'warehouse_manager_name' => $warehousedata['warehouse_manager_name'],
            'warehouse_manager_number' => $warehousedata['warehouse_manager_number'],
            'warehouse_description' => $warehousedata['warehouse_description'] ?? null,
            'status' => $warehousedata['status'] ?? null,
        ]);
        return redirect()->route('warehouse_page.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warehouse = WareHouse::findOrFail($id);
        $warehouse->delete();
        return redirect()->route('warehouse_page.index');
    }
}
