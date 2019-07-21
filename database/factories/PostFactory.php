<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->paragraph(3),
        'body' => $faker->text,
        'user_id' => factory(User::class)->create()->id,
    ];
});
