<?php

namespace App\Http\Controllers;

use App\Models\Asuransi;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('pages.pegawai.index');
    }

    public function show(Pegawai $pegawai)
    {
        return view('pages.pegawai.show')
            ->with(compact('pegawai'));
    }

    public function hitung(Pegawai $pegawai)
    {
        $asuransi = Asuransi::with(['keuntungan' => function ($query) use ($pegawai) {
            $query->where('usia_min', '<=', $pegawai->usia);
            $query->where('jenis_kelamin', $pegawai->jenis_kelamin);
        }])->get();

        $matriks = collect();

        foreach ($asuransi as $item) {
            $keuntungan = $item->keuntungan->first();

            $matriks->push(collect([
                $keuntungan->premi,
                $item->proses_pencairan,
                $keuntungan->jumlah_pencairan,
                $item->fasilitas,
            ]));
        }

        $matriksTranspose = array_map(null, ...$matriks->toArray());
        $arrayX = array_map(function ($row) {
            return sqrt(array_sum(array_map(function ($col) {
                return pow($col, 2);
            }, $row)));
        }, $matriksTranspose);

        $matriksNormalisasi = collect();

        $dataKriteria = [
            ['type' => 'cost', 'bobot' => 0.35],
            ['type' => 'benefit', 'bobot' => 0.25],
            ['type' => 'benefit', 'bobot' => 0.25],
            ['type' => 'benefit', 'bobot' => 0.15],
        ];

        foreach ($matriks as $index => $row) {
            $dataRow = [];

            foreach ($row as $indexCol => $col) {
                $dataRow[] = ($col / $arrayX[$indexCol]);
            }

            $matriksNormalisasi->push(collect($dataRow));
        }

        $optimasiMatriks = $matriksNormalisasi->map(function ($cols, $rowIndex) use ($dataKriteria) {
            $cols = $cols->map(function ($col, $colIndex) use ($dataKriteria) {
                return $col * $dataKriteria[$colIndex]['bobot'];
            });

            return $cols;
        });

        $matriksY = collect();
        $optimasiMatriks->each(function ($cols, $rowIndex) use ($dataKriteria, $matriksY, $asuransi) {
            $matriksMax = collect();
            $matriksMin = collect();

            $cols->each(function ($col, $colIndex) use ($dataKriteria, $matriksMax, $matriksMin) {
                if ($dataKriteria[$colIndex]['type'] == 'benefit') {
                    return $matriksMax->push($col);
                }

                return $matriksMin->push($col);
            });

            $matriksY->push([
                'alternatif' => $asuransi[$rowIndex]->nama,
                'max' => $matriksMax,
                'min' => $matriksMin,
                'yi' => $matriksMax->sum() - $matriksMin->sum()
            ]);
        });
        $matriksY = $matriksY->sortByDesc('yi');

        return view('pages.pegawai.hitung')
            ->with(compact(
                'pegawai',
                'matriks',
                'matriksNormalisasi',
                'optimasiMatriks',
                'dataKriteria',
                'matriksY',
                'asuransi'
            ));
    }
}
