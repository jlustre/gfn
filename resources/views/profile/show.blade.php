@extends('layouts.app')

@section('page_data')
    <?php include(resource_path('views').'/templates/config.php'); ?>
@endsection

@section('specific_css')
	<!-- Specific Page Data -->
	<?php $title = 'Profile Pages'; ?>
	<?php $page = 'profile';   // To set active on the same id of primary menu ?> 
	<!-- End of Data -->
@endsection

@include('includes.headers_sidebars')

@section('content')
	@include('includes.user_profile')
@endsection

@section('page_script')
    <?php include(resource_path('views').'/templates/scripts/pages-user-profile.blade.php'); ?>
@endsection

