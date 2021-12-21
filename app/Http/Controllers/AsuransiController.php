<?php

namespace App\Http\Controllers;

use App\Http\Requests\Asuransi\StoreRequest;
use App\Http\Requests\Asuransi\UpdateRequest;
use App\Models\Asuransi;
use Illuminate\Http\Request;

class AsuransiController extends Controller
{
    public function index()
    {
        return view('pages.asuransi.index');
    }

    public function create()
    {
        return view('pages.asuransi.show');
    }

    public function store(StoreRequest $request)
    {
        //
    }

    public function update(UpdateRequest $request)
    {
        //
    }
}
