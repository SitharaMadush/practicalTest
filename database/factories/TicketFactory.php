<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_name' => $this->faker->name,
            'problem_description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true) ,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'ref_no' => Str::random(10),
            'status' => 'pending',
        ];
    }
}
