<?php


namespace App\Repository;


use App\Interfaces\StudentFeesRepositoryInterface;
use App\Models\fees;
use App\Models\Grade;
use App\Models\School_year;
use phpDocumentor\Reflection\Types\Compound;

class StudentFeesRepository implements StudentFeesRepositoryInterface
{

    public function index()
    {
         $fees  = fees::with('grade','schooleYear')->get();
        return view('dashboard.fees.index',compact('fees'));
    }

    public function create()
    {
        $Grades = Grade::all();
        return view('dashboard.fees.add',compact('Grades'));
    }

    public function store($request)
    {

        fees::create([
            'title' => ['ar' => $request->title_ar , 'en' => $request->title_en],
            'amount' => $request->amount,
            'grade_id' => $request->Grade_id,
            'schooleYear_id' => $request->schooleYear_id,
            'year' => $request->year,
            'notes' => $request->notes,
            'Fee_type' => $request->Fee_type,
        ]);

        toastr()->success(trans('student.added'));
        return redirect()->route('fees.index');


    }

    public function edit($id)
    {
        $data['fee'] = fees::find($id);
        if($data['fee']){
            $data['Grades'] = Grade::all();
            $data['schooleYears'] = School_year::all();
            return view('dashboard.fees.edit',$data);
        }else{
            toastr()->error(trans('Messages.null_list'));
            return redirect()->route('fees.index');
        }

    }

    public function update($request)
    {
        $fee = fees::findOrfail($request->id)->first();

        if($fee){
            $fee->update([
               'title'  => ['ar' => $request->title_ar , 'en'=>$request->title_en],
                'amount' => $request->amount,
                'grade_id' => $request->Grade_id,
                'schooleYear_id' => $request->schooleYear_id,
                'notes' => $request->notes,
                'year' => $request->year,
                'Fee_type' => $request->Fee_type,
            ]);

            toastr()->success(trans('student.updated'));
            return redirect()->route('fees.index');

        }
    }

    public function destroy($request)
    {
        fees::findOrFail($request->id)->delete();

        toastr()->error(trans('student.deleted'));
        return redirect()->route('fees.index');

    }
}
