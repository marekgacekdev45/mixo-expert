<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\RealisationsPage;

class RealisationsPageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RealisationsPage::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'meta_title' => '{}',
            'meta_description' => '{}',
            'hero_image' => fake()->text(),
            'hero_heading' => '{}',
            'subheading' => '{}',
            'heading' => '{}',
            'text' => '{}',
        ];
    }
}
