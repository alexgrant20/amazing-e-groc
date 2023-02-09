<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Account;
use App\Models\Item;
use App\Models\Order;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GenderSeeder::class,
            RoleSeeder::class
        ]);

        Account::create([
            'role_id' => 1,
            'gender_id' => 1,
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->email(),
            'display_picture' => 'images/person1.jpg',
            'password' => Hash::make('12345678'),
        ]);

        Account::create([
            'role_id' => 2,
            'gender_id' => 2,
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->email(),
            'display_picture' => 'images/person2.jpg',
            'password' => Hash::make('12345678'),
        ]);


        Item::factory(15)->create();

        Order::create([
            'account_id' => 1,
            'item_id' => 1,
        ]);
        Order::create([
            'account_id' => 1,
            'item_id' => 2,
        ]);
    }
}
