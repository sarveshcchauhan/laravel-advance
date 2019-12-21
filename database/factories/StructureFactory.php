<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\structure;
use Faker\Generator as Faker;

$factory->define(structure::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
        'active' => random_int(0,1)
    ];
});
