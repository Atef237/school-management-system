<?php

namespace App\Http\Controllers\school_years;

use App\Http\Controllers\Controller;
use App\Http\Requests\school_yearsRequest;
use App\Http\Requests\UpdatesSchool_yearsRequestRequest;
use App\Models\School_year;
use App\Models\Grade;
use Illuminate\Http\Request;

class school_yearsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $grades = Grade::all();
          $School_years = School_year::with('grade')->get();
       // return $classroom;
        return view('dashboard.School_years.index',compact('grades','School_years'));

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
    public function store(school_yearsRequest $request)
    {
        // return $request;
         $ListSchoolYears =$request->ListSchoolYears;
        foreach ($ListSchoolYears as $year){
          //  return $year['name'];
            School_year::create([
                'name' => ['ar' => $year['name'],'en'=>$year['name_en']],
                'grade_id' => $year['Grade_id'],
            ]);
        }
        toastr()->success(trans('Messages.added'));
        return redirect()->route('school_year.index');
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
    public function update(UpdatesSchool_yearsRequestRequest $request)
    {
         // return $request;
        $year = School_year::findOrFail($request->id);
        $year->update([
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

        School_year::findOrFail($request->id)->delete();
        toastr()->error(trans('Messages.deleted'));
        return redirect()->back();
    }

    public function deleteAll(Request $request){
           // return $request;

        $ids = explode(",",$request->delete_all_id);
        School_year::whereIn('id',$ids)->delete();
        toastr()->error(trans('Messages.deleted'));
        return redirect()->route('school_year.index');
    }


    public function filter(Request $request){
         // return $request;

        $grades = Grade::all();
        $search_class = School_year::where('grade_id','=',$request->Grade_id)->get();
        return view('dashboard.School_years.index',compact('grades','search_class'));
    }

}
