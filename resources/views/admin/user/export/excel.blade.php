<table class="table align-items-center mb-0 datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Hobi</th>
            <th>Jabatan</th>
            <th>Status Jabatan</th>
            <th>Tanggal dibuat</th>
            <th>Tanggal diedit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->relatedDetailUser->relatedHobby->hobby_name }}</td>
                <td>{{ $item->relatedDetailUser->relatedPosition->position_name }}</td>
                <td>{{ $item->relatedDetailUser->position_status }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
