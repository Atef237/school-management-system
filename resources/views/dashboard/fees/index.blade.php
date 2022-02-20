@extends('empty')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="default-color">{{trans('MainSidebar.dashboard')}}</a></li>
            <li class="breadcrumb-item active"> {{trans('fees.fees_list')}}</li>
        </ol>
    </div>

@endsection

@section('title')
    {{trans('fees.fees_list')}}
@endsection

@section('page-header')

    {{trans('fees.fees_list')}}
@endsection

@section('PageTitle')

    {{trans('fees.fees_list')}}
@endsection


@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('fees.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('fees.fees_title')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('fees.title')}}</th>
                                            <th>{{trans('fees.amount')}}</th>
                                            <th>{{trans('fees.Educational_level')}}</th>
                                            <th>{{trans('fees.academic_year')}}</th>
                                            <th>{{trans('fees.academic_year')}}</th>
                                            <th>{{trans('fees.notes')}}</th>
                                            <th>{{trans('fees.operation')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($fees as $fee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$fee->title}}</td>
                                                <td>{{$fee->amount}}</td>
{{--                                                <td>{{ number_format($fee->amount, 2) }}</td>--}}
                                                <td>{{$fee->grade->name}}</td>
                                                <td>{{$fee->schooleYear->name}}</td>
                                                <td>{{$fee->year}}</td>
                                                <td>{{$fee->notes}}</td>
                                                <td>
                                                    <a href="{{route('fees.edit',$fee->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee{{ $fee->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                                    <a href="#" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a>

                                                </td>
                                            </tr>
                                        @include('dashboard.fees.delete')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
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
