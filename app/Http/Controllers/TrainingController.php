<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Throwable;

class TrainingController extends Controller
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
        $trainings = Training::orderBy('created_at', 'desc')->get();

        return view('admin.training.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.training.create');
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
            'training_title'        => 'required',
            'training_description'  => 'required',
            'start_score'           => 'required',
            'end_score'             => 'required',
        ]);

        try {
            if($request->image != '') {
                $image = $request->file('image');
                $filename = $image->hashName();
                $image->move('training_image', $filename);
            }else {
                $filename = null;
            }

            Training::create([
                'training_title'        => $validated['training_title'],
                'training_description'  => $validated['training_description'],
                'start_score'           => $validated['start_score'],
                'end_score'             => $validated['end_score'],
                'image'                 => $filename,
                'created_by'            => auth()->user()->id,
            ]);

            $notif = [
                'message'   => 'Pelatihan berhasil ditambahkan',
                'title'     => 'Pelatihan'
            ];

            return redirect()->route('training.index')->with($notif);
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
        $training = Training::findOrFail($id);

        return view('admin.training.show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $training = Training::find($id);

        return view('admin.training.edit', compact('training'));
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
            'training_title'        => 'required',
            'training_description'  => 'required',
            'start_score'           => 'required',
            'end_score'             => 'required',
        ]);

        try {
            $training = Training::find($id);

            if($request->image != '') {
                $image = $request->file('image');
                $filename = $image->hashName();
                $image->move('training_image', $filename);
            }else {
                $filename = $training->image;
            }

            Training::where('id', $id)->update([
                'training_title'        => $validated['training_title'],
                'training_description'  => $validated['training_description'],
                'start_score'           => $validated['start_score'],
                'end_score'             => $validated['end_score'],
                'image'                 => $filename,
                'updated_by'            => auth()->user()->id,
            ]);

            $notif = [
                'message'   => 'Pelatihan berhasil diupdate',
                'title'     => 'Pelatihan'
            ];

            return redirect()->route('training.index')->with($notif);
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
            $training = Training::find($id);
            $training->delete();

            $notif = [
                'message'   => 'Pelatihan berhasil dihapus',
                'title'     => 'Pelatihan'
            ];

            return redirect()->route('training.index')->with($notif);
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
