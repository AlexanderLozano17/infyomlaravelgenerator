<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Poster;
use Faker\Generator as Faker;

$factory->define(Poster::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'body' => $faker->text,
        'state' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
