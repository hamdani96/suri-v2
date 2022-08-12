<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use Illuminate\Http\Request;
use Throwable;

class HobbyController extends Controller
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
        $hobbies = Hobby::orderBy('created_at', 'desc')->get();
        return view('admin.hobby.index', compact('hobbies'));
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
            'hobby_name'    => 'required',
        ]);

        try {
            $hobi = new Hobby();
            $hobi->hobby_name   = $validated['hobby_name'];
            $hobi->created_by   = auth()->user()->id;
            $hobi->save();

            $notif = [
                'message'   => 'Hobi berhasil ditambahkan',
                'title'     => 'success'
            ];

            return redirect()->back()->with($notif);
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Tambah Data Gagal '. $e->getMessage());
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
        $hobby = Hobby::find($id);

        return view('admin.hobby.edit', compact('hobby'));
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
            'hobby_name'    => 'required',
        ]);

        try {
            $hobi = Hobby::find($id);
            $hobi->hobby_name   = $validated['hobby_name'];
            $hobi->updated_by   = auth()->user()->id;
            $hobi->save();

            $notif = [
                'message'   => 'Hobi berhasil diupdate',
                'title'     => 'success'
            ];

            return redirect()->route('hobby.index')->with($notif);
        } catch(Throwable $e) {
            return redirect()->back()->with('error', 'Update Gagal '. $e->getMessage());
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
            $hobby = Hobby::find($id);
            $hobby->delete();

            $notif = [
                'message'   => 'Hobi berhasil dihapus',
                'title'     => 'success'
            ];

            return redirect()->route('hobby.index')->with($notif);
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Delete Gagal '. $e->getMessage());
        }
    }
}
