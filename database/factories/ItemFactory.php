<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class ItemFactory extends Factory
{
    public function definition()
    {
        return [
            'item_name' => fake()->name(),
            'item_desc' => fake()->realText(),
            'price' => rand("10000", "100000000"),
        ];
    }
}
