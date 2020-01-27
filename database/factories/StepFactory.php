<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Step;
use Faker\Generator as Faker;

$factory->define(Step::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(),
        'recipe_id'=>App\Recipe::inRandomOrder()->first()->id,
    ];
});
