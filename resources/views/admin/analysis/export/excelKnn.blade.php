<table class="table align-items-center mb-0 datatable">
    <thead>
        <tr>
            <th></th>
            <th>Score</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 3;
        @endphp
        <tr>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td>1</td>
            <td>0</td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
        </tr>
        @foreach ($analysis as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->score }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
