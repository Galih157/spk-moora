<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\KeuntunganAsuransi;
use Faker\Generator as Faker;

$factory->define(KeuntunganAsuransi::class, function (Faker $faker) {
    return [
        'premi' => $faker->numberBetween(200000, 900000),
        'jumlah_pencairan' => $faker->numberBetween(100000000, 1000000000)
    ];
});
