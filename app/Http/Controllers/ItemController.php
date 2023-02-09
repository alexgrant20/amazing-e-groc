<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;

class ItemController extends Controller
{
   public function index()
   {
      $items = Item::orderBy('item_name')->paginate(10);

      return view("item.index", compact('items'));
   }

   public function show(Item $item)
   {
      $id = $this->account;

      $isItemInCart = Order::where([
         'account_id' => $id,
         'item_id' => $item->item_id
      ])->count();

      return view("item.show", compact('item', 'isItemInCart'));
   }
}
