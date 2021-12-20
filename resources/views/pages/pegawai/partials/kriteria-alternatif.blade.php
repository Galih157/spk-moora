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
    @foreach($hasil->matriks as $index => $row)
        <tr>
            <th>A{{ $index + 1 }}</th>
            @foreach($row as $col)
                <td>@format_number($col)</td>
            @endforeach
        </tr>
    @endforeach
    <tr>
        <th>Bobot</th>
        @foreach($hasil->matriks[0] as $index => $col)
            <th>{{ $hasil->dataKriteria[$index]['bobot'] }}</th>
        @endforeach
    </tr>
    <tr>
        <th>Optimum</th>
        @foreach($hasil->matriks[0] as $index => $col)
            <th>{{ $hasil->dataKriteria[$index]['type'] == 'benefit' ? 'MAX' : 'MIN'}}</th>
        @endforeach
    </tr>
    </tbody>
</table>
