<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CustomerFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $language = fake()->randomElement(Language::inRandomOrder()->get());
        $currency = fake()->randomElement(Currency::inRandomOrder()->get());

        return [
            'name' => fake()->name,
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->phoneNumber(),
            'language_id' => $language->id,
            'currency_id' => $currency->id,
            'communications' => json_encode([]),
        ];

    }
}
