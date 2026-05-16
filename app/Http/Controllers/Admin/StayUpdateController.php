<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StayUpdate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StayUpdateController extends Controller
{
   public function index(Request $request)
    {
        return Inertia::render('Admin/StayUpdate/StayUpdatePage',[
            'stayupdates' => StayUpdate::all(),
        ]);
    }

    public function create()
    {
        // Code to show a form for creating a new stay update
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'email' => 'required|email|unique:stay_updates,email',
        ]);
        StayUpdate::create([
            'email' => $data['email'],
        ]);
        return redirect()->route('stay_update.index');
    }

    public function edit($id)
    {
        // Code to show a form for editing an existing stay update
        $stayUpdate = StayUpdate::findOrFail($id);
        return Inertia::render('Admin/StayUpdate/StayUpdateEdit', [
            'stayUpdate' => $stayUpdate
        ]);
    }

    public function update(Request $request, $id)
    {
        // Code to validate and update an existing stay update in the database
        $data = $request->validate([
            'email' => 'required|email|unique:stay_updates,email,' . $id,
        ]);
        $stayUpdate = StayUpdate::findOrFail($id);
        $stayUpdate->update([
            'email' => $data['email'],
        ]); 
        return redirect()->route('stay_update.index');
    }

    public function destroy($id)
    {
        // Code to delete a stay update from the database
        $stayUpdate = StayUpdate::findOrFail($id);
        $stayUpdate->delete();
        return redirect()->route('stay_update.index');
    }
}
