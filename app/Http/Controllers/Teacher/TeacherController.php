<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\teacherRequest;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class teacherController extends Controller
{

    protected $teacher;

    public function __construct(TeacherRepositoryInterface $Teacher){
        $this->teacher = $Teacher;
    }



    public function index()
    {
        $Teachers = $this->teacher->getAllTeacher();

        return view('dashboard.teachers.index',compact('Teachers'));
    }

    public function create()
    {
        $specializations = $this->teacher->GetSpecialization();
        $genders = $this->teacher->GetGender();
        return view('dashboard.teachers.create',compact('specializations','genders'));

    }


    public function store(teacherRequest $request)
    {
        return $this->teacher->SaveTeacher($request);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $specializations = $this->teacher->GetSpecialization();
        $Teacher  = $this->teacher->editTeacher($id);
        $genders = $this->teacher->GetGender();

        return view('dashboard.teachers.edit',compact('Teacher','genders','specializations'));
    }


    public function update(teacherRequest $request, $id)
    {
        return $this->teacher->updateTeacher($request);
    }


    public function destroy(Request $request)
    {
        return $this->teacher->DeleteTeacher($request);
    }
}


