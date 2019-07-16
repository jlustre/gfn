@extends('layouts.admin')

@section('page_data')
    <?php include(resource_path('views').'/templates/config.php'); ?>
@endsection

@section('specific_css')
	<!-- Specific Page Data -->
	<?php $title = 'Users List'; ?>
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
	<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	@include('includes.messages') 
            	<div class="panel-heading vd_bg-grey">
                    <a href="/admin/users/create" class="btn btn-success btn-sm">Add New User</a>
                </div>
                <div class="panel-body">
	
	@if(count($users) > 0)
	<div class="table-responsive">
		<table class="table table-striped" id="data-tables">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Sponsor</th>
					<th>Username</th>
					<th>Email</th>
					<th>Role</th>
					<th class="text-center">Active</th>
					<th>Created</th>
					<th>Updated</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($users as $user)
				<tr style="font-size: 12px;" class="py-0">
					<td>{{ $user->id }}</td>
					<td><a href="/admin/users/{{ $user->id }}">{{ $user->profile->firstname}} {{ $user->profile->lastname}}</a></td>
					<td>{{ $user->sponsor }}</td>
					<td>{{ $user->username }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->role->name }}</td>
					<td class="text-center"><span class="label label-{{ $user->is_active ? 'success' : 'default' }}">{{ $user->is_active ? 'Active' : 'Inactive' }}</span></td>
					<td>{{ $user->created_at }}</td>
					<td>{{ $user->updated_at }}</td>
					<td class="menu-action">
						<a href="/admin/users/{{ $user->id }}" data-original-title="view" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-green vd_green"> <i class="fa fa-eye"></i> </a> 
						<a href="/admin/users/{{ $user->id }}/edit" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"> <i class="fa fa-pencil"></i> </a> 
						<a href="/admin/users/{{ $user->id }}" onclick="event.preventDefault(); document.getElementById('delete-form[]').submit();" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"> <i class="fa fa-times"></i> </a>

						{!! Form::open(['action'=> ['AdminUsersController@destroy', $user->id], 'method' => 'POST', 'id' => 'delete-form[]', 'style' => 'display: none;', 'onsubmit'=>'return confirm("Are you sure you want to delete this User?")']) !!}
						{{ Form::hidden('_method', 'DELETE') }}
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		</div> <!-- end table-responsive -->
	@else
		<p>You don't have any user yet. </p> 
	@endif
				</div> <!-- end panel-body -->
			</div> <!-- end panel -->
		</div>
	</div>
@endsection

@section('page_script')
    <?php include(resource_path('views').'/templates/scripts/listtables-data-tables.blade.php'); ?>
@endsection