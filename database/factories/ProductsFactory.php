<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'thumbnail' => '',
            'title' => ucfirst($this->faker->words(2, true)),
            'price' => $this->faker->numberBetween(1000, 10000),
            'brand_id' => Brand::query()->inRandomOrder()->value('id')
        ];
    }
}
