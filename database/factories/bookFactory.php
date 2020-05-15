<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
Use App\Book;

$factory->define(Book::class, function (Faker $faker) {
    return [
       'name' => $faker->name,
       'authorname' => $faker->name,
       'isbn' => '908-5877-54-45',
       'authorname' => $faker->name,
       'genres' => $faker->randomElement(['Children', 'Drama','Fantasy']),
       'price' => $faker->randomDigit,
    ];
});
