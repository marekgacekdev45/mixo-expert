<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Offer;

class OfferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offer::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => '{}',
            'icon' => fake()->text(),
            'short_description' => '{}',
            'thumbnail' => fake()->text(),
            'content' => '{}',
            'sort' => fake()->numberBetween(-10000, 10000),
        ];
    }
}
