<?php

namespace Marcusmyers\TeamManager\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Marcusmyers\TeamManager\Models\Athlete;

class AthleteFactory extends Factory
{
    public function modelName()
    {
        return Athlete::class;
    }

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'bio' => $this->faker->paragraph,
            'avatar' => $this->faker->imageUrl('200', '200', 'people'),
            'height' => '5 ft. 10 in',
            'weight' => '175 lbs',
            'position' => 'Guard',
            'number' => $this->faker->randomNumber(2)
        ];
    }

}
