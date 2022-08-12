<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\DetailAnalysis;
use App\Models\Quiz;
use App\Models\Training;
use App\Models\TrainingAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $quizs = Quiz::where('status', 'active')->orderBy('sequence', 'asc')->get();

        return view('home', compact('quizs'));
    }

    // store quiz
    public function storeQuiz(Request $request)
    {
        $this->middleware('auth');

        $quizs = Quiz::where('status', 'active')->orderBy('sequence', 'asc')->get();

        $analysis = new Analysis();
        $analysis->user_id = Auth::user()->id;
        $analysis->created_by = Auth::user()->id;
        $analysis->save();

        foreach($quizs as $item) {
            $detailAnalysis = new DetailAnalysis();
            $detailAnalysis->analysis_id = $analysis->id;
            $detailAnalysis->quiz_id = $item->id;
            $detailAnalysis->score   = $request->get('answer-'.$item->id);
            $detailAnalysis->created_by = Auth::user()->id;
            $detailAnalysis->save();
        }

        $detailAnalysisCount = DetailAnalysis::where('analysis_id', $analysis->id)->sum('score');

        Analysis::where('id', $analysis->id)->update([
            'score' => $detailAnalysisCount,
        ]);

        $trainings = Training::where('start_score', '<=', $detailAnalysisCount)->where('end_score', '>=', $detailAnalysisCount)->get();

        foreach ($trainings as $training) {
            $trainingAnalysis = new TrainingAnalysis();
            $trainingAnalysis->analysis_id = $analysis->id;
            $trainingAnalysis->training_id = $training->id;
            $trainingAnalysis->created_by = Auth::user()->id;
            $trainingAnalysis->save();
        }

        return redirect()->route('resultAnalysis', $analysis->id);
    }

    public function resultAnalysis($id)
    {
        $analysis = Analysis::find($id);
        // dd($analysis);

        return view('user.result-analysis', compact('analysis'));
    }

    public function hisotryAnalysisQuiz()
    {
        $this->middleware('auth');

        $analysis = Analysis::where('user_id', auth()->user()->id)->get();

        return view('user.history-analysis', compact('analysis'));
    }
}
