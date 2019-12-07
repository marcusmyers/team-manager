<?php

use Faker\Generator as Faker;
use Marcusmyers\TeamManager\Models\ScheduleType;

$factory->define(ScheduleType::class, function (Faker $faker) {
    return [
    	'name' => $faker->word,
        'active' => true,
    ];
});