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

use App\Models\Event\Event;
use App\User;
use Carbon\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'is_active' => 1,
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Event::class, function (Faker\Generator $faker) {

    $start_date = Carbon::now()->addDays($faker->randomElement([1,2,3,4,5,6,7,8,9]));
    $end_date = $start_date->copy()->addDays($faker->randomElement([1,2,3,4,5,6,7,8,9]));

    return [
        'title'       => $faker->sentence(5),
        'description' => $faker->paragraph(5),
        'address'     => $faker->address,
        'lat'         => $faker->latitude,
        'long'        => $faker->longitude,
        'start_date'  => $start_date->format('Y-m-d'),
        'end_date'    => $end_date->format('Y-m-d'),
        'user_id'     => factory(User::class)->create()->id,
    ];
});
