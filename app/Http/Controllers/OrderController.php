<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index (){
        $orders = Order::with('user')->get();
        return view ('admin.orders.index',compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
{
    $request->validate([
        'status' => 'required|in:pending,paid,shipped,completed', // sesuaikan dengan status yang tersedia
    ]);

    $order->update([
        'status' => $request->status,
    ]);

    return redirect()->route('orders.index')->with('success', 'Status pesanan berhasil diperbarui.');
}

}
