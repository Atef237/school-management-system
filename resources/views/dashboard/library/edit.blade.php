@extends('empty')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="default-color">Questions </a></li>
            <li class="breadcrumb-item active"> Questions </li>
        </ol>
    </div>

@endsection

@section('title')
    Library
@endsection

@section('page-header')
    Library
@endsection

@section('PageTitle')
    Library
@endsection


@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('libraries.update','test')}}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">اسم الكتاب</label>
                                        <input type="text" name="title_ar" value="{{$book->getTranslation('title','ar')}}" class="form-control">
                                        <input type="hidden" name="id" value="{{$book->id}}" class="form-control">
                                    </div>

                                    <div class="col">
                                        <label for="title">اسم الكتاب</label>
                                        <input type="text" name="title_en" value="{{$book->getTranslation('title','en')}}" class="form-control">
                                    </div>

                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('Students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="Grade_id">
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                @foreach($grades as $grade)
                                                    <option  value="{{ $grade->id }}" {{$book->grade_id == $grade->id ?'selected':''}}>{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="schooleYear_id">
                                                <option value="{{$book->school_year_id}}">{{$book->schooleYear->name}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="section_id">{{trans('Students_trans.section')}} : </label>
                                            <select class="custom-select mr-sm-2" name="classroom_id">
                                                <option value="{{$book->classroom_id}}">{{$book->classroom->name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><br>

                                <div class="form-row">
                                    <div class="col">

                                        <embed src="{{ URL::to('attachments/Library/'.$book->file_name) }}" type="application/pdf"   height="150px" width="100px"><br><br>

                                        <div class="form-group">
                                            <label for="academic_year">المرفقات : <span class="text-danger">*</span></label>
                                            <input type="file" accept="application/pdf"  name="file_name">
                                        </div>

                                    </div>
                                </div>

                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ البيانات</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection
