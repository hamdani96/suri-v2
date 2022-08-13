<table class="table align-items-center mb-0 datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Hobi</th>
            <th>Pembuat</th>
            <th>Tanggal dibuat</th>
            <th>Tanggal diedit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($hobbies as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->hobby_name }}</td>
                <td>{{ $item->relatedCreatedBy->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
