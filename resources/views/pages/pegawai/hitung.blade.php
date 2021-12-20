@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                @include('pages.pegawai.partials.pegawai-card', compact('hasil'))
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Kriteria dan Alternatif</div>
                    </div>
                    <div class="card-body">
                        @include('pages.pegawai.partials.kriteria-alternatif')
                    </div>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-4">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#tab-mkeputusan" data-toggle="tab">Matriks
                                    Keputusan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab-normalisasi" data-toggle="tab">Normalisasi Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab-optimasi" data-toggle="tab">Optimasi Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab-nilaiY" data-toggle="tab">Nilai Yi</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-mkeputusan">
                                @include('pages.pegawai.partials.tab-mkeputusan', compact('hasil'))
                            </div>
                            <div class="tab-pane" id="tab-normalisasi">
                                @include('pages.pegawai.partials.tab-normalisasi', compact('hasil'))
                            </div>
                            <div class="tab-pane" id="tab-optimasi">
                                @include('pages.pegawai.partials.tab-optimasi', compact('hasil'))
                            </div>
                            <div class="tab-pane" id="tab-nilaiY">
                                @include('pages.pegawai.partials.tab-nilaiy', compact('hasil'))
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
