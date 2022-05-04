<?php

namespace App\Repository;

use App\Http\Traits\MeetingZoom;
use App\Interfaces\OnlineClassRepositoryInterface;
use App\Models\Grade;
use App\Models\Online_class;
use Illuminate\Support\Facades\Auth;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineClassRepository implements OnlineClassRepositoryInterface
{
use MeetingZoom;
    public function index()
    {
        $data['online_classes'] = Online_class::all();
        return view('dashboard.online_classes.index',$data);
    }

    public function create(){

        $data['Grades'] = Grade::all();
        return view('dashboard.online_classes.create',$data);

    }

    public function store($request){

        $meeting = $this->createMeeting($request);       // create meeting in zoom website
        try {
            Online_class::create([                      // save meeting info from database
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->classroom_id,
                'school_year_id' => $request->schooleYear_id,
                'user_id' => 1,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);

            toastr()->success(trans('messages.success'));
            return redirect()->route('online-classes-index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }


    public function destroy($request)
    {
        $this->deleteMeeting($request);                              // delete form zoom

        Online_class::where('meeting_id',$request->id)->delete();  //delete from database

        toastr()->error(trans('messages.deleted'));          // message

        return redirect()->route('online-classes-index'); //return
    }
}
