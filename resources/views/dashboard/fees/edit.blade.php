@extends('empty')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="default-color">{{trans('MainSidebar.dashboard')}}</a></li>
            <li class="breadcrumb-item active"> {{trans('MainSidebar.student')}}</li>
        </ol>
    </div>

@endsection

@section('title')
    {{trans('MainSidebar.student')}}
@endsection

@section('page-header')

    {{trans('MainSidebar.student')}}
@endsection

@section('PageTitle')

    {{trans('MainSidebar.student')}}
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

                    <form method="post" action="{{route('fees.update','test')}}" >
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="id" value="{{$fee->id}}">


                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">الاسم باللغة العربية</label>
                                <input type="text" value="{{ $fee->getTranslation('title','ar')}}" name="title_ar" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">الاسم باللغة الانجليزية</label>
                                <input type="text" value="{{ $fee->getTranslation('title','en') }}" name="title_en" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">المبلغ</label>
                                <input type="number" value="{{ $fee->amount }}" name="amount" class="form-control">
                            </div>
                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputState">المرحلة الدراسية</label>
                                <select class="custom-select mr-sm-2" name="Grade_id" required>
                                    <option selected disabled>{{trans('student.Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{$Grade->id}}"{{$Grade->id == $fee->grade_id ? "selected" : ""}}>{{$Grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{trans('student.section')}} : </label>
                                <select class="custom-select mr-sm-2" name="schooleYear_id" required>
                                    @foreach($schooleYears as $schooleYear)
                                        <option value="{{$schooleYear->id}}"{{$schooleYear->id == $fee->schooleYear_id ? "selected" : ""}}>{{$schooleYear->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">السنة الدراسية</label>
                                <select class="custom-select mr-sm-2" name="year">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y")
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}" {{$fee->year == $year ? "selected" : "" }}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>

{{--                            <div class="form-group col">--}}
{{--                                <label for="inputZip">نوع الرسوم</label>--}}
{{--                                <select class="custom-select mr-sm-2" name="Fee_type">--}}
{{--                                    <option value="1">رسوم دراسية</option>--}}
{{--                                    <option value="2">رسوم باص</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">ملاحظات</label>
                            <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">تاكيد</button>

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
