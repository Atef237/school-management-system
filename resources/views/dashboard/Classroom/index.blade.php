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

                        <button type="button" class="button x-small" id="btn_delete_all">
                            {{ trans('classroom.delete_checkbox') }}
                        </button>

                        <form action="{{route('filter')}}" method="POST" class="button x-small">
                            {{ csrf_field() }}
                            <select class="selectpicker" data-style="btn-info" name="Grade_id" required
                                    onchange="this.form.submit()">  //submit on change
                                <option class="x-small" value="" selected disabled>{{ trans('classroom.filter') }}</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </form>



                        <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                                <th>#</th>
                                <th>{{trans('classroom.name')}}</th>
                                <th>{{trans('classroom.grade')}}</th>
                                <th>{{trans('classroom.action')}}</th>


                            </tr>
                            </thead>

                            <tbody>

                            @if(isset($search_class))
                                <?php $classrooms = $search_class; ?>
                            @else
                                <?php $classrooms = $classrooms; ?>
                            @endif

                            @foreach($classrooms as $classroom)
                                <tr>
                                    <td><input type="checkbox"  value="{{ $classroom->id }}" class="box1" ></td>
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


                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.classroom.add')

        @include('dashboard.includes.modelDeleteSelected')

    </div>



@endsection


@section('js')
    @toastr_js
    @toastr_render
@endsection
