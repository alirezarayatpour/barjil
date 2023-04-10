<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::where('status', '0')->paginate(10);
        return view('admin.pages.order.index', compact('order'));
    }

    public function show(Order $order)
    {
        $order = Order::where('id', $order->id)->first();
        
        $cart = auth()->user()->cart;
        $total_price = 0;
        foreach($cart as $item){
            $total_price += ($item->count * $item->price);
        }

        return view('admin.pages.order.show', compact('order', 'total_price'));
    }

    public function update(Request $request, Order $order)
    {
        $order = Order::find($order->id);
        $order->status = $request->get('order_status');
        $order->update();
        return redirect()->route('order.index');
    }

    public function history()
    {
        $order = Order::where('status', '1')->paginate(10);
        return view('admin.pages.order.history', compact('order'));
    }
}
