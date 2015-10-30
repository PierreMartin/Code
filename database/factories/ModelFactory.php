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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'      => $faker->name,
        'email'     => $faker->email,
        'password'  => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title'       => $faker->word(1),
        'slug'        => $faker->word(1),
        'excerpt'     => $faker->paragraph(1),
        'content'     => $faker->paragraph(3),
        'published_at' => Carbon\Carbon::now(),
        'status'       => 1
        //'category_id' => rand(1, 2)
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'email'     => $faker->email,
        'message'   => $faker->paragraph(3),
        'post_id'   => rand(1,10)
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'title'     => $faker->word(1)
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name'     => $faker->word(1)
    ];
});