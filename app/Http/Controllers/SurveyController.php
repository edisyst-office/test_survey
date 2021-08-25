<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function __construct()
    {
        //POSSO COMPILARE UN QUESTIONARIO DA SLOGGATO
        $this->middleware('auth')->except([
            'take',
            'takeStore'
        ]);
    }

    public function create()
    {
        return view('survey.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $survey = auth()->user()->surveys()->create($data);
        return view('survey.show', compact('survey'));
    }

    public function show(Survey $survey)
    {
        return view('survey.show', compact('survey'));
    }

    public function take(Survey $survey)
    {
        return view('survey.take', compact('survey'));
    }

    public function takeStore(Survey $survey, Request $request)
    {
        $data = request()->validate([
            'info.name' => 'required',
            'info.email' => 'required|email',
            'responses.*.question_id' => 'required',
            'responses.*.answer_id' => 'required',
        ]);

        $surveyCompilation = $survey->surveyCompilations()->create($data['info']);
        $surveyCompilation->surveyResponses()->createMany($data['responses']);

        return view('survey.thank-you');
    }

    public function destroy(Survey $survey)
    {
       foreach($survey->questions as $question)
       {
           foreach ($question->answers as $answer)
           {
               $answer->surveyResponses()->delete();
           }
           $question->answers()->delete();
       }
       $survey->questions()->delete();

       $survey->surveyCompilations()->delete();
       $survey->delete();
       return redirect()->back();
    }
}
