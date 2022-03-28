<?php

namespace App\Repository;

use App\Interfaces\questionRepositoryInterface;
use App\Models\Question;
use App\Models\Quizze;

class questionRepository implements questionRepositoryInterface
{

    public function index()
    {
        $data['questions'] = Question::all();
        return view('dashboard.question.index',$data);
    }

    public function create()
    {
        $data['quizzes'] = Quizze::with('quizze')->get();
        return view('dashboard.question.create',$data);

    }

    public function store($request)
    {
        // return $request;
        Question::create([
            'title' => ['ar'=>$request->title_ar,'en'=>$request->title_en],
            'answers' => ['ar'=>$request->answers_ar,'en'=>$request->answers_en],
            'right_answer' => ['ar'=>$request->right_ar,'en'=>$request->right_en],
            'score' => $request->score,
        ]);
        toastr()->success(trans('added'));
        return redirect()->route('questions.create');
    }

    public function edit($id)
    {
        $data['question'] = Question::findOrFail($id);
        $data['quizzes'] = Question::all();

        return view('dashboard.question.edit',$data);
    }

    public function update($request)
    {

        $question = Question::findOrFail($request->id);
       $question->update([
           'title' => ['ar'=>$request->title_ar,'en'=>$request->title_en],
           'answers' => ['ar'=>$request->answers_ar,'en'=>$request->answers_en],
           'right_answer' => ['ar'=>$request->right_ar,'en'=>$request->right_en],
           'score' => $request->score,
       ]);
        toastr()->success(trans('updated'));
        return redirect()->route('questions.index');

    }

    public function destroy($request)
    {
       // return $request;

        Question::findOrFail($request->id)->delete();

        toastr()->error(trans('deleted'));
        return redirect()->route('questions.index');

    }
}
