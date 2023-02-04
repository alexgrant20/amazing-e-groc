<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
  use HasFactory;

  protected $primaryKey = 'account_id';
  protected $table = 'account';

  protected $guarded = ['account_id'];

  public function role()
  {
    return $this->belongsTo(Role::class, 'role_id', 'role_id');
  }

  public function gender()
  {
    return $this->belongsTo(Gender::class, 'gender_id', 'gender_id');
  }

  public function order()
  {
    return $this->belongsTo(Order::class, 'order_id', 'order_id');
  }
}
