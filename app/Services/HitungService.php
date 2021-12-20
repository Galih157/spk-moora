<?php

namespace App\Services;

use App\Models\Asuransi;
use App\Models\Pegawai;

class HitungService
{
    public $pegawai;
    public $matriks;
    public $dataKriteria;
    public $matriksTranspose;
    public $matriksNormalisasi;
    public $matriksOptimasi;
    public $matriksY;
    public $asuransi;

    public function hitung(Pegawai $pegawai)
    {
        $this->pegawai = $pegawai;

        $this->setKriteria();
        $this->buildMatriks();
        $this->normalisasiMatriks();
        $this->optimasiMatriks();
        $this->hitungMatriksY();

        return $this;
    }

    protected function setKriteria()
    {
        $this->dataKriteria = collect([
            ['type' => 'cost', 'bobot' => 0.35],
            ['type' => 'benefit', 'bobot' => 0.25],
            ['type' => 'benefit', 'bobot' => 0.25],
            ['type' => 'benefit', 'bobot' => 0.15],
        ]);

        return $this;
    }

    public function buildMatriks()
    {
        $pegawai = $this->pegawai;
        $this->asuransi = Asuransi::with(['keuntungan' => function ($query) use ($pegawai) {
            $query->where('usia_min', '<=', $pegawai->usia);
            $query->where('jenis_kelamin', $pegawai->jenis_kelamin);
            $query->orderBy('usia_min', 'DESC');
        }])->get();

        $this->matriks = collect();

        foreach ($this->asuransi as $item) {
            $keuntungan = $item->keuntungan->first();

            $this->matriks->push(collect([
                $keuntungan->premi,
                $item->proses_pencairan,
                $keuntungan->jumlah_pencairan,
                $item->fasilitas,
            ]));
        }

        $this->matriksTranspose = array_map(null, ...$this->matriks->toArray());

        return $this;
    }

    public function normalisasiMatriks()
    {
        $arrayX = array_map(function ($row) {
            return sqrt(array_sum(array_map(function ($col) {
                return pow($col, 2);
            }, $row)));
        }, $this->matriksTranspose);

        $this->matriksNormalisasi = collect();

        foreach ($this->matriks as $index => $row) {
            $dataRow = [];

            foreach ($row as $indexCol => $col) {
                $dataRow[] = ($col / $arrayX[$indexCol]);
            }

            $this->matriksNormalisasi->push(collect($dataRow));
        }

        return $this;
    }

    public function optimasiMatriks()
    {
        $dataKriteria = $this->dataKriteria;

        $this->matriksOptimasi = $this->matriksNormalisasi->map(function ($cols, $rowIndex) use ($dataKriteria) {
            $cols = $cols->map(function ($col, $colIndex) use ($dataKriteria) {
                return $col * $dataKriteria[$colIndex]['bobot'];
            });

            return $cols;
        });

        return $this;
    }

    public function hitungMatriksY()
    {
        $this->matriksY = collect();
        $dataKriteria = $this->dataKriteria;
        $matriksY = $this->matriksY;
        $asuransi = $this->asuransi;

        $this->matriksOptimasi->each(function ($cols, $rowIndex) use ($dataKriteria, $matriksY, $asuransi) {
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

        $this->matriksY = $matriksY->sortByDesc('yi');

        return $this;
    }
}
