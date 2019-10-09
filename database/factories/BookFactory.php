<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Book;
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
$factory->define(Book::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\en_US\Text($faker));
    $faker->addProvider(new \Faker\Provider\Barcode($faker));
    
    $gender = ['m','f'];
    return [
        'name' => $faker->realText($faker->numberBetween(30,50)),
        'isbn' => $faker->isbn13(),
        'summary' => $faker->realText($faker->numberBetween(100,200)),
        'author_id' => rand(1,50),
        'categories_id' => rand(1,4),
        'publisher_id' => 1
    ];
});
