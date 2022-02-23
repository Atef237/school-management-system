<?php


namespace App\Repository;


use App\Interfaces\StudentPromotionRepositoryInterface;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\student;
use Illuminate\Support\Facades\DB;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface
{

    public function index()
    {
        $Grades  = Grade::all();
        return view('dashboard.students.promotion.index',compact('Grades'));
    }

    public function store($request)
    {
      //  return $request;
        $students = student::where('Grade_id',$request->Grade_id)
                            ->where('school_years_id', $request->schooleYear_id)
                            ->where('Classroom_id',$request->classroom_id)
                            ->where('academic_year',$request->academic_year)
                            ->select('id','Grade_id','school_years_id','Classroom_id','academic_year')->get();
       //  return $students;

        if(count($students) > 0){

            DB::beginTransaction();

                foreach ($students as $student){
                    $ids = explode(',',$student->id);
                    student::whereIn('id',$ids)->update([
                        'Grade_id' => $request->Grade_id_new,
                        'school_years_id' =>$request->schooleYear_id_new,
                        'Classroom_id' => $request->classroom_id_new,
                        'academic_year' => $request->academic_year_new,
                    ]);

                    Promotion::updateOrCreate([
                        'student_id' => $student->id,
                        'from_grade' => $request->Grade_id,
                        'from_classroom' => $request->classroom_id,
                        'from_school_years' => $request->schooleYear_id,
                        'to_grade' => $request->Grade_id_new,
                        'to_classroom'  => $request->classroom_id_new,
                        'to_school_years' => $request->schooleYear_id_new,
                        'from_academic_year' => $request->academic_year,
                        'to_academic_year' => $request->academic_year_new,
                    ]);
                }

            DB::commit();
                toastr()->success(trans('Messages.updated'));
                return redirect()->route('promotion.index');

            DB::rollBack();

            toastr()->error(trans('Messages.general_error'));
            return redirect()->route('index');

        }else{
            toastr()->error(trans('Messages.general_error'));
            return redirect()->route('index');

        }


    }

    public function create()
    {
        $promotions  = Promotion::with('student','f_grade','t_grade','f_school_year','t_school_year','f_classroom','t_classroom')->get();
        return view('dashboard.students.promotion.management',compact('promotions'));
    }

    public function destroy($request)
    {

        if($request->unDo == 1 ){

            // return $request;

            DB::beginTransaction();
            $promotions = Promotion::all();

            foreach ($promotions as $promotion){
                $ids = explode(',',$promotion->student_id);
                student::whereIn('id',$ids)->update([
                    'grade_id'=>$promotion->from_grade,
                    'Classroom_id'=>$promotion->from_classroom,
                    'school_years_id'=> $promotion->from_school_years,
                    'academic_year'=>$promotion->from_academic_year,
                ]);

            }
            Promotion::truncate();

            DB::commit();

            toastr()->success(trans('Messages.updated'));
            return redirect()->route('promotion.index');

            DB::rollBack();

            toastr()->success(trans('Messages.general_error'));
            return redirect()->route('promotion.index');


        }else{

          //  return $request;
            DB::beginTransaction();
                $promotion = Promotion::findOrFail($request->id);

                student::where('id',$promotion->student_id)->update([
                    'grade_id'=>$promotion->from_grade,
                    'Classroom_id'=>$promotion->from_classroom,
                    'school_years_id'=> $promotion->from_school_years,
                    'academic_year'=>$promotion->from_academic_year,
                ]);

                Promotion::destroy($promotion->id);
            DB::commit();
                toastr()->success(trans('Messages.updated'));
                return redirect()->route('promotion.destroy');

            DB::rollBack();
                toastr()->success(trans('Messages.general_error'));
                return redirect()->route('index');

        }

    }
}
