
<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text"> {{trans('MainSidebar.dashboard')}} </span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="index.html">Dashboard 01</a> </li>
                            <li> <a href="index-02.html">Dashboard 02</a> </li>
                            <li> <a href="index-03.html">Dashboard 03</a> </li>
                            <li> <a href="index-04.html">Dashboard 04</a> </li>
                            <li> <a href="index-05.html">Dashboard 05</a> </li>
                        </ul>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{trans('MainSidebar.grades')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('grades.index')}}">{{trans('MainSidebar.grade_list')}}</a></li>

                        </ul>
                    </li>
                    <!-- menu item classroom-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{trans('MainSidebar.schoolYear')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('school_year.index')}}">{{trans('MainSidebar.schoolYear-list')}} </a> </li>

                        </ul>
                    </li>
                    <!-- menu item classroom-->
                    <li>
                        <a href="{{route('classroom.index')}}"><i class="ti-menu-alt"></i><span class="right-nav-text"> {{trans('MainSidebar.classrooms')}} </span> </a>
                    </li>

                                    <!-- ##################################################### -->

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><span
                                    class="right-nav-text">{{trans('MainSidebar.parent')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{url('addParent')}}">{{trans('MainSidebar.add_parent')}}</a> </li>
                            <li> <a href="#">{{trans('MainSidebar.show_parents')}}</a> </li>


                        </ul>
                    </li>

                                    <!-- ##################################################### -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text"> {{trans('MainSidebar.student')}} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('student.index')}}">{{trans('MainSidebar.show_students')}}</a> </li>
                            <li> <a href="{{route('student.create')}}">{{trans('MainSidebar.add_student')}}</a> </li>
                            <li> <a href="{{route('promotion.index')}}">{{trans('MainSidebar.students_promotion')}}</a> </li>
                            <li> <a href="{{route('promotion.create')}}">{{trans('MainSidebar.Student_Promotion_Department')}}</a> </li>

                        </ul>
                    </li>

                    <li>
                        <a href="{{url('teacher')}}"><i class="ti-blackboard"></i><span class="right-nav-text">{{trans('MainSidebar.teacher')}}</span>
                        </a>
                    </li>
                                    <!-- ##################################################### -->


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text"> {{trans('MainSidebar.accounts')}} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('fees.create')}}">{{trans('MainSidebar.fees_title')}}</a> </li>
                            <li> <a href="{{route('fees.index')}}">{{trans('MainSidebar.fees_list')}}</a> </li>
                            <li> <a href="{{route('FeesInvoices.index')}}">{{trans('MainSidebar.FeesInvoicesList')}}</a> </li>
                            <li> <a href="{{route('PaymentStudent.index')}}">سندات الصرف</a> </li>
                        </ul>
                    </li>

                                    <!-- ##################################################### -->

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">{{trans('MainSidebar.Absence_and_presence')}} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="table" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Attendances.index')}}">{{trans('MainSidebar.Student_List')}}</a> </li>

                        </ul>
                    </li>
                                    <!-- ##################################################### -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#subject">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">{{trans('MainSidebar.subjects')}} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="subject" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('subject.index')}}">{{trans('MainSidebar.subjectsShow')}}</a> </li>
                            <li> <a href="{{route('subject.create')}}">{{trans('MainSidebar.subjectsCreate')}}</a> </li>
                        </ul>
                    </li>

                            <!-- ##################################################### -->


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">{{trans('MainSidebar.exams')}} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="exams" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="#">{{trans('MainSidebar.examsShow')}}</a> </li>
                            <li> <a href="#">{{trans('MainSidebar.examsCreate')}}</a> </li>
                        </ul>
                    </li>








                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                            <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">Multi
                                    level Menu</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth">Level
                                    item 1<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="auth" class="collapse">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#login">Level
                                            item 1.1<div class="pull-right"><i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="login" class="collapse">
                                            <li>
                                                <a href="javascript:void(0);" data-toggle="collapse"
                                                   data-target="#invoice">level item 1.1.1<div class="pull-right"><i
                                                            class="ti-plus"></i></div>
                                                    <div class="clearfix"></div>
                                                </a>
                                                <ul id="invoice" class="collapse">
                                                    <li> <a href="#">level item 1.1.1.1</a> </li>
                                                    <li> <a href="#">level item 1.1.1.2</a> </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li> <a href="#">level item 1.2</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#error">level
                                    item 2<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="error" class="collapse">
                                    <li> <a href="#">level item 2.1</a> </li>
                                    <li> <a href="#">level item 2.2</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
{{--        <!-- Left Sidebar End-->--}}

{{--        <!--=================================--}}


{{--<!---------------}}
