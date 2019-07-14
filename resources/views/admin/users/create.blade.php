@extends('layouts.admin')

@section('page_data')
    <?php include(resource_path('views').'/templates/config.php'); ?>
@endsection

@section('specific_css')
	<!-- Specific Page Data -->
	<?php $title = 'Email Pages - Responsive Multipurpose Admin Templates'; ?>
	<?php $keywords = 'HTML5 Template, CSS3, All Purpose Admin Template, Vendroid'; ?>
	<?php $description = 'Responsive Admin Template for blogging dashboard'; ?>
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
	<style type="text/css">
		.invalid-feedback {
			font-size: .9em;
			color: red;
		}
	</style> 
	<!-- End of Data -->
@endsection

@include('includes.headers_sidebars')

@section('content')
<div class="row">
	<div class="col-md-12">
	    <div class="login-content border border-info">
	    	 <div><a href="/admin/users"><button class="btn btn-info btn-sm">Go Back</button></a></div>
	        <div class="register-form">
	        	{!! Form::open(['action'=>'AdminUsersController@store', 'method' => 'POST', 'class'=>'form-horizontal', 'role'=>'form', 'id'=>'register-form']) !!}
                  <div class="alert alert-danger vd_hidden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again. </div>
                  
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label  col-sm-2">Sponsor Username <span class="vd_red">*</span></label>
                      <div id="sponsor-input-wrapper"  class="controls col-sm-6">
                        <input type="text" placeholder="Your Sponsor's Username" class="width-60 required @error('sponsor') is-invalid @enderror" value="{{ old('sponsor') }}" name="sponsor" id="sponsor" required >
                        @error('sponsor')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label  col-sm-2">Username <span class="vd_red">*</span></label>
                      <div id="username-input-wrapper"  class="controls col-sm-6">
                        <input type="text" placeholder="Your Username" class="width-60 required @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" id="username" required >
                        @error('username')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label  col-sm-2">First Name <span class="vd_red">*</span></label>
                      <div id="firstname-input-wrapper"  class="controls col-sm-6">
                        <input type="text" placeholder="First Name" class="width-60 required @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}" name="firstname" id="firstname" required >
                        @error('firstname')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label  col-sm-2">Last Name <span class="vd_red">*</span></label>
                      <div id="lastname-input-wrapper"  class="controls col-sm-6">
                        <input type="text" placeholder="Last Name" class="width-60 required @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" name="lastname" id="lastname" required >
                        @error('lastname')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label col-sm-2" >Email <span class="vd_red">*</span></label>
                      <div id="email-input-wrapper"  class="controls col-sm-6">
                        <input type="email" placeholder="Email Address" class="width-60 required @error('email') is-invalid @enderror" value="{{ old('email') }}" required  name="email" id="email">
                        @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label col-sm-2" >Confirm Email <span class="vd_red">*</span></label>
                      <div id="confirm-email-input-wrapper"  class="controls col-sm-6">
                        <input type="email" placeholder="Confirm Email Address" class="width-60 required @error('email_confirmation') is-invalid @enderror" value="{{ old('email_confirmation') }}" required  name="email_confirmation" id="email_confirmation">
                        @error('email_confirmation')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label col-sm-2">Password <span class="vd_red">*</span></label>
                      <div id="password-input-wrapper"  class="controls col-sm-6">
                        <input type="password" placeholder="Password" class="width-60 required @error('password') is-invalid @enderror" required  name="password" id="password">
                        @error('password')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label col-sm-2">Confirm Password <span class="vd_red">*</span></label>
                      <div id="confirm-password-input-wrapper" class="controls col-sm-6">
                        <input type="password" placeholder="Confirm Password" class="width-60 required @error('password_confirmation') is-invalid @enderror"  required  name="password_confirmation" id="password_confirmation">
                        @error('password_confirmation')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label col-sm-2">Select Role <span class="vd_red">*</span></label>
                      <div id="confirm-password-input-wrapper" class="controls col-sm-6">
                      <select class="width-60 required @error('role_id') is-invalid @enderror"  required  name="role_id" id="role_id">
                        @foreach($roles as $role) 
		                   <option value="{{ $role->id }}">{{ $role->name }}</option>
		                @endforeach
		              </select>
                        @error('role_id')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
	                    <div class="col-md-12">
	                      <label class="control-label col-sm-2" >Member Status <span class="vd_red">*</span></label>
	                      <div id="isactive-input-wrapper"  class="controls col-sm-6">
	                        <div class="vd_radio radio-success">
	                          <input type="radio" checked value="1" id="optionsRadios3" name="is_active">
	                          <label for="optionsRadios3"> Active </label>
	                          <input type="radio" value="0" id="optionsRadios4" name="is_active">
	                          <label for="optionsRadios4"> Inactive </label>
	                        </div>
	                      </div>
	                    </div>
	                  </div>

                  <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                  <div class="form-group">
                    <div class="col-sm-2"></div>
                    <div class="col-md-6 mgbt-xs-5 mgtp-5">
                      <div class="vd_checkbox checkbox-success">
                        <input type="checkbox" id="checkbox_agree" value="1" required name="checkbox_agree" class="required @error('checkbox_agree') is-invalid @enderror"  required>
                        <label for="checkbox_agree"> I agree with <a href="#">terms of service</a></label>
                        @error('checkbox_agree')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                      </div>
                      <div class="mgtp-10">
                        <button class="btn vd_bg-green vd_white" type="submit" id="submit-register" name="submit-register">Register</button>
                      </div>
                    </div>
                    <div class="col-md-12 mgbt-xs-5"> </div>
                  </div>
                </form>
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('page_script')
    <?php //include(resource_path('views').'/templates/scripts/forms-validation.blade.php'); ?>
@endsection


