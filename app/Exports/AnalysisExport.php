<?php

namespace App\Exports;

use App\Models\Analysis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AnalysisExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $analysis = Analysis::orderBy('created_at', 'desc')->get();

        return view('admin.analysis.export.excel', compact('analysis'));
    }
}
