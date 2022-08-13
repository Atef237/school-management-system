@extends('layout.master')

@section('title')
    {{trans('MainSidebar.dashboard')}}
@endsection

    @section('content')
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0">{{trans('MainSidebar.dashboard')}}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
        <!-- widgets -->
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                        <span class="text-danger">
                                            <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                        </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">الطلاب</p>
                                <h4>{{App\Models\student::count()}}</h4>
                            </div>
                        </div>
                        <a href="{{route('student.create')}}">
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">

                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                اضافة طالب
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                        <span class="text-warning">
                                            <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                                        </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">المعلمين</p>
                                <h4>{{App\Models\teachers::count()}}</h4>
                            </div>
                        </div>
                        <a href="{{route('teacher.create')}}">
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-plus" aria-hidden="true"></i> اضافة معلم
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                        <span class="text-success">
                                            <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                                        </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">اولياء الامور</p>
                                <h4>{{App\Models\MyParent::count()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fa fa-calendar mr-1" aria-hidden="true"></i> Sales Per Week
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                        <span class="text-primary">
                                            <i class="fa fa-twitter highlight-icon" aria-hidden="true"></i>
                                        </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">المراحل الدراسية</p>
                                <h4>{{App\Models\School_year::count()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Just Updated
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Orders Status widgets-->


        <div class="row">

            <div  style="height: 400px;" class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="tab nav-border" style="position: relative;">
                            <div class="d-block d-md-flex justify-content-between">
                                <div class="d-block w-100">
                                    <h5 style="font-family: 'Cairo', sans-serif" class="card-title">اخر العمليات علي النظام</h5>
                                </div>
                                <div class="d-block d-md-flex nav-tabs-custom">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                                        <li class="nav-item">
                                            <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                               href="#students" role="tab" aria-controls="students"
                                               aria-selected="true"> الطلاب</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                               role="tab" aria-controls="teachers" aria-selected="false">المعلمين
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                               role="tab" aria-controls="parents" aria-selected="false">اولياء الامور
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
                                               role="tab" aria-controls="fee_invoices" aria-selected="false">الفواتير
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content" id="myTabContent">

                                {{--students Table--}}
                                <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
                                    <div class="table-responsive mt-15">
                                        <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                            <thead>
                                            <tr  class="table-info text-danger">
                                                <th>#</th>
                                                <th>اسم الطالب</th>
                                                <th>البريد الالكتروني</th>
                                                <th>النوع</th>
                                                <th>المرحلة الدراسية</th>
                                                <th>الصف الدراسي</th>
                                                <th>القسم</th>
                                                <th>تاريخ الاضافة</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse(\App\Models\student::latest()->take(5)->get() as $student)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$student->name}}</td>
                                                    <td>{{$student->email}}</td>
                                                    <td>{{$student->gender->Name}}</td>
                                                    <td>{{$student->grade->name}}</td>
                                                    <td>{{$student->schoole_year->name}}</td>
                                                    <td>{{$student->classroom->name}}</td>
                                                    <td class="text-success">{{$student->created_at}}</td>
                                                    @empty
                                                        <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{--teachers Table--}}
                                <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                    <div class="table-responsive mt-15">
                                        <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                            <thead>
                                            <tr  class="table-info text-danger">
                                                <th>#</th>
                                                <th>اسم المعلم</th>
                                                <th>النوع</th>
                                                <th>تاريخ التعين</th>
                                                <th>التخصص</th>
                                                <th>تاريخ الاضافة</th>
                                            </tr>
                                            </thead>

                                            @forelse(\App\Models\teachers::latest()->take(5)->get() as $teacher)
                                                <tbody>
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$teacher->Name}}</td>
                                                    <td>{{$teacher->genders->Name}}</td>
                                                    <td>{{$teacher->Joining_Date}}</td>
                                                    <td>{{$teacher->specialization->Name}}</td>
                                                    <td class="text-success">{{$teacher->created_at}}</td>
                                                    @empty
                                                        <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                                </tr>
                                                </tbody>
                                            @endforelse
                                        </table>
                                    </div>
                                </div>

                                {{--parents Table--}}
                                <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                    <div class="table-responsive mt-15">
                                        <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                            <thead>
                                            <tr  class="table-info text-danger">
                                                <th>#</th>
                                                <th>اسم ولي الامر</th>
                                                <th>البريد الالكتروني</th>
                                                <th>رقم الهوية</th>
                                                <th>رقم الهاتف</th>
                                                <th>تاريخ الاضافة</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse(\App\Models\MyParent::latest()->take(5)->get() as $parent)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$parent->Name_Father}}</td>
                                                    <td>{{$parent->email}}</td>
                                                    <td>{{$parent->National_ID_Father}}</td>
                                                    <td>{{$parent->Phone_Father}}</td>
                                                    <td class="text-success">{{$parent->created_at}}</td>
                                                    @empty
                                                        <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{--sections Table--}}
                                <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
                                    <div class="table-responsive mt-15">
                                        <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                            <thead>
                                            <tr  class="table-info text-danger">
                                                <th>#</th>
                                                <th>تاريخ الفاتورة</th>
                                                <th>اسم الطالب</th>
                                                <th>المرحلة الدراسية</th>
                                                <th>الصف الدراسي</th>
                                                <th>القسم</th>
                                                <th>نوع الرسوم</th>
                                                <th>المبلغ</th>
                                                <th>تاريخ الاضافة</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse(\App\Models\feesInvoice::latest()->take(10)->get() as $section)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$section->invoice_date}}</td>
                                                    <td>{{$section->My_classs->Name_Class}}</td>
                                                    <td class="text-success">{{$section->created_at}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="alert-danger" colspan="9">لاتوجد بيانات</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <livewire:calendar />
    @endsection
