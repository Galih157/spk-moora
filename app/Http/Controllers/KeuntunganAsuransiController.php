<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeuntunganAsuransi\StoreRequest;
use App\Http\Requests\KeuntunganAsuransi\UpdateRequest;
use App\Models\Asuransi;
use App\Models\KeuntunganAsuransi;
use Illuminate\Http\Request;

class KeuntunganAsuransiController extends Controller
{
    public function index(Asuransi $asuransi)
    {
        $keuntungan = $asuransi->keuntungan;

        return view('pages.asuransi.keuntungan.index')
            ->with(compact('asuransi', 'keuntungan'));
    }

    public function show(Asuransi $asuransi, KeuntunganAsuransi $keuntungan)
    {
        return view('pages.asuransi.keuntungan.edit')
            ->with(compact('asuransi', 'keuntungan'));
    }

    public function create(Asuransi $asuransi)
    {
        return view('pages.asuransi.keuntungan.create')->with(compact('asuransi'));
    }

    public function store(Asuransi $asuransi, StoreRequest $request)
    {
        $keuntungan = $asuransi->keuntungan()->make($request->validated());
        $keuntungan->save();

        return redirect()->route('asuransi.keuntungan', ['asuransi' => $asuransi->id]);
    }

    public function update(Asuransi $asuransi, KeuntunganAsuransi $keuntungan, UpdateRequest $request)
    {
        $keuntungan->update($request->validated());

        return redirect()->route('asuransi.keuntungan');
    }

    public function destroy(Asuransi $asuransi, KeuntunganAsuransi $keuntungan)
    {
        $keuntungan->delete();

        return redirect()->back();
    }
}
