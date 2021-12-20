<div class="card mb-3">
    <div class="card-header">Data</div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th>Premi (C1)</th>
            <th>Proses Pencairan (C2)</th>
            <th>Total Pencairan (C3)</th>
            <th>Fasilitas Asuransi (C4)</th>
        </tr>
        </thead>

        <tbody>
        @foreach($matriks as $index => $row)
            <tr>
                <th>A{{ $index + 1 }}</th>
                @foreach($row as $col)
                    <td>{{ $col }}</td>
                @endforeach
            </tr>
        @endforeach
        <tr>
            <th>Bobot</th>
            @foreach($matriks[0] as $index => $col)
                <th>{{ $dataKriteria[$index]['bobot'] }}</th>
            @endforeach
        </tr>
        <tr>
            <th>Optimum</th>
            @foreach($matriks[0] as $index => $col)
                <th>{{ $dataKriteria[$index]['type'] == 'benefit' ? 'MAX' : 'MIN'}}</th>
            @endforeach
        </tr>
        </tbody>
    </table>
</div>

<div class="card mb-3">
    <div class="card-header">Normalisasi Data</div>

    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>Premi (C1)</th>
            <th>Proses Pencairan (C2)</th>
            <th>Total Pencairan (C3)</th>
            <th>Fasilitas Asuransi (C4)</th>
        </tr>
        </thead>

        <tbody>
        @foreach($matriksNormalisasi as $index => $row)
            <tr>
                <th>A{{ $index + 1 }}</th>
                @foreach($row as $col)
                    <td>{{ $col }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="card mb-3">
    <div class="card-header">Optimasi Matriks</div>

    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>Premi (C1)</th>
            <th>Proses Pencairan (C2)</th>
            <th>Total Pencairan (C3)</th>
            <th>Fasilitas Asuransi (C4)</th>
        </tr>
        </thead>

        <tbody>
        @foreach($optimasiMatriks as $index => $row)
            <tr>
                <th>A{{ $index + 1 }}</th>
                @foreach($row as $col)
                    <td>{{ $col }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="card mb-3">
    <div class="card-header">Mencari Nilai Yi</div>

    <table class="table">
        <thead>
        <tr>
            <th>No</th>
            <th>Alteratif</th>
            <th>Maximum</th>
            <th>Minimum</th>
            <th>Yi</th>
        </tr>
        </thead>

        <tbody>
        @foreach($matriksY->values()->all() as $index => $row)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $row['alternatif']  }}</td>
                <td>{{ $row['max']->sum() }}</td>
                <td>{{ $row['min']->sum() }}</td>
                <td>{{ $row['yi'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
