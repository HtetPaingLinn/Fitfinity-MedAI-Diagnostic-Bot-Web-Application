<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => $this->faker->jobTitle(),
            'salary' => $this->faker->randomElement(['$10,000 USD', '$15,000 USD',
                                                     '$20,000 USD', '$25,000 USD',
                                                     '$30,000 USD', '$35,000 USD',
                                                     '$40,000 USD', '$45,000 USD',
                                                     '$50,000 USD', '$55,000 USD',
                                                     '$60,000 USD', '$65,000 USD',
                                                     '$70,000 USD', '$75,000 USD',
                                                     '$80,000 USD', '$85,000 USD',]),
            'schedule' => $this->faker->randomElement(['Full Time', 'Part Time']),
            'url' => $this->faker->url(),

        ];
    }
}
