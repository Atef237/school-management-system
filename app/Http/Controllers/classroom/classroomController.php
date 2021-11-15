<?php

namespace App\Http\Controllers\classroom;

use App\Http\Controllers\Controller;
use App\Http\Requests\classroomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\School_year;
use Illuminate\Http\Request;

class classroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return Classroom::with('schoolYear')->get();
        // return  $classrooms = Classroom::with('schoolYear')->get();

          $Grades = Grade::with('School_years')->get();
       // return $Grades[0]['school_years'];
         $gradesLists = Grade::all();

        return view('dashboard.classroom.index',compact('Grades','gradesLists'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(classroomRequest $request)
    {
       // return $request;

//        if($request->has('status')){
//            $status = 1;
//        }else{
//            $status = 0;
//        }

       $classroom = Classroom::create([
            'name' => ['en' => $request->name_en, 'ar'=>$request->name],
            // 'status' => $status,
            'grade_id' => $request->Grade_id,
            'school_year_id' => $request->school_year_id,
        ]);
       // return $classroom;
        toastr()->success(trans('messages.added'));
        return redirect()->route('classroom.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if(isset($request->status)){
            $request['status'] = 1;
        }else{
            $request['status'] = 0;
        }

       // return $request;

        $classroom = Classroom::find($request->id);

        $classroom->update([
            'name' => ['ar' => $request->name, 'en' => $request->name_en],
            'Grade_id' => $request->Grade_id,
            'school_year_id' => $request->school_year_id,
            'status' => $request->status,

        ]);
        toastr()->success(trans('messages.updated'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        Classroom::findOrFail($request->id)->delete();

        toastr()->error(trans('Messages.deleted'));
        return redirect()->route('classroom.index');
    }

    public function getClasses($id){
        $list_classess = School_year::where('grade_id',$id)->pluck('name','id');

        return $list_classess;
    }
}
