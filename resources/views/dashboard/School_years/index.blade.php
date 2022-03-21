@extends('empty')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="default-color">{{trans('MainSidebar.dashboard')}}</a></li>
            <li class="breadcrumb-item active"> {{trans('MainSidebar.schoolYear-list')}}</li>
        </ol>
    </div>

@endsection

@section('title')
    {{trans('MainSidebar.schoolYear-list')}}
@endsection

@section('page-header')

    {{trans('MainSidebar.schoolYear-list')}}
@endsection

@section('PageTitle')

    {{trans('MainSidebar.schoolYear-list')}}
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
                        {{ trans('school_year.add_school_year') }}
                    </button>

                        <button type="button" class="button x-small" id="btn_delete_all">
                            {{ trans('school_year.delete_checkbox') }}
                        </button>

                        <form action="{{route('filter')}}" method="POST" class="button x-small">
                            {{ csrf_field() }}
                            <select class="selectpicker" data-style="btn-info" name="Grade_id" required
                                    onchange="this.form.submit()">  //submit on change
                                <option class="x-small" value="" selected disabled>{{ trans('school_year.filter') }}</option>
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
                                <th>{{trans('school_year.school_year')}}</th>
                                <th>{{trans('school_year.grade')}}</th>
                                <th>{{trans('school_year.action')}}</th>


                            </tr>
                            </thead>

                            <tbody>

                            @if(isset($search_class))
                                <?php $School_years = $search_class; ?>
                            @else
                                <?php $School_years = $School_years; ?>
                            @endif

                            @foreach($School_years as $School_year)
                                <tr>
                                    <td><input type="checkbox"  value="{{ $School_year->id }}" class="box1" ></td>
                                    <td>{{$School_year->id}}</td>
                                    <td>{{$School_year->name}}</td>
                                    <td>{{$School_year->grade->name}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#editModal{{$School_year->id}}"
                                                title="{{ trans('school_year.edit') }}"><i class="fa fa-edit"></i></button>

                                        <button  type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{$School_year->id}}"
                                                title="{{ trans('school_year.delete') }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                @include('dashboard.School_years.edit')

                                @include('dashboard.School_years.delete')

                            @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.School_years.add')

        @include('dashboard.includes.modelDeleteSelected')

    </div>



@endsection


@section('js')
    @toastr_js
    @toastr_render
@endsection
