<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\Enums\GenreEnum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'poster' => 'noimg.png',
            'genre' => fake()->randomElement(GenreEnum::cases())->value,
            'release_date' => fake()->date(),
            'imdb_id' => fake()->numerify('tt#####'),
        ];
    }
}
