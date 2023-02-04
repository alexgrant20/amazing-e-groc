<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('gender', function (Blueprint $table) {
      $table->id('gender_id');
      $table->string('gender_desc', 10);
    });
  }

  public function down()
  {
    Schema::dropIfExists('gender');
  }
};
