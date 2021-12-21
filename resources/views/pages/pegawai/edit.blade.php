@extends('layouts.app')

@section('content-header')
    <div class="container-fluid">
        <h1>Edit Pegawai</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ $error }}
                            </div>
                        @endforeach

                        <form id="formPegawai" action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" value="{{ $pegawai->nama }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Usia</label>
                                        <input type="number" class="form-control" value="{{ $pegawai->usia }}" name="usia" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Berat Badan</label>
                                        <input type="number" class="form-control" value="{{ $pegawai->berat_badan }}" name="berat_badan">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Tinggi Badan</label>
                                        <input type="number" class="form-control" value="{{ $pegawai->tinggi_badan }}" name="tinggi_badan">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" required>
                                            <option value="L" {{ $pegawai->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki - laki</option>
                                            <option value="P" {{ $pegawai->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary float-right" type="submit" form="formPegawai"><i
                                class="fas fa-save"></i> Simpan Pegawai
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
