@extends('empty')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="default-color">{{trans('MainSidebar.dashboard')}}</a></li>
            <li class="breadcrumb-item active"> {{trans('Fees_Invoices.Fees_Invoices_list')}}</li>
        </ol>
    </div>

@endsection

@section('title')
    {{trans('Fees_Invoices.Fees_Invoices_list')}}
@endsection

@section('page-header')

    {{trans('Fees_Invoices.Fees_Invoices_list')}}
@endsection

@section('PageTitle')

    {{trans('Fees_Invoices.Fees_Invoices_list')}}
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
                                            <th>{{trans('Fees_Invoices.name')}}</th>
                                            <th>{{trans('Fees_Invoices.Fee_type')}}</th>
                                            <th>{{trans('Fees_Invoices.amount')}}</th>
                                            <th>{{trans('Fees_Invoices.grade')}}</th>
                                            <th>{{trans('Fees_Invoices.school_year')}}</th>
                                            <th>{{trans('Fees_Invoices.notes')}}</th>
                                            <th>{{trans('Fees_Invoices.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Fee_invoices as $Fee_invoice)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$Fee_invoice->student->name}}</td>
                                                <td>{{$Fee_invoice->fees->title}}</td>
                                                <td>{{ number_format($Fee_invoice->amount) }}</td>
                                                <td>{{$Fee_invoice->grade->name}}</td>
                                                <td>{{$Fee_invoice->School_year->name}}</td>
                                                <td>{{$Fee_invoice->notes}}</td>
                                                <td>
                                                    <a href="{{route('FeesInvoices.edit',$Fee_invoice->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee_invoice{{$Fee_invoice->id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('dashboard.Fees_Invoices.delete')
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
