<?php

use App\Models\Gender;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id('account_id');
            $table->foreignId('role_id')->constrained('role', 'role_id');
            $table->foreignId('gender_id')->constrained('gender', 'gender_id');
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->string('email', 100)->unique();
            $table->string('display_picture', 100);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('account');
    }
};
