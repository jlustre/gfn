@extends('layouts.app')

@section('page_data')
    <?php include(resource_path('views').'/templates/config.php'); ?>
@endsection

@section('specific_css')
	<!-- Specific Page Data -->
	<?php $title = 'Dashboard'; ?>
	<?php $page = 'dashboard';   // To set active on the same id of primary menu ?>
	<?php 
	    // Additional Specific CSS 
	    $specific_css[0] = asset('plugins/fullcalendar/fullcalendar.css');
	    $specific_css[1] = asset('plugins/fullcalendar/fullcalendar.print.css');
	    $specific_css[2] = asset('plugins/introjs/css/introjs.min.css');   
	?>
	<!-- End of Data -->
@endsection

@include('includes.headers_sidebars')

@section('content')
	<div id="app">MyApp</div>
	<p>The quick Brown fox jumps over the lazy dog.</p>
<?php //include(resource_path('views').'/templates/widgets/interactive-stats-section.blade.php'); ?>
<?php //include(resource_path('views').'/templates/widgets/map-chart-section.blade.php'); ?>
<?php //include(resource_path('views').'/templates/widgets/calendar-tabs-section.blade.php'); ?>
<?php //include(resource_path('views').'/templates/widgets/weather-todo-news-section.blade.php'); ?>
@endsection

@section('page_script')
    <?php include(resource_path('views').'/templates/scripts/index.blade.php'); ?>
@endsection