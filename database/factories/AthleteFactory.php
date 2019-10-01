<?php

use Faker\Generator as Faker;
use Marcusmyers\TeamManager\Models\Athlete;

$factory->define(Athlete::class, function (Faker $faker) {
    return [
    	'name' => $faker->name,
    	'email' => $faker->email,
    	'bio' => $faker->paragraph,
    	'avatar' => $faker->imageUrl('200', '200', 'people'),
    	'height' => '5 ft. 10 in',
    	'weight' => '175 lbs',
    	'position' => 'Guard',
    	'number' => $faker->randomNumber(2)
    ];
});