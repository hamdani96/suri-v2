<table class="table align-items-center mb-0 datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Jabatan</th>
            <th>Pembuat</th>
            <th>Tanggal dibuat</th>
            <th>Tanggal diedit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($positions as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->position_name }}</td>
                <td>{{ $item->relatedCreatedBy->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
