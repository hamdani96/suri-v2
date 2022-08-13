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
