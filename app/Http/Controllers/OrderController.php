<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   public function store(Request $request)
   {
      $request->validate([
         'item_id' => 'required'
      ]);

      $accountId = $this->account->account_id;

      $isItemInCart = Order::where([
         'account_id' => $accountId,
         'item_id' => $request->item_id
      ])->count();

      if ($isItemInCart > 0) return to_route('index')->with('error-swal', "You only allowed to have 1 item");

      Order::create([
         'account_id' => $accountId,
         'item_id' => $request->item_id
      ]);

      return to_route('order.index')->with('success-swal', 'Item successfully added');
   }

   public function index()
   {
      $orders = Order::where('account_id', $this->account->account_id)->get();

      return view('order.index', compact('orders'));
   }

   public function destroy(Request $request)
   {
      $request->validate([
         'item_id' => 'required'
      ]);

      Order::where([
         'item_id' => $request->item_id,
         'account_id' => $this->account->account_id
      ])->delete();

      return to_route('order.index')->with('success-swal', 'Item successfully deleted');
   }

   public function checkout()
   {
      Order::where('account_id', $this->account->account_id)->delete();

      return to_route('order.index')->with('success-swal', 'Item successfully purchased');
   }
}
