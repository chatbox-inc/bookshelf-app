<?php

use App\Models\Book;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title'         => $faker->word,
        'url'           => $faker->url,
        'img'           => $faker->url,
        'description'   => $faker->text,
        'isbn'          => $faker->isbn10,
        'author'        => $faker->name,
        'publisher'     => $faker->company,
        'published_at'  => Carbon::parse($faker->dateTimeThisDecade),
        'is_rental'     => $faker->boolean,
    ];
});
