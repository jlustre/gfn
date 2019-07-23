@extends('layouts.admin')

@section('page_data')
    <?php include(resource_path('views').'/templates/config.php'); ?>
@endsection

@section('specific_css')
	<!-- Specific Page Data -->
	<?php $dist_id = 'Enagic Accounts List'; ?>
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
                    <a id="toggle_btn" href="#" class="btn btn-success btn-sm">Add New Account</a>
                </div>
                <div class="panel-body">
                	<div id="addaccount" style="display: none;" class="container">
						<form id="accountForm" action="#">
							<input type="hidden" id="id" name="id" value="">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>User Id</label>
										<input id="user_id" type="text" name="user_id" class="form-control">
									</div>
									<div class="form-group">
										<label>Dist Id</label>
										<input id="dist_id" type="text" name="dist_id" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Placed Dist Id</label>
										<input type="text" id="placed_dist_id" name="placed_dist_id" class="form-control"/>
									</div>
									<div class="form-group">
										<label>Placed Member Left</label>
										<input type="text" id="placed_member_left" name="placed_member_left" class="form-control"/>
									</div>
									<div class="form-group">
										<label>Placed Member Right</label>
										<input type="text" id="placed_member_righ" name="placed_member_righ" class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Locked Dist Id</label>
										<input type="text" id="lock_dist_id" name="lock_dist_id" class="form-control"/>
									</div>
									<div class="form-group">
										<label>Locked Member Left</label>
										<input type="text" id="lock_member_left" name="lock_member_left" class="form-control"/>
									</div>
									<div class="form-group">
										<label>Locked Member Right</label>
										<input type="text" id="lock_member_right" name="lock_member_right" class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="submit" value="Save" class="btn btn-primary">
									</div>
								</div>
							</div>
						</form>
					<hr>
				</div>
	
					<div class="table-responsive">
						<table class="table table-striped" id="data-tables">
							<thead>
								<tr>
									<th>Id</th>
									<th>User Id</th>
									<th>Status</th>
									<th>Dist Id</th>
									<th>Locked Id</th>
									<th>Locked Left</th>
									<th>Locked Right</th>
									<th>Placed Id</th>
									<th>Placed Left</th>
									<th>Placed Right</th>
									<th>Action</th> 
								</tr>
							</thead>
							<tbody>
							
							</tbody>
						</table>
					</div> <!-- end table-responsive -->
				</div> <!-- end panel-body -->
			</div> <!-- end panel -->
		</div>
	</div>
@endsection

@section('page_script')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#toggle_btn').click(function(){
				$(this).text(function(i, text){
				  $('#addaccount').toggle();
		          return text === "Hide Add Account Form" ? "Add New Account" : "Hide Add Account Form";
		        })
			    
			 });

			getAccounts();
			
			//Get Accounts from API
			function getAccounts() {
				$('#data-tables').DataTable( {
			        "ajax": "http://gofree.test/api/enagicUserAccounts",
			        "columns": [
			            { "data": "id" },
			            { "data": "user_id" },
			            { "data": "status" },
			            { "data": "dist_id" },
			            { "data": "lock_dist_id" },
			            { "data": "lock_member_left" },
			            { "data": "lock_member_right" },
			            { "data": "placed_dist_id" },
			            { "data": "placed_member_left" },
			            { "data": "placed_member_right" },
			            {  "mRender": function(data, type, full) {
						    return [
						    '<a data-original-title="view" data-toggle="tooltip" data-placement="top" data-id="1" class="viewLink btn menu-icon vd_bd-blue vd_blue" href="/admin/enagic/accounts/1"><i class="fa fa-eye"></i></a><a data-original-title="edit" data-toggle="tooltip" data-placement="top" style="margin-left: 5px;" class="editLink btn menu-icon vd_bd-green vd_green" href="#"><i class="fa fa-pencil"></i></a><a data-original-title="delete" data-toggle="tooltip" data-placement="top" style="margin-left: 5px;" class="deleteLink btn menu-icon vd_bd-red vd_red" href="#"><i class="fa fa-times"></i></a>'
						    ]
						  }
						},
			        ]
			    } );
			}


			$('#accountForm').on('submit', function(e){
				e.preventDefault();
				
				let dist_id = $('#dist_id').val();
				let lock_dist_id = $('#lock_dist_id').val();
				let status = $('#status').val();
				let lock_member_left = $('#lock_member_left').val();
				let lock_member_right = $('#lock_member_right').val();
				let placed_dist_id = $('#placed_dist_id').val();
				let placed_member_left = $('#placed_member_left').val();
				let placed_member_right = $('#placed_member_right').val();
				let id =$('#id').val();
				if (id) {
					updateAccount(id, dist_id, status, lock_dist_id, lock_member_left, lock_member_right, placed_dist_id, placed_member_left, placed_member_right);
				} else {
					if(dist_id=="") {
						//do nothing
					} else {
						addAccount(dist_id, status, lock_dist_id, lock_member_left, lock_member_right, placed_dist_id, placed_member_left, placed_member_right);
					}
				}
			});

			//Delete event
			$('body').on('click', '.viewLink', function(e){
				let id = $(this).data('id');
				//alert (id);
				$('#addaccount').show();
				$('#toggle_btn').text('Hide Add Account Form');
				let mode = 'Viewing';
				showAccount(id, mode);
			});

			//Delete event
			$('body').on('click', '.deleteLink', function(e){
				let id = $(this).data('id');
				if (confirm('Are you sure you want to delete ID: '+ id)) {
					//deleteAccount(id);
				}
				
			});

			//update event
			$('body').on('click', '.editLink', function(e){
				let id = $(this).data('id');
				$('#addaccount').show();
				$('#toggle_btn').text('Hide Add Account Form');
				let mode = 'Editing';
				showAccount(id, mode);
			});

			//Show Account using API
			function showAccount(id, mode) {

				$.ajax({
					url: 'http://gofree.test/api/accounts/'+id 
				}).done(function(account){
					$('#dist_id_hdr').html(mode+' ID: '+id);
					$('#my_id').html(account.id);
					$('#id').val(account.id);
					$('#dist_id').val(account.dist_id);
					$('#status').val(account.status);
					$('#lock_dist_id').val(account.lock_dist_id);
					$('#lock_member_left').val(account.lock_member_left);
					$('#lock_member_right').val(account.lock_member_right);
					$('#placed_dist_id').val(account.placed_dist_id);
					$('#placed_member_left').val(account.placed_member_left);
					$('#placed_member_right').val(account.placed_member_right);
				});
			}

			//Update Account using API
			function updateAccount(id, dist_id, status, lock_dist_id, lock_member_left, lock_member_right, placed_dist_id, placed_member_left, placed_member_right) {
				$.ajax({
					method: 'POST',
					url: 'http://gofree.test/api/accounts/'+id,
					data: {
						_method: 'PATCH',
						dist_id: dist_id,
						status: status,
						lock_dist_id: lock_dist_id,
						lock_member_left: lock_member_left,
						lock_member_right: lock_member_right,
						placed_dist_id: placed_dist_id,
						placed_member_left: placed_member_left,
						placed_member_right: placed_member_right,
					}
				}).done(function(account){
					alert('Account # '+id+' was updated.');
					location.reload();
					//$('#accounts').html('');
					//getAccounts();
					//clearForm();
				});
			}
			//clear the form
			function clearForm(){
				$('#id').val('');
				$('#dist_id').val('');
				$('#status').val('');
				$('#lock_dist_id').val('');
				$('#lock_member_left').val('');
				$('#lock_member_right').val('');
				$('#placed_dist_id').val('');
				$('#placed_member_left').val('');
				$('#placed_member_right').val('');
			}
			//Delete Account using API
			function deleteAccount(id) {
				$.ajax({
					method: 'POST',
					url: 'http://gofree.test/api/accounts/'+id,
					data: {_method: 'DELETE'}
				}).done(function(account){
					alert('Account # '+id+' was deleted.');
					location.reload();
					//$('#accounts').html('');
					//getAccounts();
				});
			}


			
		}) 

	</script>
    <?php include(resource_path('views').'/templates/scripts/listtables-data-tables.blade.php'); ?>
@endsection