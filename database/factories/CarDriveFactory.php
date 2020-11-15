<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CarDrive;
use Faker\Generator as Faker;

$factory->define(CarDrive::class, function (Faker $faker) {

    return [
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
