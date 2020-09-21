<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Visitor;
use Faker\Generator as Faker;

$factory->define(Visitor::class, function (Faker $faker) {
    return [
        'first_name' => $faker -> firstName,
        'last_name' => $faker -> lastName,
        // 'date_of_birth' => $faker -> dateOfBirth,
        'email' => $faker -> email,
    ];
});
