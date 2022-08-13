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
                <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMM Y') }}</td>
                <td>
                    @if ($item->updated_at != null)
                        {{ \Carbon\Carbon::parse($item->updated_at)->isoFormat('dddd, D MMM Y') }}
                    @else
                    -
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
