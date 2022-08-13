<table class="table align-items-center mb-0 datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Tgl</th>
            <th>Nama User</th>
            <th>Email</th>
            <th>Score</th>
            <th>Pelatihan Yg Cocok</th>
            <th>Tanggal dibuat</th>
            <th>Tanggal diedit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($analysis as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMM Y') }}</td>
                <td>{{ $item->relatedUser->name }}</td>
                <td>{{ $item->relatedUser->email }}</td>
                <td>Score {{ $item->score }}</td>
                <td>
                    <ul>
                        @foreach ($item->relatedTrainingAnalysis as $training)
                            <li>{{ $loop->iteration }}. {{ $training->relatedTraining->training_title }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
