<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pegawai;
use Faker\Generator as Faker;

$factory->define(Pegawai::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'usia' => $faker->numberBetween(20, 55),
        'alamat' => $faker->address,
        'tinggi_badan' => $faker->numberBetween(160, 180),
        'berat_badan' => $faker->numberBetween(48, 80)
    ];
});
