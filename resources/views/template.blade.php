@extends('layouts.app')

@section('page_data')
    <?php include(resource_path('views').'/templates/config.php'); ?>
@endsection

@section('specific_css')
	<!-- Specific Page Data -->
	<?php $title = 'Multipurpose Dashboard - Responsive Multipurpose Admin Templates'; ?>
	<?php $keywords = 'HTML5 Template, CSS3, All Purpose Admin Template, '; ?>
	<?php $description = 'Responsive Admin Template for multipurpose use'; ?>
	<?php $page = 'dashboard';   // To set active on the same id of primary menu ?>
	<?php 
	    // Additional Specific CSS 
	    $specific_css[0] = asset('plugins/fullcalendar/fullcalendar.css');
	    $specific_css[1] = asset('plugins/fullcalendar/fullcalendar.print.css');
	    $specific_css[2] = asset('plugins/introjs/css/introjs.min.css');   
	?>
	<!-- End of Data -->
@endsection

@section('sidebar_left')
    <?php if ($navbar_left_config != 0) { $current_navbar="vd_navbar-left"; require(resource_path('views').'/templates/navbars/'.$navbar_left.'.blade.php'); }?>
@endsection

@section('sidebar_right')
    <?php if ($navbar_right_config != 0) { $current_navbar="vd_navbar-right"; require(resource_path('views').'/templates/navbars/'.$navbar_right.'.blade.php'); }?>
@endsection

@section('breadcrumb')
    <?php include(resource_path('views').'/templates/widgets/head-section.blade.php'); ?> 
@endsection

@section('title_header')
     <?php include(resource_path('views').'/templates/widgets/title-section.blade.php'); ?>  
@endsection

@section('content')

@endsection

@section('page_script')
    <?php include(resource_path('views').'/templates/scripts/index.blade.php'); ?>
@endsection