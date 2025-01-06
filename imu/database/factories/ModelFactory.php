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

$factory->define(Teplokvartal\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Teplokvartal\Chimney::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'desc' => $faker->paragraph,
        'width' => $faker->randomNumber,
        'content' => implode('<br><br>', $faker->paragraphs(rand(5, 7))),
        'type' => 'одностенный',
        'image' => $faker->imageUrl($width = 600, $height = 300),
    ];
});

$factory->define(Teplokvartal\Briquette::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'desc' => $faker->paragraph,
        'content' => implode('<br><br>', $faker->paragraphs(rand(5, 7))),
        //'type' => 'одностенный',
        'image' => $faker->imageUrl($width = 600, $height = 300),
    ];
});

$factory->define(Teplokvartal\Boiler::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'desc' => $faker->paragraph,
        'content' => implode('<br><br>', $faker->paragraphs(rand(5, 7))),
        //'type' => 'одностенный',
        'image' => $faker->imageUrl($width = 600, $height = 300),
    ];
});

$factory->define(Teplokvartal\Article::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'desc' => implode('<br><br>', $faker->paragraphs(rand(1, 2))),
        'content' => implode('<br><br>', $faker->paragraphs(rand(5, 7))),
        'product_name' => 'chimneys',
        'image' => $faker->imageUrl($width = 600, $height = 300),
    ];
});

$factory->define(Teplokvartal\Photo::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word(2),
        'desc' => $faker->paragraph,
        'content' => implode('<br><br>', $faker->paragraphs(rand(5, 7))),
        'product_name' => 'chimneys',
        'image' => $faker->imageUrl($width = 600, $height = 300),
    ];
});

$factory->define(Teplokvartal\Order::class, function (Faker\Generator $faker) {
    return [
        'client_name' => $faker->name,
        'phone1' => $faker->phoneNumber,
        'phone2' => $faker->phoneNumber,
        'email' => $faker->email,
        'question' => $faker->paragraph,
    ];
});

$factory->define(Teplokvartal\Page::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'desc' => $faker->paragraph,
        'content' => implode('<br><br>', $faker->paragraphs(rand(5, 7))),
        'image' => $faker->imageUrl($width = 600, $height = 300),
    ];
});

$factory->define(Teplokvartal\Question::class, function (Faker\Generator $faker) {
    return [
        'topic' => $faker->sentence,
        'text' => $faker->paragraph,
        'answer' => $faker->paragraph,
    ];
});

// $factory->define(Teplokvartal\Answer::class, function (Faker\Generator $faker) {
//     return [
//         'content' => implode('<br><br>', $faker->paragraphs(rand(5, 7))),
//     ];
// });
