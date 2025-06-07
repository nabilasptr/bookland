<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderitemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::with(['book', 'order.user'])->get();

        return view('admin.orderitems.index', compact('orderItems'));
    }
}
