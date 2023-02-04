<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('item', function (Blueprint $table) {
      $table->id('item_id');
      $table->string('item_name', 50);
      $table->string('item_desc', 500);
      $table->integer('price', false, true);
    });
  }

  public function down()
  {
    Schema::dropIfExists('item');
  }
};
