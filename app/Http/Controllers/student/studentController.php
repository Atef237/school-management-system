<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStudentSave;
use App\Interfaces\studentRepositoryInterface;
use Illuminate\Http\Request;

class studentController extends Controller
{
    protected $student;
    public function __construct(studentRepositoryInterface $student){
        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "index";

        return $this->student->get_students();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->student->create_student();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStudentSave $request)
    {
        // return $request;
        return $this->student->saveStudent($request);
      //  return $this->student->create_student();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->student->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->student->edit_student($id);
    }


    public function update(Request $request)
    {
        return $this->student->update_student($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // return $id;
        return $this->student->delete_student($id);
    }

    public function shooleYear($id)
    {
        return $this->student->get_schoole_years($id);
    }

    public function Classrooms($id)
    {
        return $this->student->get_Classrooms($id);
    }

    public function Upload_attachment(Request $request){
        // return $request;
         return $this->student->Upload_attachment($request);
    }

    public function Download_attachment($studentName, $fileName){
        return $this->student->Download_attachement($studentName, $fileName);
    }

    public function delete_attch(Request $request){
        return $this->student->delete_attachment($request);
    }
}
