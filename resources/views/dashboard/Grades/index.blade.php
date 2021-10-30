@extends('empty')

    @section('css')
        @toastr_css
    @endsection

    @section('title')
        {{trans('MainSidebar.grades')}}
    @endsection

    @section('page-header')

        {{trans('MainSidebar.grades')}}
    @endsection

    @section('PageTitle')

        {{trans('MainSidebar.grades')}}
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
                            {{ trans('Grades_list.add_Grade') }}
                        </button>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered p-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('Grades_list.name')}}</th>
                                        <th>{{trans('Grades_list.notes')}}</th>
                                        <th>{{trans('Grades_list.action')}}</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($grades as $grade)
                                        <tr>
                                            <td>{{$grade->id}}</td>
                                            <td>{{$grade->name}}</td>
                                            <td>{{$grade->notes}}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#edit{{ $grade->id }}"
                                                        title="{{ trans('Grades_list.edit') }}"><i class="fa fa-edit"></i></button>

                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#delete{{ $grade->id }}"
                                                        title="{{ trans('Grades_list.delete') }}"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('Grades_list.name')}}</th>
                                        <th>{{trans('Grades_list.notes')}}</th>
                                        <th>{{trans('Grades_list.action')}}</th>

                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @include('dashboard.Grades.add')

        </div>


    @endsection


@section('js')
    @toastr_js
    @toastr_render
@endsection
