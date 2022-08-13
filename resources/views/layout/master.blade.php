<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('dashboard.includes.head')
    @livewireStyles

</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="assets/images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('dashboard.includes.main-header')

        @include('dashboard.includes.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">

            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0">@yield('PageTitle')</h4>
                    </div>
                    @yield('pageInfo')
                </div>
            </div>

            @yield('content')

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('dashboard.includes.footer')
        </div><!-- main content wrapper end-->
    </div>


    <!--=================================
 footer -->

    @include('dashboard.includes.footer-scripts')
    @livewireScripts
    @stack('scripts')
</body>

</html>
