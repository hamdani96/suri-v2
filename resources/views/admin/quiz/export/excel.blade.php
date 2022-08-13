<table class="table align-items-center mb-0 datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Urutan Ke</th>
            <th>Pertanyaan</th>
            <th>Jawaban (Ya)</th>
            <th>Jawaban (Tidak)</th>
            <th>Status</th>
            <th>Pembuat</th>
            <th>Tanggal dibuat</th>
            <th>Tanggal diedit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($quizs as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>Ke - {{ $item->sequence }}</td>
                <td style="color: #000000">{!! $item->question !!}</td>
                <td>{{ $item->yes }} Poin</td>
                <td>{{ $item->not }} Poin</td>
                <td>
                    @if ($item->status == 'active')
                        Aktif
                    @else
                        Tidak Aktif
                    @endif
                </td>
                <td>{{ $item->relatedCreatedBy->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
