<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Match;
use Faker\Generator as Faker;

$factory->define(Match::class, function (Faker $faker) {
    return [
        'idEquipeLocale' => $faker->unique()->numberBetween(1, App\Equipe::count()),
        'idEquipeVisiteuse' => $faker->unique()->numberBetween(1, App\Equipe::count())
    ];
});
