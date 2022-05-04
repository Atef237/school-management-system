<?php

namespace App\Repository;

use App\Http\Traits\AttachFileTrait;
use App\Interfaces\librariesRepositoryInterface;
use App\Models\Grade;
use App\Models\library;
use Illuminate\Support\Facades\DB;

class librariesRepository implements librariesRepositoryInterface
{

    use AttachFileTrait;
    public function index()
    {
        $books = library::all();
        return view('dashboard.library.index',compact('books'));

    }

    public function create()
    {

        $grades =Grade::all();
        return view('dashboard.library.create',compact('grades'));
    }

    public function store($request)
    {
        // return $request;

        DB::beginTransaction();

            library::create([

                'title' => ['en' => $request->title_en, 'ar'=>$request->title_ar],
                'grade_id' => $request->Grade_id,
                'school_year_id' => $request->schooleYear_id,
                'classroom_id' => $request->classroom_id,
                'teacher_id' => 1,
                'file_name' => $request->file('file_name')->getClientOriginalName()
            ]);
            $this->uploadFile($request,'file_name','attachments/Library');

        DB::commit();
            toastr()->success('DONE');
            return redirect()->route('libraries.index');

        DB::rollBack();
            toastr()->error('Error');
            return redirect()->route('libraries.index');

    }

    public function edit($id)
    {
        $data['grades'] = Grade::all();
        $data['book'] = library::findOrFail($id);
        return view('dashboard.library.edit',$data);
    }

    public function update($request)
    {
        // return $request;
        $book = library::findOrFail($request->id);

        if($request->hasfile('file_name')){

            $this->deleteFile('attachments/Library',$book->file_name);

            $this->uploadFile($request,'file_name','attachments/Library');

            $file_name_new = $request->file('file_name')->getClientOriginalName();
            $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;
        }

        $book->title = ['en' => $request->title_en, 'ar'=>$request->title_ar];
        $book->grade_id = $request->Grade_id;
        $book->school_year_id = $request->schooleYear_id;
        $book->classroom_id = $request->classroom_id;
        $book->teacher_id = 1;
        $book->save();

        toastr()->success('updated');
        return redirect()->route('libraries.index');
    }

    public function destroy($request)
    {
        // return $request;
        $this->deleteFile('attachments/Library',$request->file_name);
        library::findOrFail($request->id)->delete();

        toastr()->success('updated');
        return redirect()->route('libraries.index');

    }

    public function download($fileName)
    {
      return $this->downloadFile('attachments/Library',$fileName);
    }
}
