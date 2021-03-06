@extends('empty')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="default-color">{{trans('MainSidebar.dashboard')}}</a></li>
            <li class="breadcrumb-item active">{{trans('payment.betinExchange')}}</li>
        </ol>
    </div>

@endsection

@section('title')
    {{trans('payment.betinExchange')}}
@endsection

@section('page-header')

        {{trans('payment.betinExchange')}}
@endsection

@section('PageTitle')

    {{trans('payment.betinExchange')}}
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
                                    <th>{{trans('payment.StudentName')}}</th>
                                    <th>{{trans('payment.amount')}}</th>
                                    <th>{{trans('payment.Statement')}}</th>
                                    <th>{{trans('payment.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payment_students as $payment_student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$payment_student->student->name}}</td>
                                        <td>{{ number_format($payment_student->amount, 2) }}</td>
                                        <td>{{$payment_student->notes}}</td>
{{--                                                getTranslation('notes','en')--}}
                                        <td>
                                            <a href="{{route('PaymentStudent.edit',$payment_student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$payment_student->id}}" ><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @include('dashboard.payment.delete')
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
