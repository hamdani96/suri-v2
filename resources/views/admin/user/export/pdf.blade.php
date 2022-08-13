{{-- NEW --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
    <h4>Data User</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
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
                        <td>
                            @if ($item->relatedDetailUser->position_status == 'freelance')
                                Freelance
                            @elseif ($item->relatedDetailUser->position_status == 'permanent_employee')
                                Karyawan Tetap
                            @elseif ($item->relatedDetailUser->position_status == 'internship')
                                Internship
                            @endif
                        </td>
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
    </div>
    

</body>
</html>

