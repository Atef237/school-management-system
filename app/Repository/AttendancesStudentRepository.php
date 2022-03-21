<?php


namespace App\Repository;
use App\Interfaces\AttendancesStudentRepositoryInterface;
use App\Models\Attendance;
use App\Models\Grade;
use App\Models\student;
use App\Models\teachers;


class AttendancesStudentRepository implements AttendancesStudentRepositoryInterface
{

    public function index()
    {
        $data['Grades'] = Grade::with('School_years')->get();
        $data['teachers'] = teachers::all();
        return view('dashboard.Attendance.index',$data);
    }

    public function show($id)
    {
        // return $id;
        $students = student::with('attendance')->where('Classroom_id',$id)->get();
        return view('dashboard.Attendance.Section',compact('students'));
    }

    public function store($request){
        // return $request;
        foreach ($request->attendences as $studentID => $attendence){
            if($attendence == 'presence'){
                $attendence_status = 1;
            }else{
                $attendence_status = 0;
            }

            Attendance::create([
                'student_id' => $request->student_id,
                ''
            ]);

        }





    }

    public function edit($request)
    {
        // TODO: Implement edit() method.
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function destroy($request)
    {
        // TODO: Implement destroy() method.
    }
}
