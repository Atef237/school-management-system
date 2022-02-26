<?php


namespace App\Repository;


use App\Interfaces\FeeInvoicesRepositoryInterface;
use App\Models\fees;
use App\Models\feesInvoice;
use App\Models\Grade;
use App\Models\student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class FeeInvoicesRepository implements FeeInvoicesRepositoryInterface
{

    public function index()
    {
        $Fee_invoices = feesInvoice::with('grade','School_year','student','fees')->get();
        $Grades = Grade::all();
        return view('dashboard.Fees_Invoices.index',compact('Fee_invoices','Grades'));
    }

    public function show($id)
    {
        $student = student::findOrFail($id);

         $fees = fees::where('schooleYear_id',$student->school_years_id)->get();

        return view('dashboard.Fees_Invoices.add',compact('student','fees'));

    }

    public function store($request)
    {

       // return $request;

        DB::beginTransaction();
            foreach ($request->List_Fees as $List_Fee){

              //  return $List_Fee['amount'];

           $feeInvoice = feesInvoice::create([
                'fee_id' => $List_Fee['fee_id'],
                'amount' => $List_Fee['amount'],
                'notes' => $List_Fee['notes'],
                'Grade_id' => $request->Grade_id,
                'school_years_id' => $request->school_years_id,
                'student_id' => $request->student_id,
                'invoice_date' =>  date('Y-m-d'),
            ]);


            StudentAccount::create([
                'debit' => $List_Fee['amount'],
                'credit' => 0.0,
                'notes' => $List_Fee['notes'],
                'type' => 'invoice',
                'fee_invoice_id' => $feeInvoice->id,
                'date' => date('Y-m-d'),
                'Grade_id' => $request->Grade_id,
                'school_years_id' => $request->school_years_id,
                'student_id' => $request->student_id,
            ]);

        }
        DB::commit();
            toastr()->success('done');
            return redirect()->route('FeesInvoices.index');

        DB::rollBack();
            toastr()->error('error');
            return redirect()->route('FeesInvoices.index');

    }

    public function edit($id)
    {
        $fee_invoices = feesInvoice::findOrFail($id);
        $fees = fees::where('schooleYear_id',$fee_invoices->school_years_id)->get();
        return view('dashboard.Fees_Invoices.edit',compact('fee_invoices','fees'));
    }

    public function update($request)
    {

      //  return $request;

        DB::beginTransaction();

           $feesInvoice = feesInvoice::findOrFail($request->id);
           if($feesInvoice){

               $feesInvoice->update([
                   'amount' => $request->amount,
                   'fee_id' => $request->fee_id,
                   'notes'  => $request->description,
               ]);

               $StudentAccount = StudentAccount::where('fee_invoice_id',$request->id)->first();
               $StudentAccount->update([
                   'debit' => $request->amount,
                   'notes' => $request->description,
               ]);

           }else{
               toastr()->error(trans('Fees_Invoices.null'));
               return redirect()->route('FeesInvoices.index');
           }

        DB::commit();
            toastr()->success(trans('Fees_Invoices.updated'));
            return redirect()->route('FeesInvoices.index');


        DB::rollBack();
            toastr()->error(trans('Fees_Invoices.error'));
            return redirect()->route('FeesInvoices.index');
    }

    public function destroy($request)
    {
       // return $request;

        feesInvoice::destroy($request->id);

        toastr()->error(trans('Fees_Invoices.deleted'));
        return redirect()->route('FeesInvoices.index');

    }

}
