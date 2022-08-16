<?php

namespace App\Http\Controllers;

use App\Exports\AnalysisExport;
use App\Exports\AnalysisKnnExport;
use App\Models\Analysis;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\PDF;

class AnalysisController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analysis = Analysis::orderBy('created_at', 'desc')->get();

        return view('admin.analysis.index', compact('analysis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $analysis = Analysis::findOrFail($id);

        return view('admin.analysis.show', compact('analysis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export()
    {
        return Excel::download(new AnalysisExport, 'Data Hasil Kuis.xlsx');
    }

    public function exportKnn()
    {
        return Excel::download(new AnalysisKnnExport, 'hasil_kuis.csv');
    }

    public function export_pdf()
    {
        $analysis = Analysis::orderBy('created_at', 'desc')->get();

        $pdf = PDF::loadView('admin.analysis.export.pdf', compact('analysis'));

        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Data Hasil Kuis.pdf');
    }
}
