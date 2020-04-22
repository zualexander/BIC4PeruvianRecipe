<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ingredient;
use Faker\Generator as Faker;

$factory->define(Ingredient::class, function (Faker $faker) {
    return [
        'name' => $slug = $faker->company,
        'description' => $faker->paragraph,
        'recipe_id' => function () {
            return App\Recipe::inRandomOrder()->first();
        },
    ];
});
