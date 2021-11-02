@extends('empty')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="default-color">{{trans('MainSidebar.dashboard')}}</a></li>
            <li class="breadcrumb-item active"> {{trans('MainSidebar.classroom')}}</li>
        </ol>
    </div>

@endsection

@section('title')
    {{trans('MainSidebar.classroom')}}
@endsection

@section('page-header')

    {{trans('MainSidebar.classroom')}}
@endsection

@section('PageTitle')

    {{trans('MainSidebar.classroom')}}
@endsection



@section('content')

    <div class="row">
        <div class="col-xl-12 mb-30">
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


                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('classroom.add_class') }}
                    </button>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('classroom.name')}}</th>
                                <th>{{trans('classroom.grade')}}</th>
                                <th>{{trans('classroom.action')}}</th>


                            </tr>
                            </thead>

                            <tbody>
                            @foreach($classrooms as $classroom)
                                <tr>
                                    <td>{{$classroom->id}}</td>
                                    <td>{{$classroom->name}}</td>
                                    <td>{{$classroom->grade->name}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#editModal{{$classroom->id}}"
                                                title="{{ trans('classroom.edit') }}"><i class="fa fa-edit"></i></button>

                                        <button  type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{$classroom->id}}"
                                                title="{{ trans('classroom.delete') }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                @include('dashboard.classroom.edit')

                                @include('dashboard.classroom.delete')

                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{trans('classroom.name')}}</th>
                                <th>{{trans('classroom.grade')}}</th>
                                <th>{{trans('classroom.action')}}</th>

                            </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.classroom.add')

    </div>


@endsection


@section('js')
    @toastr_js
    @toastr_render
@endsection
