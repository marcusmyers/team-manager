<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use Marcusmyers\TeamManager\Models\Schedule;
use Marcusmyers\TeamManager\Models\ScheduleType;

$factory->define(Schedule::class, function (Faker $faker) {
    return [
    	'schedule_date_time' => Carbon::now()->addMonth(),
    	'team_id' => $faker->randomNumber(),
    	'schedule_type_id' => function() {
    		return factory(ScheduleType::class)->create()->id;
    	},
    ];
});