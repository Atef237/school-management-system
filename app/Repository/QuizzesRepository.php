<?php

namespace App\Repository;

use App\Interfaces\QuizzesRepositoryInterface;
use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Subject;
use App\Models\teachers;

class QuizzesRepository implements QuizzesRepositoryInterface
{

    public function index()
    {
        // return "Quizzes";
        $quizzes = Quizze::all();
        return view('dashboard.Quizze.index',compact('quizzes'));
    }

    public function create()
    {
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = teachers::all();

        return view('dashboard.Quizze.create',$data);

    }

    public function store($request)
    {
       // return $request;

        Quizze::create([
            'name' => ['ar' => $request->Name_ar, 'en' => $request->Name_en],
            'subject_id' => $request->subject_id,
            'grade_id' => $request->Grade_id,
            'school_year_id' => $request->school_year_id,
            'classroom_id' => $request->classroom_id,
            'teacher_id' => $request->teacher_id,
        ]);

        toastr()->success(trans('messages.added'));
        return redirect()->back();

    }

    public function edit($id)
    {
            $quizz = Quizze::findOrFail($id);

        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = teachers::all();

        return view('dashboard.Quizze.edit',$data,compact('quizz'));

    }

    public function update($request)
    {
        // return $request;

        $quizze = Quizze::findOrFail($request->id);

        $quizze->update([
            'name' => ['ar' => $request->Name_ar, 'en' => $request->Name_en],
            'subject_id' => $request->subject_id,
            'grade_id' => $request->Grade_id,
            'school_year_id' => $request->school_year_id,
            'classroom_id' => $request->classroom_id,
            'teacher_id' => $request->teacher_id,
        ]);
        toastr()->success(trans('messages.updated'));
        return redirect()->route('Quizzes.index');

    }

    public function destroy($request)
    {
        // return $request;
        Quizze::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.deleted'));
        return redirect()->route('Quizzes.index');

    }
}
