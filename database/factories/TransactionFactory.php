<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\Customer;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TransactionFactory extends Factory
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
        $customer = fake()->randomElement(Customer::inRandomOrder()->limit(10)->get());
        $currency = fake()->randomElement(Currency::inRandomOrder()->get());

        $quantity = $this->faker->numberBetween(1, 100);
        $price = $this->faker->randomFloat(2, 10);

        $discount = $this->faker->randomFloat(2, 10, 50);
        $taxes = $this->faker->randomFloat(2, 5, 30);

        return [
            'customer_id' => $customer->id,
            'currency_id' => $currency->id,
            'quantity' => $quantity,
            'price' => $quantity * $price,
            'discount' => $discount,
            'taxes' => $taxes,
            'total_price' => ($quantity * $price) + ($taxes / 100) - ($discount / 100),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
