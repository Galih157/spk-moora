<table class="table">
    <thead>
    <tr>
        <th></th>
        <th>C1</th>
        <th>C2</th>
        <th>C3</th>
        <th>C4</th>
    </tr>
    </thead>

    <tbody>
    @foreach($hasil->matriksOptimasi as $index => $row)
        <tr>
            <th>A{{ $index + 1 }}</th>
            @foreach($row as $col)
                <td>{{ number_format($col, 3) }}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
