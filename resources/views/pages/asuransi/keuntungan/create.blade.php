@extends('layouts.app')

@section('content-header')
    <div class="container-fluid">
        <h1>Tambah Keuntungan</h1>
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

                        <form id="formKeuntungan" action="{{ route('asuransi.keuntungan.store', $asuransi->id) }}"
                              method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Usia</label>
                                        <input type="number" class="form-control" name="usia_min" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Premi / bln</label>
                                        <input type="number" class="form-control" name="premi" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Jumlah Pencairan</label>
                                        <input type="number" class="form-control" name="jumlah_pencairan" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" required>
                                            <option value="L">Laki - laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary float-right" type="submit" form="formKeuntungan"><i
                                class="fas fa-save"></i> Simpan Keuntungan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
