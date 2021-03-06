<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->companyEmail,
        'website' => $faker->url,
        'logo' => $faker->url . '/logo.png',
        'password' => bcrypt('secret'),
    ];
});
