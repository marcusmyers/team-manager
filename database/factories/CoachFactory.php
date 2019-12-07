<?php

use Faker\Generator as Faker;
use Marcusmyers\TeamManager\Models\Coach;

$factory->define(Coach::class, function (Faker $faker) {
    return [
    	'name' => $faker->firstName,
    	'email' => $faker->email,
    	'bio' => $faker->paragraph,
    	'avatar' => $faker->imageUrl('200', '200', 'people'),
        'active' => true,
    ];
});