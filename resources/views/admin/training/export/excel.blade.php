<table class="table align-items-center mb-0 datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Pelatihan</th>
            <th>Start Score</th>
            <th>End Score</th>
            <th>Deskripsi</th>
            <th>Pembuat</th>
            <th>Tanggal dibuat</th>
            <th>Tanggal diedit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trainings as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->training_title }}</td>
                <td>{{ $item->start_score }}</td>
                <td>{{ $item->end_score }}</td>
                <td style="color: #000000">{!! $item->training_description !!}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
