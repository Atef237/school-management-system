@extends('layout.master')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="default-color">{{trans('MainSidebar.dashboard')}} </a></li>
            <li class="breadcrumb-item active"> {{trans('classroom.classroom')}} </li>
        </ol>
    </div>

@endsection

@section('title')
    {{trans('classroom.classroom')}}
@endsection


@section('PageTitle')

    {{trans('classroom.classroom')}}

@endsection



@section('content')


    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('classroom.add_class') }}</a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            @foreach ($Grades as $Grade)

                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ $Grade->name }}</a>
                                    <div class="acd-des">

                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('classroom.name') }}</th>
                                                                    <th>{{ trans('classroom.schoolYear') }}</th>
                                                                    <th>{{ trans('classroom.status') }}</th>
                                                                    <th>{{ trans('classroom.action') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach ($Grade->school_years as $school_year)
                                                                    @foreach($school_year->classrooms as $classroom)
                                                                        <tr>
                                                                            <?php $i++; ?>
                                                                            <td>{{ $i }}</td>
                                                                            <td>{{ $classroom->name }}</td>
                                                                            <td>{{ $school_year->name }}</td>
                                                                            <td>
                                                                                @if ($classroom->status == 1)
                                                                                    <label
                                                                                        class="badge badge-success">{{ trans('classroom.status_on') }}</label>
                                                                                @else
                                                                                    <label
                                                                                        class="badge badge-danger">{{ trans('classroom.status_off') }}</label>
                                                                                @endif

                                                                            </td>
                                                                            <td>

                                                                                <a href="#"
                                                                                   class="btn btn-outline-info btn-sm"
                                                                                   data-toggle="modal"
                                                                                   data-target="#edit{{ $classroom->id }}">{{ trans('classroom.edit') }}</a>
                                                                                <a href="#"
                                                                                   class="btn btn-outline-danger btn-sm"
                                                                                   data-toggle="modal"
                                                                                   data-target="#delete{{ $classroom->id }}">{{ trans('classroom.delete') }}</a>


                                                                            </td>
                                                                        </tr>
                                                                        @include('dashboard.classroom.edit')
                                                                        @include('dashboard.classroom.delete')
                                                                    @endforeach

                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                        </div>
                    </div>


                    @include('dashboard.classroom.add')

                    @endsection

                    @section('js')
                        @toastr_js
                        @toastr_render
                        <script>
                            $(document).ready(function () {
                                $('select[name="Grade_id"]').on('change', function () {
                                    var Grade_id = $(this).val();
                                    if (Grade_id) {
                                        $.ajax({
                                            url: "{{ URL::to('classes') }}/" + Grade_id,
                                            type: "GET",
                                            dataType: "json",
                                            success: function (data) {
                                                $('select[name="school_year_id"]').empty();
                                                $.each(data, function (key, value) {
                                                    $('select[name="school_year_id"]').append('<option value="' + key + '">' + value + '</option>');
                                                });
                                            },
                                        });
                                    } else {
                                        console.log('AJAX load did not work');
                                    }
                                });
                            });
                        </script>

@endsection
