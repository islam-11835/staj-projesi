<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with('products')->get();
    }
public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'status' => 'required|string',
        'currency' => 'required|in:TRY,USD,EUR,GBP',
        'amount' => 'required|numeric',
        'product_id' => 'required|array',
    ]);

    $order = Order::create([
        'user_id' => $request->user_id,
        'status' => $request->status,
        'currency' => $request->currency,
        'amount' => $request->amount,
    ]);

    $order->products()->attach($request->product_id);

    return response()->json($order->load('products'), 201);
}


    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return response()->json($order);
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return response()->json(['message' => 'Order deleted']);
    }
}