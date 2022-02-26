<?php


namespace App\Repository;
use App\Http\Controllers\student\studentController;
use App\Interfaces\ReceiptStudentRepositoryInterface;
use App\Models\AccountsFund;
use App\Models\ReceiptStudent;
use App\Models\student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;


class ReceiptStudentRepository implements ReceiptStudentRepositoryInterface
{

    public function index()
    {
            $ReceiptStudents = ReceiptStudent::all();
            return view('dashboard.receipt.index',compact('ReceiptStudents'));
    }

    public function show($id)
    {
        $student = student::findOrFail($id);
        return view('dashboard.receipt.create',compact('student'));
    }

    public function edit($id)
    {
        $receipt_student = ReceiptStudent::findORFail($id);
        return view('dashboard.receipt.edit',compact('receipt_student'));
    }

    public function store($request)
    {
        // return $request;

        DB::beginTransaction();

          $receipt =  ReceiptStudent::create([
                'date' => date('Y-m-d'),
                'student_id' => $request->student_id,
                'debit' => $request->Debit,
                'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],
            ]);

            AccountsFund::create([
                'date' => date('Y-m-d'),
                'receipt_id' => $receipt->id,
                'debit' => $request->Debit,
                'credit' => 0.0,
                'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],
            ]);

            StudentAccount::create([
                'date' => date('Y-m-d'),
                'student_id' => $request->student_id,
                'debit' => 0.0,
                'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],
                'credit' => $request->Debit,
                'type' => 'receipt',
                'receipt_id' => $receipt->id,
            ]);

        DB::commit();
            toastr()->success('Donr');
            return redirect()->route('ReceiptStudent.index');


        DB::rollBack();
            toastr()->success('error');
            return redirect()->route('ReceiptStudent.index');

    }

    public function update($request)
    {
       // return $request;

        DB::beginTransaction();

        $receipt = ReceiptStudent::findOrFail($request->id);

        $receipt->update([
            'date' => date('Y-m-d'),
            'student_id' => $request->student_id,
            'debit' => $request->Debit,
            'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],
        ]);

        $AccountsFund = AccountsFund::where('receipt_id',$request->id)->first();
        $AccountsFund->update([
            'date' => date('Y-m-d'),
            'receipt_id' => $receipt->id,
            'debit' => $request->Debit,
            'credit' => 0.0,
            'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],
        ]);

        $StudentAccount = StudentAccount::where('receipt_id',$request->id)->first();
        $StudentAccount->update([
            'date' => date('Y-m-d'),
            'student_id' => $request->student_id,
            'debit' => 0.0,
            'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],
            'credit' => $request->Debit,
            'type' => 'receipt',
            'receipt_id' => $receipt->id,
        ]);

        DB::commit();
        toastr()->success('Donr');
        return redirect()->route('ReceiptStudent.index');


        DB::rollBack();
        toastr()->success('error');
        return redirect()->route('ReceiptStudent.index');

    }

    public function destroy($request)
    {
        ReceiptStudent::destroy($request->id);

        toastr()->success('Done');
        return redirect()->route('ReceiptStudent.index');

    }
}
