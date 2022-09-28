<?php

namespace Marcusmyers\TeamManager\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Marcusmyers\TeamManager\Models\Team;

class TeamFactory extends Factory
{
    public function modelName()
    {
        return Team::class;
    }

    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
        ];
    }
}
