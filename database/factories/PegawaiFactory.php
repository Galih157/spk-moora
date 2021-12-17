<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pegawai;
use Faker\Generator as Faker;

$factory->define(Pegawai::class, function (Faker $faker) {
    $gender = $faker->randomElement(['L', 'P']);

    return [
        'nama' => ($gender == 'L') ?
            "{$faker->firstNameMale} {$faker->lastName}" :
            "{$faker->firstNameFemale} {$faker->lastName}",
        'usia' => $faker->numberBetween(20, 55),
        'alamat' => $faker->address,
        'jenis_kelamin' => $gender,
        'tinggi_badan' => $faker->numberBetween(160, 180),
        'berat_badan' => $faker->numberBetween(48, 80)
    ];
});
