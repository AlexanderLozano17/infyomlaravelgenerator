<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {

    return [
        'identification' => $faker->word,
        'email' => $faker->word,
        'first_name' => $faker->word,
        'second_name' => $faker->word,
        'last_name' => $faker->word,
        'age' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
