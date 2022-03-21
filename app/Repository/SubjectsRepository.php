<?php


namespace App\Repository;
use App\Interfaces\SubjectsRepositoryInterface;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\teachers;

class SubjectsRepository implements SubjectsRepositoryInterface{


    
    public function index(){

          $subjects = Subject::with('grade','School_year','teacher')->get();
          return view('dashboard.subject.index',compact('subjects'));

    }

    public function create(){
        $data['grades'] = Grade::all();
        $data['teachers'] = teachers::all();
        return view('dashboard.subject.create',$data);
    }

    public function store($request){
        // return $request;

        Subject::create([

            'name' => ['en' => $request->name_en, 'ar'=>$request->name_ar],
            'grade_id' => $request->Grade_id,
            'school_year_id' => $request->schooleYear_id,
            'teacher_id' => $request->teacher_id,
        ]);

        toastr()->success(trans('messages.added'));
        return redirect()->route('subject.index');

    }

    public function edit($id){
        // return $id;

        $data['subject'] = Subject::findOrFail($id);
        $data['grades'] = Grade::all();
        $data['teachers'] = teachers::all();

        return view('dashboard.subject.edit',$data);

    }

    public function update($request){

         return $request;

        $subject = Subject::findOrFail($request->id);
        $subject->update([
            'name' => ['en' => $request->name_en, 'ar'=>$request->name_ar],
            'grade_id' => $request->Grade_id,
            'school_year_id' => $request->school_year_id,
            'teacher_id' => $request->teacher_id,
        ]);

        toastr()->success(trans('messages.updated'));
        return redirect()->route('subject.index');

    }


    public function destroy($request){
        // return $request;

        Subject::findOrFail($request->id)->delete();

        toastr()->error(trans('messages.deleted'));
        return redirect()->route('subject.index');
        
    }
}