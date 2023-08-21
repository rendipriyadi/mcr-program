@extends('layouts.default', ['appSidebarTwo' => true])

@section('title', 'Page with Two Sidebar')

@push('scripts')
	<script src="/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
	<script src="/assets/js/demo/render.highlight.js"></script>
	<script src="/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="/assets/plugins/jquery-knob/dist/jquery.knob.min.js"></script>
	<script src="/assets/js/demo/page-with-two-sidebar.demo.js"></script>
@endpush

@section('content')
	<!-- BEGIN breadcrumb -->
	<ol class="breadcrumb float-xl-end">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
		<li class="breadcrumb-item active">Page with Two Sidebar</li>
	</ol>
	<!-- END breadcrumb -->
	<!-- BEGIN page-header -->
	<h1 class="page-header">Page with Two Sidebar <small>header small text goes here...</small></h1>
	<!-- END page-header -->
	
	<!-- BEGIN panel -->
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<h4 class="panel-title">Installation Settings</h4>
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="panel-body">
			<p>
				Add the <code>.app-with-two-sidebar</code>, <code>.app-sidebar-end-toggled</code> css class to <code>.app</code> container for two sidebar page setting. Besides that, you might need to add
				the <b>mobile</b> and <b>desktop</b> toggler for right sidebar.
			</p>
		</div>
		<div class="hljs-wrapper">
			<pre><code class="html">&lt;div id="app" class="app app-with-two-sidebar app-sidebar-end-toggled"&gt;
  &lt;div id="header" class="app-header"&gt;
    &lt;div class="navbar-header"&gt;
      &lt;!-- BEGIN mobile-toggler --&gt;
      &lt;button type="button" class="navbar-mobile-toggler" data-toogle="app-sidebar-end-mobile"&gt;
        &lt;span class="icon-bar"&gt;&lt;/span&gt;
        &lt;span class="icon-bar"&gt;&lt;/span&gt;
        &lt;span class="icon-bar"&gt;&lt;/span&gt;
      &lt;/button&gt;
      &lt;!-- END mobile-toggler --&gt;
      
      &lt;a href="index.html" class="navbar-brand"&gt;
        ...
      &lt;/a&gt;
      ...
    &lt;/div&gt;
    
    &lt;div class="navbar-nav"&gt;
      ...
      &lt;!-- BEGIN desktop-toggler --&gt;
      &lt;div class="navbar-divider d-none d-md-block"&gt;&lt;/div&gt;
      &lt;div class="navbar-item d-none d-md-block"&gt;
        &lt;a href="javascript:;" data-toggle="app-sidebar-end" class="navbar-link fs-14px"&gt;
          &lt;i class="fa fa-th"&gt;&lt;/i&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;!-- END desktop-toggler --&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  ...
&lt;/div&gt;</code></pre>
		</div>
	</div>
	<!-- END panel -->
@endsection

@push('scripts')
	<script src="/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="/assets/plugins/jquery-knob/dist/jquery.knob.min.js"></script>
	<script src="/assets/js/demo/page-with-two-sidebar.demo.js"></script>
@endpush
