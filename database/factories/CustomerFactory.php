<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        "nama" => $faker->name,
        "email" => $faker->email,
        "password" => bcrypt('secret'),
        "alamat" => $faker->address,
        "telp" => $faker->PhoneNumber,
        "status" => rand(0,1)
    ];
});
