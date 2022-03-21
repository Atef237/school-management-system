<?php

namespace App\Repository;
use App\Interfaces\ExamRepositoryInterface;
use App\Models\exam;

class ExamRepository implements ExamRepositoryInterface
{

    public function index()
    {
        // return "index";

        $exams = exam::all();
        return view('dashboard.Exam.index',compact('exams'));
    }

    public function create()
    {
        return view('dashboard.Exam.create');
    }

    public function store($request)
    {
         // return $request;

//        $exam = new exam();
//        $exam->name = ['ar' => $request->Name_ar, 'en'=>$request->Name_en];
//        $exam->term = $request->term;
//        $exam->academic_year = $request->academic_year;
//        $exam->save();
//

        exam::create([
            'name' => ['ar' => $request->Name_ar, 'en'=>$request->Name_en],
            'term' => $request->term,
            'academic_year' => $request->academic_year,
        ]);

        toastr()->success(trans('Message.added'));
        return redirect()->route('exam.index');

    }

    public function edit($id)
    {
       // return $id;
        $exam = exam::findOrFail($id);
        return view('dashboard.Exam.edit',compact('exam'));
    }

    public function update($request)
    {
       // return $request;
        $exam = exam::findOrFail($request->id);
        $exam->update([
            'name' => ['ar' => $request->Name_ar, 'en'=>$request->Name_en],
            'term' => $request->term,
            'academic_year' => $request->academic_year,
        ]);
        toastr()->success(trans('Message.updated'));
        return redirect()->route('exam.index');
    }

    public function destroy($request)
    {
        exam::findOrFail($request->id)->delete();
        toastr()->error(trans('Message.deleted'));
        return redirect()->route('exam.index');
    }
}
