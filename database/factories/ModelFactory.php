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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'slug' => $faker->slug,
        'password' => $password ?: $password = bcrypt('111'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Sport::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'sport_name' => $faker->name,
        'sport_desc' => $faker->paragraph,
        'sport_player_num' => $faker->randomDigit,
        'sport_img' => str_random(10),
    ];
});

$factory->define(App\governorate::class, function (Faker\Generator $faker) {
    static $password;

    return [

        'g_en_name'     => $faker->name,
        'g_ar_name'     => $faker->name,
        'g_country_id'  => 1,
    ];
});
