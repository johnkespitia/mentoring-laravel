<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ramdom = rand(1,3);
        return [
            'name' => $this->faker->name(),
            'sku' => $this->faker->ean8(),
            'description' => $this->faker->realText(),
            'state' => true,
            'price' => $this->faker->numberBetween(20000, 200000),
            'category_id' => $ramdom,
        ];
    }
}
