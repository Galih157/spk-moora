<?php

namespace App\Http\Controllers;

use App\Http\Requests\Asuransi\StoreRequest;
use App\Http\Requests\Asuransi\UpdateRequest;
use App\Models\Asuransi;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class AsuransiController extends Controller
{
    public function index()
    {
        return view('pages.asuransi.index');
    }

    public function create()
    {
        return view('pages.asuransi.create');
    }

    public function show(Asuransi $asuransi)
    {
        return view('pages.asuransi.edit')
            ->with(compact('asuransi'));
    }

    public function store(StoreRequest $request)
    {
        $asuransi = Asuransi::make($request->validated());
        $asuransi->save();

        return redirect()->route('asuransi.index');
    }

    public function update(UpdateRequest $request, Asuransi $asuransi)
    {
        $asuransi->update($request->validated());

        return redirect()->route('asuransi.index');
    }

    public function destroy(Asuransi $asuransi)
    {
        $asuransi->delete();

        return redirect()->back();
    }
}
