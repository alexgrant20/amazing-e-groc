<?php

use App\Models\Account;
use App\Models\Item;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('order', function (Blueprint $table) {
      $table->id('order_id');
      $table->foreignId('account_id')->constrained('account', 'account_id');
      $table->foreignId('item_id')->constrained('item', 'item_id');
    });
  }

  public function down()
  {
    Schema::dropIfExists('order');
  }
};
