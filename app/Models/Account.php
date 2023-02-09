<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
   use HasFactory, SoftDeletes;

   protected $primaryKey = 'account_id';
   protected $table = 'account';
   protected $dates = ['deleted_at'];

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

   public function scopeHasRole($query, $role)
   {
      return !empty($query->where('account_id', $this->account_id)->whereRelation('role', 'role_name', $role)->first());
   }
}
