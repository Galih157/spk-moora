<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PegawaiController extends Controller
{
    public function index()
    {
        return DataTables::eloquent(Pegawai::query())
            ->addColumn('links', function ($data) {
                return [
                    'show' => route('pegawai.show', $data->id),
                    'hitung' => route('pegawai.hitung', $data->id),
                    'delete' => route('pegawai.delete', $data->id),
                ];
            })
            ->make(true);
    }
}
