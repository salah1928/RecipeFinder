<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content'=>$faker->text(),
        'user_id'=>App\User::inRandomOrder()->first()->id,
        'recipe_id'=>App\Recipe::inRandomOrder()->first()->id,
    ];
});
