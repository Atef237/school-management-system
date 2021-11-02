<?php

namespace App\Http\Controllers\Classroom;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::with('grade')->get();
        $grades = Grade::all();
       // return $classrooms;
        return view('dashboard.Classroom.index',compact('grades','classrooms'));

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
    public function store(ClassroomRequest $request)
    {
        // return $request;
         $List_Classes =$request->List_Classes;
        foreach ($List_Classes as $class){
          //  return $class['name'];
            Classroom::create([
                'name' => ['ar' => $class['name'],'en'=>$class['name_en']],
                'grade_id' => $class['Grade_id'],
            ]);
        }
        toastr()->success(trans('Messages.added'));
        return redirect()->back();
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
    public function update(UpdateClassroomRequest $request)
    {
         // return $request;
        $class = Classroom::findOrFail($request->id);
        $class->update([
            'name' => ['ar' => $request->Name,'en'=>$request->Name_en],
            'grade_id' => $request->Grade_id,
        ]);
        toastr()->success(trans('Messages.updated'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // return $request;

        Classroom::findOrFail($request->id)->delete();
        toastr()->error(trans('Messages.deleted'));
        return redirect()->back();
    }

    public function deleteAll(Request $request){
           // return $request;

        $ids = explode(",",$request->delete_all_id);
        Classroom::whereIn('id',$ids)->delete();
        toastr()->error(trans('Messages.deleted'));
        return redirect()->route('classroom.index');
    }


    public function filter(Request $request){
         // return $request;

        $grades = Grade::all();
        $search_class = Classroom::where('grade_id','=',$request->Grade_id)->get();
        return view('dashboard.Classroom.index',compact('grades','search_class'));
    }

}
