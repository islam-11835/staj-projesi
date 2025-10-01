<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    // عرض كل طرق الشحن
    public function index()
    {
        return Shipping::all();
    }

    // إضافة طريقة شحن جديدة
    public function store(Request $request)
    {
        $request->validate([
            'method' => 'required',
            'cost' => 'required|numeric',
            'estimated_delivery' => 'required',
        ]);

        return Shipping::create($request->all());
    }

    // عرض طريقة شحن واحدة
    public function show($id)
    {
        return Shipping::findOrFail($id);
    }

    // تعديل طريقة شحن
    public function update(Request $request, $id)
    {
        $shipping = Shipping::findOrFail($id);
        $shipping->update($request->all());
        return $shipping;
    }

    // حذف طريقة شحن
    public function destroy($id)
    {
        Shipping::destroy($id);
        return response()->json(['message' => 'Shipping deleted']);
    }
}