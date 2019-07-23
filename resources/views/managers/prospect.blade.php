@extends('layouts.app')

@section('page_data')
    <?php include(resource_path('views').'/templates/config.php'); ?>
@endsection

@section('specific_css')
	<!-- Specific Page Data -->
	<?php $title = 'Manage Prospect List'; ?>
	<?php $page = 'prospect';   // To set active on the same id of primary menu ?> 
	<!-- End of Data -->
@endsection

@include('includes.headers_sidebars')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        @include('includes.messages') 
        	<div class="panel-heading vd_bg-grey">
                <a id="toggle_btn" href="#" class="btn btn-success btn-sm">Add New Prospect</a>
            </div>
            <div class="panel-body">
				<div id="addprospect" style="display: none;" class="container">
					<div class="col-md-12">
						<form id="prospectForm">
							<input type="hidden" id="id" name="id" value="">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>First Name</label><span class="pull-right">ID:<span id="my_id"></span> </span>
										<input id="firstname" type="text" name="firstname" class="form-control">
									</div>
									<div class="form-group">
										<label>Last Name</label>
										<input type="text" id="lastname" name="lastname" class="form-control"/>
									</div>
									<div class="form-group">
										<label>Spouse Name</label>
										<input type="text" id="spousename" name="spousename" class="form-control"/>
									</div>
									<div class="form-group">
					                      <label style="margin-right: 10px;">Marital Status</label>
				                          <input type="radio" checked value="1" id="optionsRadios3" name="is_married">
				                          <label for="optionsRadios3" style="margin-right: 10px;"> Married </label>
				                          <input type="radio" value="0" id="optionsRadios4" name="is_married">
				                          <label for="optionsRadios4"> Single </label>
					                  </div>
										<div class="form-group">
											<label>With Kids?</label>
					                          <input type="radio" value="1" id="optionsRadios3" name="nbr_kids">
					                          <label for="optionsRadios3" style="margin-right: 10px;"> Yes </label>
					                          <input type="radio" checked value="0" id="optionsRadios4" name="nbr_kids">
					                          <label for="optionsRadios4"> No </label>
										</div>
										<div class="form-group">
											<label style="position: relative; bottom:-5px;">Hot Buttons<br><small>Ex. (Business minded, need extra income)</small></label>
											<textarea rows="3" id="hot_buttons" name="hot_buttons" class="form-control">
											</textarea>
										</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Email Address</label>
										<input type="email" id="email" name="email" class="form-control"/>
									</div>
									<div class="form-group">
										<label>Contact Phone</label>
										<input type="text" id="phone" name="phone" class="form-control"/>
									</div>
									<div class="form-group">
										<label>Alternate Phone</label>
										<input type="text" id="alt_phone" name="alt_phone" class="form-control"/>
									</div>
									<div class="form-group">
										<label>Best Time To Call</label>
										<input type="text" id="call_best_time" name="call_best_time" class="form-control"/>
									</div>
									<div class="form-group">
										<label>Prospect Source</label>
										<input type="text" id="source" name="source" class="form-control"/>
									</div>
									<div class="form-group">
										<label>Birthday</label>
										<input type="text" id="birthday" name="birthday" class="form-control"/>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>City</label>
										<input type="text" id="city" name="city" class="form-control"/>
									</div>
									<div class="form-group">
										<label>State or Province</label>
										<input type="text" id="state_id" name="state_id" class="form-control"/>
									</div>
									<div class="form-group">
										<label>Country</label>
										<select class=""  name="country_id" id="country_id">
						                   <option value="1">USA</option>
						                   <option value="2">Canada</option>
						                </select>
									</div>
									<div class="form-group">
										<label>Timezone</label>
										<select class=""  name="timezone_id" id="timezone_id">
						                   <option value="1">Pacific (PST)</option>
						                </select>
									</div>
									<div class="form-group">
										<label>interests</label>
										<input type="text" id="interests" name="interests" class="form-control"/>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>company</label>
										<input type="text" id="company" name="company" class="form-control"/>
									</div>
									<div class="form-group">
										<label>profession</label>
										<input type="text" id="profession" name="profession" class="form-control"/>
									</div>
									<div class="form-group">
										<label>common_ground</label>
										<input type="text" id="common_ground" name="common_ground" class="form-control"/>
									</div>
									<div class="form-group">
										<label>other_info</label>
										<textarea id="other_info" name="other_info" class="form-control">
										</textarea>
									</div>
									<div class="form-group">
										<input type="submit" value="Save" class="btn btn-success btn-sm">
										<a id="close" href="#" class="btn btn-primary btn-sm">Close</a>
										<a id="clear" href="#" class="btn btn-default btn-sm">Clear</a>
									</div>
								</div>
							</div>
						</form>
					</div>
					<hr>
				</div>
				<div class="table-responsive">
					<table class="table table-striped" id="data-tables">
						<thead>
							<tr>
								<th>Id</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Best Time</th>
								<th>City/Town</th>
								<th>State/Prov</th>
								<th>Country</th>
								<th>Timezone</th>
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
				  $('#addprospect').toggle();
		          return text === "Hide Add Prospect Form" ? "Add New Prospect" : "Hide Add Prospect Form";
		        })
			    
			 });

			getProspects();

			//Clear Form
			$('body').on('click', '#clear', function(){
				clearForm();
			});

			//Close Form
			$('body').on('click', '#close', function(){
				$('#addprospect').hide();
				$('#toggle_btn').text('Add New Prospect');
			});

			//Delete event
			$('body').on('click', '.viewLink', function(e){
				let id = $(this).data('id');
				$('#addprospect').show();
				$('#toggle_btn').text('Hide Add Prospect Form');
				let mode = 'Viewing';
				showProspect(id, mode);
			});

			//Delete event
			$('body').on('click', '.deleteLink', function(e){
				let id = $(this).data('id');
				if (confirm('Are you sure you want to delete ID: '+ id)) {
					deleteProspect(id);
				}
				
			});

			//update event
			$('body').on('click', '.editLink', function(e){
				let id = $(this).data('id');
				$('#addprospect').show();
				$('#toggle_btn').text('Hide Add Prospect Form');
				let mode = 'Editing';
				showProspect(id, mode);
			});

			//Get Prospects from API
			function getProspects() {
				$('#data-tables').DataTable({
			        "ajax": "http://gofree.test/api/prospects",
			        "columns": [
			            { "data": "id" },
			            { "data": "firstname" },
			            { "data": "lastname" },
			            { "data": "phone" },
			            { "data": "email" },
			            { "data": "call_best_time" },
			            { "data": "city" },
			            { "data": "state_id" },
			            { "data": "country_id" },
			            { "data": "timezone_id" },
			            { "data": "action" },
			        ]
			    });

			}

			//Submit event
			$('#prospectForm').on('submit', function(e){
				e.preventDefault();
				//console.log ('Hello');
				let id =$('#id').val();
				let firstname = $('#firstname').val();
				let lastname = $('#lastname').val();
				let spousename = $('#spousename').val();
				let is_married = $('#is_married').val();
				let nbr_kids = $('#nbr_kids').val();
				let source = $('#source').val();
				let phone = $('#phone').val();
				let alt_phone = $('#alt_phone').val();
				let call_best_time = $('#call_best_time').val();
				let email = $('#email').val();
				let hot_buttons = $('#hot_buttons').val();
				let company = $('#company').val();
				let profession = $('#profession').val();
				let common_ground = $('#common_ground').val();
				let interests = $('#interests').val();
				let birthday = $('#birthday').val();
				let city = $('#city').val();
				let state_id = $('#state_id').val();
				let country_id = $('#country_id').val();
				let timezone_id = $('#timezone_id').val();
				let other_info = $('#other_info').val();
				if (id) {
					console.log ('updateProspect');
					updateProspect(id, firstname, lastname, spousename, is_married, nbr_kids, source, phone, alt_phone, call_best_time, email, hot_buttons, company, profession, common_ground, interests, birthday, city, state_id, country_id, timezone_id, other_info);
				} else {
					
					if(firstname=="") {
						console.log ('firstname is empty');
						//do nothing
					} else {
						console.log ('addProspect');
						addProspect(firstname, lastname, spousename, is_married, nbr_kids, source, phone, alt_phone, call_best_time, email, hot_buttons, company, profession,common_ground, interests, birthday, city, state_id, country_id, timezone_id, other_info);
					}
				}
			});

			

			//Show Prospect using API
			function showProspect(id, mode) {
				$.ajax({
					url: 'http://gofree.test/api/prospects/'+id 
				}).done(function(prospect){
					$('#title_hdr').html(mode+' ID: '+id);
					$('#my_id').html(prospect.id);
					$('#id').val(prospect.id);
					$('#firstname').val(prospect.firstname);
					$('#lastname').val(prospect.lastname);
					$('#spousename').val(prospect.spousename);
					$('#is_married').val(prospect.is_married);
					$('#nbr_kids').val(prospect.nbr_kids);
					$('#source').val(prospect.source);
					$('#phone').val(prospect.phone);
					$('#call_best_time').val(prospect.call_best_time);
					$('#email').val(prospect.email);
					$('#hot_buttons').val(prospect.hot_buttons);
					$('#profession').val(prospect.profession);
					$('#common_ground').val(prospect.common_ground);
					$('#interests').val(prospect.interests);
					$('#birthday').val(prospect.birthday);
					$('#city').val(prospect.city);
					$('#state_id').val(prospect.state_id);
					$('#country_id').val(prospect.country_id);
					$('#timezone_id').val(prospect.timezone_id);
					$('#other_info').val(prospect.other_info);
				});
			}

			//Update Prospect using API
			function updateProspect(id, firstname, lastname, spousename, is_married, nbr_kids, source, phone, alt_phone, call_best_time, email, hot_buttons, company, profession,common_ground, interests, birthday, city, state_id, country_id, timezone_id, other_info) {
				alert('i am updating id: '+id);
				$.ajax({
					method: 'POST',
					url: 'http://gofree.test/api/prospects/'+id,
					data: {
						_method: 'PATCH',
						firstname: firstname,
						lastname: lastname,
						spousename: spousename,
						is_married: is_married,
						nbr_kids: nbr_kids,
						source: source,
						phone: phone,
						alt_phone: alt_phone,
						call_best_time: call_best_time,
						email: email,
						hot_buttons: hot_buttons,
						company: company,
						profession: profession,
						common_ground: common_ground,
						interests: interests,
						birthday: birthday,
						city: city,
						state_id: state_id,
						country_id: country_id,
						other_info: other_info
					}
				}).done(function(prospect){
					alert('Prospect # '+id+' was updated.');
					location.reload();
				});
			}

			//clear the form
			function clearForm(){
				$('#id').val('');
				$('#firstname').val('');
				$('#lastname').val('');
				$('#spousename').val('');
				$('#is_married').val('');
				$('#nbr_kids').val('');
				$('#source').val('');
				$('#phone').val('');
				$('#call_best_time').val('');
				$('#email').val('');
				$('#hot_buttons').val('');
				$('#profession').val('');
				$('#common_ground').val('');
				$('#interests').val('');
				$('#birthday').val('');
				$('#city').val('');
				$('#state_id').val('');
				$('#country_id').val('');
				$('#timezone_id').val('');
				$('#other_info').val('');
			}

			//Delete Prospect using API
			function deleteProspect(id) {
				$.ajax({
					method: 'POST',
					url: 'http://gofree.test/api/prospects/'+id,
					data: {_method: 'DELETE'}
				}).done(function(prospect){
					alert('Prospect # '+id+' was deleted.');
					location.reload();
				});
			}

			//Insert Prospects using API
			function addProspect(firstname, lastname, spousename, is_married, nbr_kids, source, phone, alt_phone, call_best_time, email, hot_buttons, company, profession,common_ground, interests, birthday, city, state_id, country_id, timezone_id, other_info) {
				$.ajax({
					method: 'POST',
					url: 'http://gofree.test/api/prospects',
					data: {
						firstname: firstname,
						lastname: lastname,
						spousename: spousename,
						is_married: is_married,
						nbr_kids: nbr_kids,
						source: source,
						phone: phone,
						alt_phone: alt_phone,
						call_best_time: call_best_time,
						email: email,
						hot_buttons: hot_buttons,
						company: company,
						profession: profession,
						common_ground: common_ground,
						interests: interests,
						birthday: birthday,
						city: city,
						state_id: state_id,
						country_id: country_id,
						timezone_id: timezone_id,
						other_info: other_info
					}
				}).done(function(prospect){
					location.reload();
				});
			}
			
		}); 
	</script>

	<?php include(resource_path('views').'/templates/scripts/listtables-data-tables.blade.php'); ?>
@endsection