<?php

namespace Marcusmyers\TeamManager\Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Marcusmyers\TeamManager\Models\Schedule;

class ScheduleFactory extends Factory
{
    public function modelName()
    {
        return Schedule::class;
    }

    public function definition() {
        return [
            'schedule_date_time' => Carbon::now(),
            'team_id' => $this->faker->randomNumber(),
            'schedule_type_id' => $this->faker->randomNumber(),
            'opponent' => null,
            'location' => $this->faker->city,
        ];
    }
}
