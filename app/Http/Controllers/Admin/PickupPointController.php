<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PickupPoint;
use Illuminate\Http\Request; 
use Inertia\Inertia;

class PickupPointController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Admin/PickupPoint/PickupPointPage', [
            'PickupPoint' => PickupPoint::all()
        ]);
    }

    public function create()
    {


    }

    public function store(Request $request)
    {
        $PickupPoint = $request->validate([
            'pickup_point_name' => 'required|string|max:255',
            'pickup_point_email' => 'required|string|max:255',
            'pickup_point_phone' => 'required|numeric',
            'pickup_point_address' => 'required|string|max:255',
            'pickup_point_city' => 'required|string|max:255',
            'pickup_point_area' => 'required|string|max:255',
            'pickup_point_manager_name' => 'required|string|max:255',
            'pickup_point_manager_number' => 'required|numeric',
            'pickup_point_description' => 'required|string|max:255',
            'pickup_point_open_time' => 'required|string|max:255',
            'pickup_point_close_time' => 'required|string|max:255',
            'status' => 'required|in:1,2',
        ]);

        PickupPoint::create([
            'pickup_point_name' => $PickupPoint['pickup_point_name'],
            'pickup_point_email' => $PickupPoint['pickup_point_email'],
            'pickup_point_phone' => $PickupPoint['pickup_point_phone'],
            'pickup_point_address' => $PickupPoint['pickup_point_address'],
            'pickup_point_city' => $PickupPoint['pickup_point_city'],
            'pickup_point_area' => $PickupPoint['pickup_point_area'],
            'pickup_point_manager_name' => $PickupPoint['pickup_point_manager_name'],
            'pickup_point_manager_number' => $PickupPoint['pickup_point_manager_number'],
            'pickup_point_description' => $PickupPoint['pickup_point_description'],
            'pickup_point_open_time' => $PickupPoint['pickup_point_open_time'],
            'pickup_point_close_time' => $PickupPoint['pickup_point_close_time'],
            'status' => $PickupPoint['status'],
        ]);


        return redirect()->route('pickup_point.index');

    }

    public function edit($id)
    {
        $PickupPoint = PickupPoint::findOrFail($id);
        return Inertia::render('Admin/PickupPoint/PickupPointPage',[
             'PickupPoint' => $PickupPoint,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'pickup_point_name' => 'required|string|max:255',
            'pickup_point_email' => 'required|string|max:255',
            'pickup_point_phone' => 'required|numeric',
            'pickup_point_address' => 'required|string|max:255',
            'pickup_point_city' => 'required|string|max:255',
            'pickup_point_area' => 'required|string|max:255',
            'pickup_point_manager_name' => 'required|string|max:255',
            'pickup_point_manager_number' => 'required|numeric',
            'pickup_point_description' => 'required|string|max:255',
            'pickup_point_open_time' => 'required|string|max:255',
            'pickup_point_close_time' => 'required|string|max:255',
            'status' => 'required|in:1,2',
        ]);

        $PickupPoint = PickupPoint::findOrFail($id);
         $PickupPoint->update([
            'pickup_point_name' => $data['pickup_point_name'],
            'pickup_point_email' => $data['pickup_point_email'],
            'pickup_point_phone' => $data['pickup_point_phone'],
            'pickup_point_address' => $data['pickup_point_address'],
            'pickup_point_city' => $data['pickup_point_city'],
            'pickup_point_area' => $data['pickup_point_area'],
            'pickup_point_manager_name' => $data['pickup_point_manager_name'],
            'pickup_point_manager_number' => $data['pickup_point_manager_number'],
            'pickup_point_description' => $data['pickup_point_description'],
            'pickup_point_open_time' => $data['pickup_point_open_time'],
            'pickup_point_close_time' => $data['pickup_point_close_time'],
            'status' => $data['status'],
        ]);


        return redirect()->route('pickup_point.index');


    }

    public function destroy($id)
    {
        $PickupPoint = PickupPoint::findOrFail($id);
        $PickupPoint->delete();
        return redirect()->route('pickup_point.index');

    }
}
