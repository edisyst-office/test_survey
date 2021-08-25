<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Survey $survey)
    {
        return view('question.create', compact('survey'));
    }

    public function store(Survey $survey)
    {
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

//        dd(request());
        $question = $survey->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return view('survey.show', compact('survey'));
    }

    public function destroy(Question $question)
    {
        $question->surveyResponses()->delete();
        $question->answers()->delete();
        $question->delete();
        return redirect()->back();
    }
}
