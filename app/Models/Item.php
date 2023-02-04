<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  use HasFactory;

  protected $primaryKey = 'item_id';
  protected $table = 'item';

  protected $guarded = ['item_id'];

  public function order()
  {
    return $this->belongsTo(Order::class, 'item_id', 'item_id');
  }
}
