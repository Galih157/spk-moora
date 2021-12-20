<table class="table table-striped">
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
    @foreach($hasil->matriksY->values()->all() as $index => $row)
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
