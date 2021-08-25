<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        dd($request);
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

//        dd(request());
        $question = $survey->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return view('survey.show', compact('survey'));
    }

    public function destroy(Answer $question)
    {
        dd(request());
        $question->surveyResponses()->delete();
        $question->answers()->delete();
        $question->delete();
        return redirect()->back();
    }
}
