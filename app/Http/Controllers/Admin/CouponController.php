<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Admin/CouponCode/CouponCodePage', [
            'CouponCode' => Coupon::all(),
        ]);
    }

    public function create()
    {
        return view('admin.coupon_code.create');
    }

    public function store(Request $request)
    {
        // Validate and store the coupon code
        $data = $request->validate([
            'coupon_code' => 'required|string|max:255',
            'valid_date' => 'required|date',
            'type' => 'required|string',
            'coupon_amount' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        Coupon::create([
            'coupon_code' => $data['coupon_code'],
            'valid_date' => $data['valid_date'],
            'type' => $data['type'],
            'coupon_amount' => $data['coupon_amount'],
            'status' => $data['status'],
        ]);
        return redirect()->route('coupon_code.index');
        
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return Inertia::render('Admin/CouponCode/CouponCodeEdit', [
            'coupon' => $coupon,
        ]);
    }

    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);
        $data = $request->validate([
            'coupon_code' => 'required|string|max:255',
            'valid_date' => 'required|date',
            'type' => 'required|string',
            'coupon_amount' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $coupon->update([
            'coupon_code' => $data['coupon_code'],
            'valid_date' => $data['valid_date'],
            'type' => $data['type'],
            'coupon_amount' => $data['coupon_amount'],
            'status' => $data['status'],
        ]);
        return redirect()->route('coupon_code.index');
    }

    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->route('coupon_code.index');
    }
}
