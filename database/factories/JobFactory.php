<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'description' => $faker->paragraph(3, true),
        'local' => $faker->city . '/' . $faker->stateAbbr,
        'remote' => 'no',
        'company' => function() {
            return factory(App\Company::class)->create()->id;
        }
    ];
});
