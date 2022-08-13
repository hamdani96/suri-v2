<?php

namespace App\Http\Controllers;

use App\Exports\PositionExport;
use App\Models\Position;
use Illuminate\Http\Request;
use Throwable;
use Maatwebsite\Excel\Facades\Excel;

class PositionController extends Controller
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
        $positions = Position::orderBy('created_at', 'desc')->get();

        return view('admin.position.index', compact('positions'));
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
        $validated = $request->validate([
            'position_name' => 'required'
        ]);

        try {
            $position = new Position();
            $position->position_name = $validated['position_name'];
            $position->created_by = auth()->user()->id;
            $position->save();

            $notif = [
                'message'   => 'Jabatan berhasil ditambahkan',
                'title'     => 'Jabatan'
            ];

            return redirect()->back()->with($notif);
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Position::find($id);

        return view('admin.position.edit', compact('position'));
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
        $validated = $request->validate([
            'position_name' => 'required'
        ]);

        try {
            $position = Position::find($id);
            $position->position_name = $validated['position_name'];
            $position->updated_by = auth()->user()->id;
            $position->save();

            $notif = [
                'message'   => 'Jabatan berhasil diupdate',
                'title'     => 'Jabatan'
            ];

            return redirect()->route('position.index')->with($notif);
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
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

    public function delete($id)
    {
        try {
            $position = Position::find($id);
            $position->delete();

            $notif = [
                'message'   => 'Jabatan berhasil dihapus',
                'title'     => 'Jabatan'
            ];

            return redirect()->route('position.index')->with($notif);
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function export()
    {
        return Excel::download(new PositionExport, 'Data Jabatan.xlsx');
    }
}
