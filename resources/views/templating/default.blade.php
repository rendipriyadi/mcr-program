<html lang="en">
<head>
    @include('templating.parsial.head')
</head>
<body>
    <!-- BEGIN #loader -->
	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>
	<!-- END #loader -->

	<!-- BEGIN #app -->
	<div id="app" class="app app-header-fixed app-sidebar-fixed">

		@include('templating.parsial.navbar')

		<!-- END #header -->

		<!-- BEGIN #sidebar -->

            @include('templating.parsial.sidebar')

		<!-- END #sidebar -->

		<!-- BEGIN #content -->
		<div id="content" class="app-content">

			<!-- BEGIN page-header -->
            <div class="page-pretitle">
                {{ $preTitle ??'Main Control Room (Production)' }}
              </div>
              <h2 class="page-title">
                {{ $title?? 'Dashboard' }}
              </h2>
			<!-- END page-header -->
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
              @stack('page-action')
            </div>
			<!-- BEGIN row -->
			<div class="row">
                @include('templating.parsial.alert')
                @yield('isi')
		    </div>
		<!-- END #content -->

		<!-- BEGIN theme-panel -->

		<!-- END theme-panel -->
		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top show" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
</div>
	<!-- END #app -->
@include('templating.parsial.script')


</html>




