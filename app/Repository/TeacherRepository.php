<?php

namespace App\Repository;
use App\Models\gender;
use App\Models\specialization;
use App\Interfaces\TeacherRepositoryInterface;
use App\Models\teachers;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface{


    public function getAllTeacher(){
       return teachers::with('specialization','genders')->get();
    }

    public function GetSpecialization(){
        return specialization::get();
    }

    public function GetGender(){
        return gender::get();
    }

    public function SaveTeacher($request){

        teachers::create([
            'Email' => $request->Email,
            'Password' => Hash::make($request->password),
            'Name' => ['en'=>$request->Name_en, 'ar' => $request->Name_ar],
            'Specialization_id' => $request->Specialization_id,
            'Gender_id' => $request->Gender_id,
            'Joining_Date' => $request->Joining_Date,
            'Address' => $request->Address,
        ]);
        toastr()->success(trans('Messages.added'));
        return redirect()->route('teacher.create');

    }


    public function editTeacher($id){

      return  $teacher = teachers::with('specialization','genders')->findOrFail($id);


    }

    public function updateTeacher($request){
        $teacher = teachers::findOrFail($request->id);
        $teacher->update([
            'Email' => $request->Email,
            'Password' => Hash::make($request->password),
            'Name' => ['en'=>$request->Name_en, 'ar' => $request->Name_ar],
            'Specialization_id' => $request->Specialization_id,
            'Gender_id' => $request->Gender_id,
            'Joining_Date' => $request->Joining_Date,
            'Address' => $request->Address,
        ]);
        toastr()->success(trans('Messages.updated'));
        return redirect()->route('teacher.index');
    }

    public function DeleteTeacher($request){

        $teacher = teachers::findOrFail($request->id)->delete();
        toastr()->success(trans('Messages.deleted'));
        return redirect()->route('teacher.index');

    }

}
