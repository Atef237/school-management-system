<?php

namespace App\Repository;
use App\Models\Attachment;
use App\Models\Classroom;
use App\Models\gender;
use App\Models\Grade;
use App\Models\MyParent;
use App\Models\nationalitie;
use App\Models\School_year;
use App\Models\specialization;
use App\Models\student;
use App\Models\teachers;
use App\Models\typeBlood;
use App\Repository\studentRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class studentRepository implements studentRepositoryInterface{


    public function create_student(){
        $data['Genders'] = gender::all();
        $data['parents'] =  MyParent::all();
        $data['nationals'] = nationalitie::all();
        $data['bloods'] = typeBlood::all();
        $data['my_classes'] = Classroom::all();
        $data['grades'] = Grade::all();

        return view('dashboard.students.create',$data);
    }


    public function get_schoole_years($id){
        return $schoole_years = School_year::where( 'grade_id', $id )->pluck('name','id');
    }

    public function get_Classrooms($id){
        return $Classrooms = Classroom::where( 'school_year_id', $id )->pluck('name','id');
    }

    public function saveStudent($request){
        // return $request;

        DB::beginTransaction();

        $student= student::create([

            'name' => ['en' => $request->name_en, 'ar'=>$request->name],
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender_id' => $request->gender_id,
            'nationalitie_id' => $request->nationalitie_id,
            'blood_id' => $request->blood_id,
            'Date_Birth' => $request->Date_Birth,
            'Grade_id' => $request->Grade_id,
            'Classroom_id' => $request->classroom_id,
            'school_years_id' => $request->schooleYear_id,
            'parent_id' => $request->parent_id,
            'academic_year' => $request->academic_year,
        ]);


        if($request->hasfile('photos')){
            foreach ($request->file('photos') as $file){
                $fileName = $file->getClientOriginalName();
                $file->storeAs('attachments/students/'.$student->name,$file->getClientOriginalName(),'upload_attachments');

                Attachment::create([
                    'fileName' => $fileName,
                    'imageable_id' => $student->id,
                    'imageable_type' => 'App\Models\student',
                ]);

            }
        }
        DB::commit();

        toastr()->success(trans('Messages.added'));
        return redirect()->route('student.create');


        DB::rollBack();
        return redirect()->route('student.index');

    }


    public function get_students(){
         $students = student::all();
        return view('dashboard.students.index',compact('students'));
    }

    public function edit_student($id){

        $data['Genders'] = gender::all();
        $data['parents'] =  MyParent::all();
        $data['nationals'] = nationalitie::all();
        $data['bloods'] = typeBlood::all();
        $data['my_classes'] = Classroom::all();
        $data['grades'] = Grade::all();

          $student = student::findOrFail($id);
        return view('dashboard.students.edit',$data,compact('student'));
    }



    public function update_student($request){
        $student = student::findOrFail($request->id);

        $student->update([
            'name' => ['en' => $request->name_en, 'ar'=>$request->name],
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender_id' => $request->gender_id,
            'nationalitie_id' => $request->nationalitie_id,
            'blood_id' => $request->blood_id,
            'Date_Birth' => $request->Date_Birth,
            'Grade_id' => $request->Grade_id,
            'Classroom_id' => $request->classroom_id,
            'school_years_id' => $request->schooleYear_id,
            'parent_id' => $request->parent_id,
            'academic_year' => $request->academic_year,
        ]);

        toastr()->success(trans('messages.updated'));
        return redirect()->route('student.index');
    }


    public function delete_student($id){
       // student::findOrFail($request->id)->delete();
        student::destroy($id);

        toastr()->success(trans('messages.deleted'));
        return redirect()->route('student.index');
    }


}
