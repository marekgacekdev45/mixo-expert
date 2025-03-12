<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ContactPage;

class ContactPageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactPage::class;

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
            'heading' => '{}',
            'text' => '{}',
        ];
    }
}
