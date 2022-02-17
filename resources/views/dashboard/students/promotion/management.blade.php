@extends('empty')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="default-color">{{trans('MainSidebar.dashboard')}}</a></li>
            <li class="breadcrumb-item active"> {{trans('MainSidebar.Student_Promotion_Department')}}</li>
        </ol>
    </div>

@endsection

@section('title')
    {{trans('MainSidebar.Student_Promotion_Department')}}
@endsection

@section('page-header')

    {{trans('MainSidebar.Student_Promotion_Department')}}
@endsection

@section('PageTitle')

    {{trans('MainSidebar.Student_Promotion_Department')}}
@endsection


@section('content')
    <!-- row -->

    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                    <div class="card card-statistics h-100">
                        <div class="card-body">

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#unDo">
                                تراجع الكل
                            </button>
                            <br><br>


                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                       data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th class="alert-info">#</th>
                                        <th class="alert-info">{{trans('Student.name')}}</th>

                                        <th class="alert-danger">المرحلة الدراسية السابقة</th>
                                        <th class="alert-success">المرحلة الدراسية الحالي</th>

                                        <th class="alert-danger">الصف الدراسي السابق</th>
                                        <th class="alert-success">الصف الدراسي الحالي</th>

                                        <th class="alert-danger">القسم الدراسي السابق</th>
                                        <th class="alert-success">القسم الدراسي الحالي</th>

                                        <th class="alert-danger">السنة الدراسية السابقة</th>
                                        <th class="alert-success">السنة الدراسية الحالية</th>

                                        <th>{{trans('Student.Processes')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($promotions as $promotion)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$promotion->student->name}}</td>

                                            <td>{{$promotion->f_grade->name}}</td>
                                            <td>{{$promotion->t_grade->name}}</td>

                                            <td>{{$promotion->f_school_year->name}}</td>
                                            <td>{{$promotion->t_school_year->name}}</td>

                                            <td>{{$promotion->f_classroom->name}}</td>
                                            <td>{{$promotion->t_classroom->name}}</td>

                                            <td>{{$promotion->from_academic_year}}</td>
                                            <td>{{$promotion->to_academic_year}}</td>
                                            <td>

                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#unDoOne">ارجاع الطالب</button>
                                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#">تخرج الطالب</button>
                                            </td>
                                        </tr>
                                                                            @include('dashboard.students.promotion.unDo')
                                                                            @include('dashboard.Students.promotion.unDoOne')
                                    @endforeach
                                </table>
                            </div>
                        </div>
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
