<table class="table table-striped">
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
    @foreach($hasil->matriks as $index => $row)
        <tr>
            <th>A{{ $index + 1 }}</th>
            @foreach($row as $col)
                <td>{{ $col }}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
