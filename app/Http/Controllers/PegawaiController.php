<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pegawai\StoreRequest;
use App\Http\Requests\Pegawai\UpdateRequest;
use App\Models\Pegawai;
use App\Services\HitungService;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    protected $hitungService;

    /**
     * @param $hitungService
     */
    public function __construct(HitungService $hitungService)
    {
        $this->hitungService = $hitungService;
    }

    public function index()
    {
        $listPegawai = Pegawai::all();

        return view('pages.pegawai.index')
            ->with(compact('listPegawai'));
    }

    public function show(Pegawai $pegawai)
    {
        return view('pages.pegawai.edit')
            ->with(compact('pegawai'));
    }

    public function create()
    {
        return view('pages.pegawai.create');
    }

    public function store(StoreRequest $request)
    {
        $pegawai = Pegawai::make($request->validated());
        $pegawai->save();

        return redirect()->route('pegawai.index');
    }

    public function update(UpdateRequest $request, Pegawai $pegawai)
    {
        $pegawai->update($request->validated());

        return redirect()->route('pegawai.show', $pegawai->id);
    }

    public function hitung(Pegawai $pegawai)
    {
        return view('pages.pegawai.hitung')
            ->with(['hasil' => $this->hitungService->hitung($pegawai)]);
    }
}
