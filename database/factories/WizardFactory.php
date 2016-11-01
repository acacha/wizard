<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\Acacha\Wizard\Wizard::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word
    ];
});

$factory->define(\Acacha\Wizard\Step::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word
    ];
});
