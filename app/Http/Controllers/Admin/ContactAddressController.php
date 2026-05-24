<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactAddress;
use Illuminate\Http\Request;
use Inertia\Inertia; 

class ContactAddressController extends Controller
{
         public function index(Request $request)
        {
             return Inertia::render('Admin/ContactAddress/ContactAddressPage', [
             'ContactAddress' => ContactAddress::all()
        ]);

        }
    
        public function create()
        {
            
        }
    
        public function store(Request $request)
        {
             $validatedData = $request->validate([
                'heading' => 'required|string|max:255',
                'message' => 'required|string',
                'address_1' => 'required|string|max:255',
                'ouremail_1' => 'required|email|max:255',
                'phone_1' => 'required|numeric',
                'address_2' => 'nullable|string|max:255',
                'ouremail_2' => 'nullable|email|max:255',
                'phone_2' => 'required|numeric',
            ]);

            ContactAddress::create([
                'heading' => $validatedData['heading'],
                'message' => $validatedData['message'],
                'address_1' => $validatedData['address_1'],
                'ouremail_1' => $validatedData['ouremail_1'],
                'phone_1' => $validatedData['phone_1'],
                'address_2' => $validatedData['address_2'],
                'ouremail_2' => $validatedData['ouremail_2'],
                'phone_2' => $validatedData['phone_2'],
            ]);

             return redirect()->route('contact_address.index');
        }
    
        public function edit($id)
        {
            $contactAddress = ContactAddress::findOrFail($id);
            return Inertia::render('Admin/ContactAddress/ContactAddressEdit', [
                'contactAddress' => $contactAddress
            ]);
        }
    
        public function update(Request $request, $id)
        {
            $contactAddress = ContactAddress::findOrFail($id);
            $validatedData = $request->validate([
                'heading' => 'required|string|max:255',
                'message' => 'required|string',
                'address_1' => 'required|string|max:255',
                'ouremail_1' => 'required|email|max:255',
                'phone_1' => 'required|numeric',
                'address_2' => 'nullable|string|max:255',
                'ouremail_2' => 'nullable|email|max:255',
                'phone_2' => 'required|numeric',
            ]);

            $contactAddress->update([
                'heading' => $validatedData['heading'],
                'message' => $validatedData['message'],
                'address_1' => $validatedData['address_1'],
                'ouremail_1' => $validatedData['ouremail_1'],
                'phone_1' => $validatedData['phone_1'],
                'address_2' => $validatedData['address_2'],
                'ouremail_2' => $validatedData['ouremail_2'],
                'phone_2' => $validatedData['phone_2'],
            ]);

             return redirect()->route('contact_address.index');
        }

        public function destroy($id)
        {
            $contactAddress = ContactAddress::findOrFail($id);
            $contactAddress->delete();
            return redirect()->route('contact_address.index');
        }
}
