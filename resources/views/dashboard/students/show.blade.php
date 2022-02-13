@extends('empty')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('MainSidebar.dashboard')}}</a></li>
            <li class="breadcrumb-item active"> {{trans('student.edit_student')}}</li>
        </ol>
    </div>

@endsection

@section('title')
    {{trans('student.edit_student')}}
@endsection

@section('page-header')

    {{trans('student.edit_student')}}
@endsection

@section('PageTitle')

    {{trans('student.edit_student')}}
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true">{{trans('student.details')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                       role="tab" aria-controls="profile-02"
                                       aria-selected="false">{{trans('student.Attachments')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">{{trans('student.name')}}</th>
                                            <td>{{ $Student->name }}</td>
                                            <th scope="row">{{trans('student.email')}}</th>
                                            <td>{{$Student->email}}</td>
                                            <th scope="row">{{trans('student.gender')}}</th>
                                            <td>{{$Student->gender->Name}}</td>
                                            <th scope="row">{{trans('student.Nationality')}}</th>
                                            <td>{{$Student->Nationality->name}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('student.Grade')}}</th>
                                            <td>{{ $Student->grade->name }}</td>
                                            <th scope="row">{{trans('student.classrooms')}}</th>
                                            <td>{{$Student->schoole_year->name}}</td>
                                            <th scope="row">{{trans('student.section')}}</th>
                                            <td>{{$Student->classroom->name}}</td>
                                            <th scope="row">{{trans('student.Date_of_Birth')}}</th>
                                            <td>{{ $Student->Date_Birth}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('student.parent')}}</th>
                                            <td>{{ $Student->parent->Name_Father}}</td>
                                            <th scope="row">{{trans('student.academic_year')}}</th>
                                            <td>{{ $Student->academic_year }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                     aria-labelledby="profile-02-tab">
                                        <div class="card-body">
                                            <form method="post" action="{{route('Upload_attachment')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label
                                                            for="academic_year">{{trans('student.Attachments')}}
                                                            : <span class="text-danger">*</span></label>
                                                        <input type="file" accept="image/*" name="photos[]" multiple required>
                                                        <input type="hidden" name="student_name" value="{{$Student->name}}">
                                                        <input type="hidden" name="student_id" value="{{$Student->id}}">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <button type="submit" class="button button-border x-small">
                                                    {{trans('student.submit')}}
                                                </button>
                                            </form>
                                        </div>
                                        <br>
                                        <table class="table center-aligned-table mb-0 table table-hover"
                                               style="text-align:center">
                                            <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">{{trans('student.filename')}}</th>
                                                <th scope="col">{{trans('student.created_at')}}</th>
                                                <th scope="col">{{trans('student.Processes')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($Student->Attachments as $attachment)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{$loop->iteration}}</td>

                                                    <td>{{$attachment->fileName}}</td>
                                                    <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                           href="{{url('Download_attachment')}}/{{ $Student->name }}/{{$attachment->fileName}}"

{{-- href="{{url('Download_attachment')}}/{{ $attachment->imageable->name }}/{{$attachment->filename}}"
--}}
                                                           role="button">&nbsp; {{trans('student.Download')}}</a>

                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#Delete_img{{ $attachment->id }}"
                                                                title="{{ trans('Grades_trans.Delete') }}">{{trans('student.Deleted_Attach')}}
                                                        </button>

                                                    </td>
                                                </tr>
                                                @include('dashboard.students.delete_img')
                                            @endforeach
                                            </tbody>
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
