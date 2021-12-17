@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Data Pegawai</div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-3"><strong>Nama</strong></div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-8">{{ $pegawai->nama }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3"><strong>Usia</strong></div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-8">{{ $pegawai->usia }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3"><strong>Tinggi Badan</strong></div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-8">{{ $pegawai->tinggi_badan }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3"><strong>Berat Badan</strong></div>
                            <div class="col-lg-1">:</div>
                            <div class="col-lg-8">{{ $pegawai->berat_badan }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
