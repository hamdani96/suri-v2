{{-- NEW --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Hasil Kuis</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
    <h4>Data Hasil Kuis</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
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

