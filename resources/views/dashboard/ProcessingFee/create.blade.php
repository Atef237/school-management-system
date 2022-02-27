@extends('empty')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="default-color">{{trans('MainSidebar.dashboard')}}</a></li>
            <li class="breadcrumb-item active"> {{trans('MainSidebar.add_student')}}</li>
        </ol>
    </div>

@endsection

@section('title')
    {{trans('MainSidebar.add_student')}}
@endsection

@section('page-header')

    {{trans('MainSidebar.add_student')}}
@endsection

@section('PageTitle')

    {{trans('MainSidebar.add_student') .' '.  $student->name}}
@endsection


@section('content')

    <!-- row -->


    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post"  action="{{ route('ProcessingFee.store') }}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>المبلغ : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="debit" type="number" >
                                    <input  type="hidden" name="student_id"  value="{{$student->id}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رصيد الطالب : </label>
                                    <input  class="form-control" name="final_balance" value="{{ number_format($student->student_account->sum('debit') - $student->student_account->sum('credit'), 2) }}" type="text" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>البيان ar: <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="notes_ar" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>البيان en: <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="notes_en" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
