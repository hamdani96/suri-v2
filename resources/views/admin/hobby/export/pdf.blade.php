{{-- NEW --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Hobi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
    <h4>Data Hobi</h4>
    <table class="table table-bordered table-striped">
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

</body>
</html>

