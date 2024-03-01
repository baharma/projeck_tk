<?php

namespace Database\Factories;

use App\Models\RegistrationStudent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegistrationStudent>
 */
class RegistrationStudentFactory extends Factory
{
    protected $model = RegistrationStudent::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['laki_laki' , 'perempuan']),
            'date_of_birth' => date('Y-m-d'),
            'place_of_birth' => $this->faker->word(),
            'religion_id' => $this->faker->randomDigitNotNull(),
            'address' => $this->faker->sentence(),
            'phone' => $this->faker->phoneNumber(),
            'number_of_siblings' => $this->faker->randomDigitNotNull(),
            'height' => $this->faker->randomDigitNotNull(),
            'weight' => $this->faker->randomDigitNotNull(),
            'kk_image' =>  $this->faker->word() . '.jpg',
            'akta_image' => $this->faker->word() . '.jpg',
            'status' => $this->faker->randomElement(['pending' , 'valid']),
        ];
    }

    public function pending()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'pending',
            ];
        });
    }

    public function valid()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'valid',
            ];
        });
    }
}
