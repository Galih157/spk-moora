@extends('layouts.app')

@section('content-header')
    <div class="container-fluid">
        <h1>Daftar Pegawai</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah Pegawai</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="tabelPegawai">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Tinggi Badan</th>
                                <th>Berat Badan</th>
                                <th></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
    <script>
        $(document).ready(function () {
            $('#tabelPegawai').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                responsive: true,
                ajax: {
                    url: "{{ route('ajax.pegawai.index') }}"
                },
                columns: [
                    {data: 'nama'},
                    {data: 'usia'},
                    {data: 'tinggi_badan'},
                    {data: 'berat_badan'},
                    {
                        data: function (row, index) {
                            let buttons = `<a href="${row.links.show}" class="mr-2 btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>`;
                            buttons += `<a href="${row.links.hitung}" class="mr-2 btn btn-success btn-sm"><i class="fas fa-calculator"></i> Hitung</a>`;
                            buttons += `<button data-url="${row.links.delete}" class="mr-2 btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>`;

                            return buttons
                        },
                        searchable: false,
                        orderable: false
                    }
                ]
            });
        });
    </script>
@endpush
