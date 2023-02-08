<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required'
        ]);

        // $id = auth()->user()->id;
        $id = 0;

        $isItemInCart = Order::where([
            'account_id' => $id,
            'item_id' => $request->item_id
        ])->count();

        if ($isItemInCart > 0) return to_route('index', ['error-swal' => "You only allowed to have 1 item"]);

        Item::create([
            'account_id' => $id,
            'item_id' => $request->item_id
        ]);

        return to_route('cart.index', ['success-swal' => 'Item successfully inserted']);
    }

    public function index()
    {
        $id = 0;

        $orders = Order::where('account_id', $id)->get();

        return view('order.index', compact('orders'));
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'item_id' => 'required'
        ]);

        $id = 0;

        Order::where([
            'item_id' => $request->item_id,
            'account_id' => $id
        ])->delete();

        return to_route('cart.index', ['success-swal' => 'Item successfully deleted']);
    }

    public function checkout()
    {
        $id = 0;

        Order::where('account_id', $id)->delete();

        return to_route('cart.index', ['success-swal' => 'Item successfully purchased']);
    }
}
