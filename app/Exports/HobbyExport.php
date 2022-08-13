<?php

namespace App\Exports;

use App\Models\Hobby;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class HobbyExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $hobbies = Hobby::orderBy('hobby_name', 'asc')->get();

        return view('admin.hobby.export.excel', compact('hobbies'));
    }
}
