<?php

use App\Models\KeuntunganAsuransi;
use Illuminate\Database\Seeder;

class KeuntunganAsuransiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Models\Asuransi::all() as $asuransi) {
            $listKeuntungan = [];

            foreach (range(20, 55, 5) as $usia) {
                $keuntungan = factory(KeuntunganAsuransi::class)->make();
                $keuntungan->usia_min = $usia;
                $keuntungan->jenis_kelamin = 'P';

                array_push($listKeuntungan, $keuntungan);

                $keuntungan = factory(KeuntunganAsuransi::class)->make();
                $keuntungan->usia_min = $usia;
                $keuntungan->jenis_kelamin = 'L';

                array_push($listKeuntungan, $keuntungan);
            }

            $asuransi->keuntungan()->saveMany($listKeuntungan);
        }
    }
}
