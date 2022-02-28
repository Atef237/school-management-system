<?php


namespace App\Repository;
use App\Interfaces\PaymentRepositoryInterface;
use App\Models\AccountsFund;
use App\Models\PaymentStudent;
use App\Models\student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;


class PaymentRepository implements PaymentRepositoryInterface
{

    public function index()
    {
        $payment_students = PaymentStudent::all();
        return view('dashboard.payment.index',compact('payment_students'));
    }

    public function show($id)
    {
        $student = student::findOrFail($id);
        return view('dashboard.payment.create',compact('student'));
    }

    public function story($request)
    {
      //  return $request;

        DB::beginTransaction();
            $paymentStudent = PaymentStudent::create([
                'date' => date('Y-m-d'),
                'student_id' => $request->student_id,
                'amount' => $request->Debit,
                'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],
            ]);

            StudentAccount::create([
                'date' => date('Y-m-d'),
                'type' => 'payment',
                'student_id' => $request->student_id,
                'payment_id' => $paymentStudent->id,
                'debit' => $request->Debit,
                'credit' => 0.00,
                'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],
            ]);

            AccountsFund::create([
                'date' => date('Y-m-d'),
                'payment_id' => $paymentStudent->id,
                'debit' => 0.00,
                'credit' => $request->Debit,
                'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],

            ]);
        DB::commit();
            toastr()->success('Done');
            return redirect()->route('PaymentStudent.index');
        DB::rollBack();
            toastr()->error('Error');
            return redirect()->route('PaymentStudent.index');
    }

    public function edit($id)
    {
        $payment_student = PaymentStudent::findOrFail($id);
        return view('dashboard.payment.edit',compact('payment_student'));
    }

    public function update($request)
    {

      //  return $request;

        DB::beginTransaction();

        $paymentStudent = PaymentStudent::findOrFail($request->id);
        $paymentStudent->update([
            'date' => date('Y-m-d'),
            'student_id' => $request->student_id,
            'amount' => $request->Debit,
            'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],
        ]);


        $StudentAccount = StudentAccount::where('payment_id',$request->id)->first();
        $StudentAccount->update([
            'date' => date('Y-m-d'),
            'type' => 'payment',
            'student_id' => $request->student_id,
            'payment_id' => $paymentStudent->id,
            'debit' => $request->Debit,
            'credit' => 0.00,
            'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],
        ]);


        $AccountsFund = AccountsFund::where('payment_id',$request->id)->first();
        $AccountsFund->update([
            'date' => date('Y-m-d'),
            'payment_id' => $paymentStudent->id,
            'debit' => 0.00,
            'credit' => $request->Debit,
            'notes' => ['ar' => $request->notes_ar, 'en' => $request->notes_en],

        ]);
        DB::commit();
            toastr()->success('updated');
            return redirect()->route('PaymentStudent.index');
        DB::rollBack();
            toastr()->error('Error');
            return redirect()->route('PaymentStudent.index');
    }

    public function destroy($request)
    {
        PaymentStudent::destroy($request->id);
        toastr()->error('deleted');
        return redirect()->route('PaymentStudent.index');
    }
}
