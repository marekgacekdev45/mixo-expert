<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Home;

class HomeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Home::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'meta_title' => '{}',
            'meta_description' => '{}',
            'og_image' => fake()->text(),
            'keywords' => '{}',
            'scripts_head_top' => fake()->text(),
            'scripts_head_bottom' => fake()->text(),
            'scripts_body_top' => fake()->text(),
            'name' => '{}',
            'logo' => fake()->text(),
            'address' => fake()->word(),
            'city' => fake()->city(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'nip' => fake()->word(),
            'google_map' => fake()->text(),
            'google_link' => fake()->text(),
            'hero_heading' => '{}',
            'hero_text' => '{}',
            'hero_image' => fake()->text(),
            'hero_background' => fake()->text(),
            'offer_subheading' => '{}',
            'offer_heading' => '{}',
            'offer_text' => '{}',
            'about_subheading' => '{}',
            'about_heading' => '{}',
            'about_text' => '{}',
            'about_image' => fake()->text(),
            'about_background' => fake()->text(),
            'realisations_subheading' => '{}',
            'realisations_heading' => '{}',
            'realisations_text' => '{}',
            'realisations_image' => fake()->text(),
            'realisations_background' => fake()->text(),
            'cooperation_subheading' => '{}',
            'cooperation_heading' => '{}',
            'cooperation_text' => '{}',
        ];
    }
}
