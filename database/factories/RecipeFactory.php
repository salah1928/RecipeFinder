<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recipe;
use Faker\Generator as Faker;

$factory->define(Recipe::class, function (Faker $faker) {
    $options = ['tomato','potato','carrot','cucumbor','orange','banana'];
    $rand_items = array_rand($options, 3);
    return [
        'title' => $faker->title,
        'description' => $faker->text(),
        'ingredients'=>json_encode([$options[$rand_items[0]], $options[$rand_items[1]], $options[$rand_items[2]]]),
        'user_id'=>App\User::inRandomOrder()->first()->id,

    ];
});

