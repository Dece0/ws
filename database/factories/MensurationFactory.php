<?php

use Faker\Generator as Faker;

$factory->define(App\Mensuration::class, function (Faker $faker) {
    return [
        'value' => $faker->randomDigit,
        'time' => now(),
        'sensor_id' => 1,
        'physical_quantity_id' => 1,
    ];
});

$factory->define(App\Physical_quantity::class, function (Faker $faker) {
    return [
        'quantity_name' => $faker->word,
        'unit_name' => $faker->word,
        'unit_symbol' => $faker->randomLetter,
        'sensor_id' => 1,
    ];
});
/*
$factory->define(App\Sensor::class, function (Faker $faker) {
    return [
        'me' => $faker->name,
        'value' => $faker->unique()->safeEmail,
        'time' => now(),
        'sensor_id' => '',
        'physical_quantiy_id' => str_random(10),
    ];
});
*/