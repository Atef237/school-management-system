@extends('empty')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="default-color">{{trans('MainSidebar.dashboard')}}</a></li>
            <li class="breadcrumb-item active"> {{trans('student.graduate_list')}}</li>
        </ol>
    </div>

@endsection

@section('title')
    {{trans('student.graduate_list')}}
@endsection

@section('page-header')

    {{trans('student.graduate_list')}}
@endsection

@section('PageTitle')

    {{trans('student.graduate_list')}}
@endsection


@section('content')

    <!-- row -->

    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('Student.name')}}</th>
                                            <th>{{trans('Student.email')}}</th>
                                            <th>{{trans('Student.gender')}}</th>
                                            <th>{{trans('Student.Grade')}}</th>
                                            <th>{{trans('Student.section')}}</th>
                                            <th>{{trans('Student.classrooms')}}</th>
                                            <th>{{trans('Student.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->gender->Name}}</td>
                                                <td>{{$student->grade->name}}</td>
                                                <td>{{$student->schoole_year->name}}</td>
                                                <td>{{$student->classroom->name}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#student_retreat{{ $student->id }}" >{{trans('student.student_retreat')}}</button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Student{{ $student->id }}" >{{trans('student.Delete_Student')}}</button>

                                                </td>
                                            </tr>

                                        @include('dashboard.students.Graduate.retreat')
                                        @include('dashboard.students.Graduate.Delete')

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


@endsection
