<?php

use App\Models\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'title' => $faker->name,
        'classification' => $faker->name,
        'type' => $faker->name,
        'company logo' => $faker->imageUrl(),
        'company name' => $faker->company,
        'city or suburb' => $faker->city,
        'company size' => $faker->randomDigitNotNull,
        'content' => $faker->text,
        'created_at' => $date_time,
        'updated_at' => $date_time,
        'location' => $faker->city,
        'description' => $faker->realText(),
        'salary' => $faker->numberBetween($min = 1000, $max = 9000),
        'closing date' => $faker->date,
    ];
});
