
<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">

            @if(auth('web')->check())
                @include('dashboard.includes.MainSidebar.admin-main-sidebar')
            @endif

{{--            @if(auth('teacher')->check())--}}
{{--                @include('dashboard.includes.MainSidebar.teacher-main-sidebar')--}}
{{--            @endif--}}

{{--            @if(auth('student')->check())--}}
{{--                @include('dashboard.includes.MainSidebar.student-main-sidebar')--}}
{{--            @endif--}}

{{--            @if(auth('parent')->check())--}}
{{--                @include('dashboard.includes.MainSidebar.parent-main-sidebar')--}}
{{--            @endif--}}

        </div>


        <!-- Left Sidebar End-->

        <!--=================================
