<?php


namespace App\Repository;
use App\Interfaces\ProcessingFeeRepositoryInterface;
use App\Models\ProcessingFee;
use App\Models\student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;


class ProcessingFeeRepository implements ProcessingFeeRepositoryInterface
{


    public function index()
    {
        $ProcessingFees = ProcessingFee::all();
        return view('dashboard.ProcessingFee.index',compact('ProcessingFees'));
    }

    public function edit($id)
    {
        $ProcessingFee  = ProcessingFee::findOrFail($id);
        return view('dashboard.ProcessingFee.edit',compact('ProcessingFee'));
    }

    public function destroy($request)
    {
        ProcessingFee::destroy($request->id);
        toastr()->success('destroyed');
        return redirect()->route('ProcessingFee.index');

    }

    public function show($id)
    {
         $student = student::with('student_account')->findOrFail($id);
        return view('dashboard.ProcessingFee.create',compact('student'));
    }

    public function store($request)
    {
       // return $request;

        DB::beginTransaction();
              $ProcessingFee =  ProcessingFee::create([

                    'date' => date('Y-m-d'),
                    'student_id' => $request->student_id,
                    'amount' => $request->debit,
                    'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],

                ]);

              StudentAccount::create([
                  'date' => date('Y-m-d'),
                  'type' => 'ProcessingFee',
                  'student_id' => $request->student_id,
                  'Processing_fee_id' => $ProcessingFee->id,
                  'debit' => 0.00,
                  'credit' => $request->debit,
                  'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],

              ]);
        DB::commit();
            toastr()->success('done');
            return redirect()->route('ProcessingFee.index');


        DB::rollBack();
            toastr()->error('error');
            return redirect()->route('ProcessingFee.index');
    }

    public function update($request)
    {

       // return $request;

        $ProcessingFee =  ProcessingFee::findOrFail($request->id);
        if($ProcessingFee){

            DB::beginTransaction();

            $ProcessingFee->update([

                'date' => date('Y-m-d'),
                'student_id' => $request->student_id,
                'amount' => $request->Debit,
                'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],

            ]);

            $StudentAccount = StudentAccount::where('Processing_fee_id',$request->id)->first();
            $StudentAccount->update([
                'date' => date('Y-m-d'),
                'type' => 'ProcessingFee',
                'student_id' => $request->student_id,
                'Processing_fee_id' => $ProcessingFee->id,
                'debit' => 0.00,
                'credit' => $request->Debit,
                'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],

            ]);
            DB::commit();
            toastr()->success('updated');
            return redirect()->route('ProcessingFee.index');


            DB::rollBack();
            toastr()->error('error');
            return redirect()->route('ProcessingFee.index');

        }

    }

}
