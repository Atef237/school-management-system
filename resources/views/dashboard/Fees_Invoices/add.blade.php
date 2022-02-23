@extends('empty')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="default-color">{{trans('MainSidebar.dashboard')}}</a></li>
            <li class="breadcrumb-item active"> {{trans('Fees_Invoices.Fees_Invoices_title')}}</li>
        </ol>
    </div>

@endsection

@section('title')
    {{trans('Fees_Invoices.Fees_Invoices_title')}}
@endsection

@section('page-header')

    {{trans('Fees_Invoices.Fees_Invoices_title')}}
@endsection

@section('PageTitle')

    {{trans('Fees_Invoices.Fees_Invoices_title') }}
@endsection


@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
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

                    <form class=" row mb-30" action="{{route('FeesInvoices.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Fees">
                                    <div data-repeater-item>
                                        <div class="row">

                                            <div class="col">
                                                <label for="Name" class="mr-sm-2">{{trans('Fees_Invoices.student_name')}}</label>
{{--                                                <select class="fancyselect" name="student_id" required>--}}
                                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
{{--                                                </select>--}}
                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">{{trans('Fees_Invoices.Fee_type')}}</label>
                                                <div class="box">
                                                    <select class="fancyselect" name="fee_id" required>
                                                        <option value="">-- {{trans('Fees_Invoices.chose')}} --</option>
                                                        @foreach($fees as $fee)
                                                            <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">{{trans('Fees_Invoices.amount')}}</label>
                                                <div class="box">
                                                    <select class="fancyselect" name="amount" required>
                                                        <option value="">-- {{trans('Fees_Invoices.chose')}} --</option>
                                                        @foreach($fees as $fee)
                                                            <option value="{{ $fee->amount }}">{{ $fee->amount }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <label for="description" class="mr-sm-2">{{trans('Fees_Invoices.notes')}}</label>
                                                <div class="box">
                                                    <input type="text" class="form-control" name="notes">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">{{ trans('Fees_Invoices.Processes') }}:</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="{{ trans('Fees_Invoices.delete_row') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button" value="{{ trans('Fees_Invoices.add_row') }}"/>
                                    </div>
                                </div><br>

                                <input type="hidden" name="Grade_id" value="{{$student->Grade_id}}">
                                <input type="hidden" name="school_years_id" value="{{$student->school_years_id}}">
                                <input type="hidden" name="student_id" value="{{$student->id}}">

                                <button type="submit" class="btn btn-primary">{{trans('Fees_Invoices.submit')}}</button>
                            </div>
                        </div>
                    </form>

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
