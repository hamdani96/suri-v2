<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Throwable;

class QuizController extends Controller
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
        $quizs = Quiz::orderBy('created_at', 'desc')->get();

        return view('admin.quiz.index', compact('quizs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quiz.create');
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
            'question' => 'required',
            'yes' => 'required',
            'not' => 'required',
            'status' => 'required',
            'sequence' => 'required',
        ]);

        // dd($validated['not']);

        try {
            $quiz = new Quiz();
            $quiz->question = $validated['question'];
            $quiz->yes      = $validated['yes'];
            $quiz->not       = $validated['not'];
            $quiz->status   = $validated['status'];
            $quiz->sequence = $validated['sequence'];
            $quiz->description = $request->description;
            $quiz->created_by   = auth()->user()->id;
            $quiz->save();

            $notif = [
                'message' => 'Kuis Berhasil Di Simpan',
                'title' => 'Kuis'
            ];

            return redirect()->route('quiz.index')->with($notif);
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
        $quiz = Quiz::findOrFail($id);

        return view('admin.quiz.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);

        return view('admin.quiz.edit', compact('quiz'));
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
            'question' => 'required',
            'yes' => 'required',
            'not' => 'required',
            'status' => 'required',
            'sequence' => 'required',
        ]);

        try {
            $quiz = Quiz::find($id);
            $quiz->question = $validated['question'];
            $quiz->yes      = $validated['yes'];
            $quiz->not       = $validated['not'];
            $quiz->status   = $validated['status'];
            $quiz->sequence = $validated['sequence'];
            $quiz->description = $request->description;
            $quiz->updated_by   = auth()->user()->id;
            $quiz->save();

            $notif = [
                'message' => 'Kuis Berhasil Di Update',
                'title' => 'Kuis'
            ];

            return redirect()->route('quiz.index')->with($notif);
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
            $quiz = Quiz::find($id);
            $quiz->delete();

            $notif = [
                'message' => 'Kuis Berhasil Di Hapus',
                'title' => 'Kuis'
            ];

            return redirect()->route('quiz.index')->with($notif);
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
