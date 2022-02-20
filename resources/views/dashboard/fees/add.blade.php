@extends('empty')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="default-color">{{trans('MainSidebar.dashboard')}}</a></li>
            <li class="breadcrumb-item active"> {{trans('fees.fees_title')}}</li>
        </ol>
    </div>

@endsection

@section('title')
    {{trans('fees.fees_title')}}
@endsection

@section('page-header')

    {{trans('fees.fees_title')}}
@endsection

@section('PageTitle')

    {{trans('fees.fees_title')}}
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

                    <form method="post" action="{{route('fees.store')}}" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('fees.title_ar')}}</label>
                                <input type="text" value="{{ old('title_ar') }}" name="title_ar" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('fees.title_en')}}</label>
                                <input type="text" value="{{ old('title_en') }}" name="title_en" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('fees.amount')}}</label>
                                <input type="number" value="{{ old('amount') }}" name="amount" class="form-control">
                            </div>
                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputState">{{trans('fees.Educational_level')}}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id" required>
                                    <option selected disabled>{{trans('student.Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{trans('student.section')}} : </label>
                                <select class="custom-select mr-sm-2" name="schooleYear_id" required>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">{{trans('fees.academic_year')}}</label>
                                <select class="custom-select mr-sm-2" name="year">
                                    <option selected disabled>{{trans('student.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y")
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">{{trans('fees.Fee_type')}}</label>
                                <select class="custom-select mr-sm-2" name="Fee_type">
                                    <option selected disabled>{{trans('student.Choose')}}...</option>
                                    <option value="1">{{trans('fees.Tuition_fees')}}</option>
                                    <option value="2">{{trans('fees.bus_fee')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{trans('fees.notes')}}</label>
                            <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">{{trans('fees.submit')}}</button>

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
