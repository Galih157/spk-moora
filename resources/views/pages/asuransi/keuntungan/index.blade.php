@extends('layouts.app')

@section('content-header')
    <div class="container-fluid">
        <h1>Keuntungan {{ $asuransi->nama }}</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <a href="{{ route('asuransi.keuntungan.create', $asuransi->id) }}" class="btn btn-primary">Tambah
                                Keuntungan</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="tabelKeuntungan">
                            <thead>
                            <tr>
                                <th>Usia</th>
                                <th>Jenis Kelamin</th>
                                <th>Premi / bln</th>
                                <th>Total Pencairan</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($keuntungan as $keunt)
                                <tr>
                                    <td>{{ $keunt->usia_min }}</td>
                                    <td>{{ $keunt->jenis_kelamin }}</td>
                                    <td>{{ $keunt->premi }}</td>
                                    <td>{{ $keunt->jumlah_pencairan }}</td>
                                    <td>
                                        <a href="{{ route('asuransi.keuntungan.show', ['asuransi' => $asuransi->id, 'keuntungan' => $keunt->id]) }}"
                                           class="mr-2 btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i>
                                            Edit</a>
                                        <form style="display: inline" method="POST"
                                              action="{{ route('asuransi.keuntungan.delete', [$asuransi->id, $keunt->id]) }}">
                                            @csrf
                                            <button type="submit" class="mr-2 btn btn-danger btn-sm"><i
                                                    class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
    <script>
        jQuery(function () {
            $('#tabelKeuntungan').DataTable();
        });
    </script>
@endpush
