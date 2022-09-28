<?php

namespace Marcusmyers\TeamManager\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Marcusmyers\TeamManager\Models\ScheduleType;

class ScheduleTypeFactory extends Factory
{
    public function modelName()
    {
        return ScheduleType::class;
    }

    public function definition()
    {
        return [
            'name' => 'Practice'
        ];
    }
}
