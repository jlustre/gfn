@extends('layouts.admin')

@section('page_data')
    <?php include(resource_path('views').'/templates/config.php'); ?>
@endsection

@section('specific_css')
	<!-- Specific Page Data -->
	<?php $title = 'Email Pages - Responsive Multipurpose Admin Templates'; ?>
	<?php $page = 'admin';   // To set active on the same id of primary menu ?> 
	<?php
	  // Specific Configuration for Email Layouts
	  $start_nav_width = '';
	  $medium_nav_toggle=0 ;
	  $small_nav_toggle=0; 
	  $navbar_left_extra_class='vd_navbar-style-2'; 
	  $navbar_left = 'navbar-email'; 
	  $navbar_right = 'navbar-tabs-menu-right'; 
	  $navbar_right_start_width = 'nav-right-small'; 
	  $navbar_right_config = 1; 
	?> 
	<!-- End of Data -->
@endsection

@include('includes.headers_sidebars')

@section('content')
	@include('includes.user_profile')
@endsection

@section('page_script')
    <?php include(resource_path('views').'/templates/scripts/pages-user-profile.blade.php'); ?>
@endsection

