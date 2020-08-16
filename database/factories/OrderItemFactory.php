<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderItem;
use Faker\Generator as Faker;

$factory->define(OrderItem::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'price' => (double) rand(1,2000).".".rand(0,99),
    ];
});
