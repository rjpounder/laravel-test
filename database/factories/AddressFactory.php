<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Address::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'address_line_1' => $faker->streetAddress,
        'address_line_2' => $faker->state,
        'city' => $faker->city,
        'town' => $faker->state,
        'zip_code' => $faker->postcode,
        'country' => $faker->countryCode
    ];
});
