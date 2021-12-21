@extends('layouts.app')

@section('content-header')
    <div class="container-fluid">
        <h1>Daftar Asuransi</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <a href="{{ route('asuransi.create') }}" class="btn btn-primary">Tambah Asuransi</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="tabelAsuransi">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Fasilitas</th>
                                <th>Proses Pencairan</th>
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
            $('#tabelAsuransi').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                responsive: true,
                ajax: {
                    url: "{{ route('ajax.asuransi.index') }}"
                },
                columns: [
                    {data: 'nama'},
                    {data: 'fasilitas'},
                    {data: 'proses_pencairan'},
                    {
                        data: function (row, index) {
                            let buttons = `<a href="${row.links.show}" class="mr-2 btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>`;
                            buttons += `<a href="${row.links.keuntungan}" class="mr-2 btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Keuntungan</a>`;
                            buttons += `<form style="display: inline" method="POST" action="${row.links.delete}">`
                            buttons += `@csrf`
                            buttons += `<button type="submit" class="mr-2 btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>`;
                            buttons += `</form>`

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
