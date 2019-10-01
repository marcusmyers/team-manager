<?php

use Faker\Generator as Faker;
use Marcusmyers\TeamManager\Models\Team;

$factory->define(Team::class, function (Faker $faker) {
    return [
    	'name' => $faker->firstName,
    ];
});