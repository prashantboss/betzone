<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Player::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'mobile' => 9999999999,
        'email_verified_at' => now(),
        'password' => bcrypt('password'),
        'remember_token' => Str::random(10)
    ];
});
