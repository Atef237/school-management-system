<?php


namespace App\Repository;


use App\Interfaces\StudentGraduatedRepositoryInterface;
use App\Models\Grade;
use App\Models\student;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface
{


    public function index()
    {
        $students = student::onlyTrashed()->with('gender','grade','classroom','schoole_year')->get();
        return view('dashboard.students.Graduate.index',compact('students'));
    }


    public function create()
    {
        $Grades = Grade::all();
        return view('dashboard.students.Graduate.create',compact('Grades'));

    }

    public function softDelete($request)
    {
        // return $request;



        $students = student::where('Grade_id',$request->Grade_id)->where('school_years_id',$request->schooleYear_id)->where('Classroom_id',$request->classroom_id)->get();

        if(count($students) > 0 ){
          //  return $students;

            foreach ($students as $student){
                $id = explode(',',$student->id);
                student::whereIn('id',$id)->Delete(); //softDelete => delete , forceDelete => finale Delete

            }

            toastr()->success(trans('Messages.deleted'));
            return redirect()->route('graduated.index');

        }else{
            toastr()->error(trans('Messages.null_list'));
            return redirect()->route('index');
        }

    }


    public function student_retreat($request)
    {
        student::onlyTrashed()->where('id',$request->id)->first()->restore();

        toastr()->success(trans('student.updated'));
        return redirect()->route('graduated.index');
    }

    public function finalDelete($request)
    {
        student::onlyTrashed()->where('id',$request->id)->first()->forceDelete();

        toastr()->success(trans('student.deleted'));
        return redirect()->route('graduated.index');
    }

}
