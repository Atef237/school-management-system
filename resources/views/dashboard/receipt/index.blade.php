@extends('empty')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="default-color">{{trans('MainSidebar.dashboard')}}</a></li>
            <li class="breadcrumb-item active"> {{trans('MainSidebar.add_student')}}</li>
        </ol>
    </div>

@endsection

@section('title')
    {{trans('MainSidebar.add_student')}}
@endsection

@section('page-header')

    {{trans('MainSidebar.add_student')}}
@endsection

@section('PageTitle')

    {{trans('MainSidebar.add_student') }}
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
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>المبلغ</th>
                                            <th>البيان</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ReceiptStudents as $receipt_student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$receipt_student->student->name}}</td>
                                                <td>{{ number_format($receipt_student->debit, 2) }}</td>
                                                <td>{{$receipt_student->notes}}</td>
                                                <td>
                                                    <a href="{{route('ReceiptStudent.edit',$receipt_student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$receipt_student->id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('dashboard.receipt.Delete')
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
