<table class="table table-striped">
    <thead>
    <tr>
        <th>Rank</th>
        <th>Alteratif</th>
        <th>Maximum</th>
        <th>Minimum</th>
        <th>Yi</th>
    </tr>
    </thead>

    <tbody>
    @foreach($hasil->matriksY->values()->all() as $index => $row)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $row['alternatif']  }}</td>
            <td>{{ number_format($row['max']->sum(), 3) }}</td>
            <td>{{ number_format($row['min']->sum(), 3) }}</td>
            <td>{{ number_format($row['yi'], 3) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
