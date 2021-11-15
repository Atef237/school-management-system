<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
        $grades = Grade::all();
        return view('dashboard.grades.index',compact('grades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(GradeRequest $request)
  {
        // return $request;

//      if(Grade::where('name','=',$request->name)->orWhere('name->en','=',$request->name_en)->get()){
//          toastr()->error(trans('Messages.name-exists'));
//          return redirect()->route('grades.index');
//
//
//      }

      $grade = new Grade();
      $grade->name = ['en' => $request->name_en, 'ar'=>$request->name];
      $grade->notes = $request->notes;
      $grade->save();
      toastr()->success(trans('Messages.added'));

      return redirect()->route('grades.index');

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(GradeRequest $request)
  {

      // return $request;
//      $grade = Grade::findOrFail($request->id);
//      $grade->update([
//            $grade->name = ['en' => $request->name_en, 'ar'=>$request->name],
//            $grade->notes = $request->notes,
//      ]);
//
//      toastr()->success(trans('Messages.updated'));
//      return redirect()->back();

      $Grades = Grade::findOrFail($request->id);
      $Grades->update([
          'name' => ['ar' => $request->name, 'en' => $request->name_en],
          'notes' => $request->notes,
      ]);
      toastr()->success(trans('messages.updated'));
      return redirect()->back();

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
        // return $request;
      $grade = Grade::findOrFail($request->id);
     if($grade){
         if(count($grade->School_years)>0){
             toastr()->error(trans('messages.error-deleted'));
             return redirect()->back();
         }else{
             $grade->delete();
             toastr()->error(trans('messages.deleted'));
             return redirect()->back();
         }
     }else{
         toastr()->error(trans('messages.not-exist'));
         return redirect()->back();
     }



  }

}

?>
