<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Asuransi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AsuransiController extends Controller
{
    public function index()
    {
        return DataTables::eloquent(Asuransi::query())
            ->addColumn('links', function ($data) {
                return [
                    'show' => route('asuransi.show', $data->id),
                    'keuntungan' => route('asuransi.keuntungan', $data->id),
                    'delete' => route('asuransi.delete', $data->id),
                ];
            })
            ->make(true);
    }
}
