@extends('layouts.app')

@section('page_data')
<?php require_once(resource_path('views').'/templates/config.php'); ?>
@endsection

@section('specific_css')
<!-- Specific Page Data -->
<?php $title = 'Register Pages HTML Template - Responsive Multipurpose Admin Templates'; ?>
<?php $keywords = 'HTML5 Template, CSS3, All Purpose Admin Template, Vendroid'; ?>
<?php $description = 'Register Pages - Responsive Admin HTML Template'; ?>
<?php $page = 'pages';   // To set active on the same id of primary menu ?>
<?php 
    // Specific Configuration
    $header = 'header-empty'; 
    $body_extra_class="remove-navbar login-layout";  
    $footer = "footer-2"; 
    $background = "background-login"; 
    $navbar_left_config = 0;
    $navbar_right_config = 0; 
?>
<style type="">
    .invalid-feedback {
      color: red;
      font-size: .9em;
    }
  </style>
@endsection

@section('content')
 <!-- Middle Content Start -->
    <div class="vd_content-wrapper" >
      <div class="vd_container">
        <div class="vd_content clearfix">
          <div class="vd_content-section clearfix">
            <div class="vd_register-page">
              <div class="heading clearfix">
                <div class="logo">
                  <h2 class="my-0"><img src="{{ asset('img/logo.png') }}" alt="logo"></h2>
                </div>
                <h4 class="text-center font-semibold vd_grey my-0">USER REGISTRATION</h4>
              </div>
              <div class="panel widget">
                <div class="panel-body">
                  @include('includes.messages')
                  <form class="form-horizontal" action="{{ route('register') }}" role="form" id="register-form" method="POST" >
                    @csrf

                  <div class="alert alert-danger vd_hidden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again. </div>

                  <div class="alert alert-warning vd_hidden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>Your password and Confirm password are not same </div>                    
                  <div class="alert alert-success vd_hidden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span>Registration confirmation has been sent to your email. 
                  </div> 

                  <div class="form-group">
                      <div class="col-md-6">
                        <div class="label-wrapper">
                          <label class="control-label">{{ __('Sponsor') }}<span class="vd_red">*</span></label>
                        </div>
                        <div class="vd_input-wrapper" id="sponsor-input-wrapper"> <span class="menu-icon"> <i class="fa fa-user"></i> </span>
                          <input id="sponsor" type="text" placeholder="{{ __('Sponsor') }}" class="required @error('sponsor') is-invalid @enderror" name="sponsor" value="{{ old('sponsor') }}" required autocomplete="sponsor" autofocus>
                            @error('sponsor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="label-wrapper">
                          <label class="control-label">{{ __('Username') }}<span class="vd_red">*</span></label>
                        </div>
                        <div class="vd_input-wrapper" id="last-name-input-wrapper"> <span class="menu-icon"> <i class="fa fa-user"></i> </span>
                          <input id="username" type="text" placeholder="{{ __('Username') }}" class="required @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-6">
                        <div class="label-wrapper">
                          <label class="control-label">{{ __('First Name') }}<span class="vd_red">*</span></label>
                        </div>
                        <div class="vd_input-wrapper" id="first-name-input-wrapper"> <span class="menu-icon"> <i class="fa fa-user"></i> </span>
                          <input id="firstname" type="text" placeholder="{{ __('First Name') }}" class="required @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                            @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="label-wrapper">
                          <label class="control-label">{{ __('Last Name') }}<span class="vd_red">*</span></label>
                        </div>
                        <div class="vd_input-wrapper" id="last-name-input-wrapper"> <span class="menu-icon"> <i class="fa fa-user"></i> </span>
                          <input id="lastname" type="text" placeholder="{{ __('Last Name') }}" class="required @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-6">
                        <div class="label-wrapper">
                          <label class="control-label">{{ __('Email Address') }}<span class="vd_red">*</span></label>
                        </div>
                        <div class="vd_input-wrapper" id="email-input-wrapper"> <span class="menu-icon"> <i class="fa fa-envelope"></i> </span>
                          <input id="email" type="email" placeholder="{{ __('Email Address') }}" class="required @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="label-wrapper">
                          <label class="control-label">{{ __('Phone') }}</label>
                        </div>
                        <div class="vd_input-wrapper" id="phone-input-wrapper"> <span class="menu-icon"> <i class="fa fa-phone"></i> </span>
                          <input id="phone" type="text" placeholder="{{ __('Phone') }}" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-6">
                        <div class="label-wrapper">
                          <label class="control-label">{{ __('Password') }}<span class="vd_red">*</span></label>
                        </div>
                        <div class="vd_input-wrapper" id="password-input-wrapper"> <span class="menu-icon"> <i class="fa fa-lock"></i> </span>
                          <input id="password" type="password" placeholder="{{ __('Password') }}" class="required @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="label-wrapper">
                          <label class="control-label">{{ __('Confirm Password') }}<span class="vd_red">*</span></label>
                        </div>
                        <div class="vd_input-wrapper" id="password_confirmation-input-wrapper"> <span class="menu-icon"> <i class="fa fa-lock"></i> </span>
                          <input id="password_confirmation" type="password" placeholder="{{ __('Confirm Password') }}" class="required @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}"  autocomplete="password_confirmation" required autofocus>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-6">
                        <div class="label-wrapper">
                          <label class="control-label">{{ __('Country') }}</label>
                        </div>
                        <div class="vd_input-wrapper" id="country-input-wrapper"> 
                            <select id="country_id" name="country_id">
                                <option value="0" selected disabled><span class="menu-icon"> Select Country</option>
                                <option value="1"><span class="menu-icon"> United States</option>
                            </select>
                       </div>
                      </div>
                      <div class="col-md-6">
                        <div class="label-wrapper">
                          <label class="control-label">{{ __('Timezone') }}</label>
                        </div>
                        <div class="vd_input-wrapper" id="timezone-input-wrapper"> <span class="menu-icon"></span>
                            <select id="timezone_id" name="timezone_id">
                                <option value="0" selected disabled> Select Timezone</option>
                                <option value="1"> Pacific (PST)</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    
                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>

                    <div class="form-group">
                      <div class="col-md-12">
                        <div class="vd_checkbox">
                          <input type="checkbox" id="check_agree" value="1" required name="check_agree" class="required @error('check_agree') is-invalid @enderror" >
                          <label for="check_agree"> I agree with <a href="#">terms of service<span class="vd_red">*</span></a></label>
                           @error('check_agree')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                      </div>
                      <div class="col-md-12 text-center">
                        <button class="btn vd_bg-green vd_white width-100" type="submit" id="submit-register" name="submit-register">Register</button>
                      </div>
                    </div>

                  </form>
                </div>
                <div class="register-panel text-center font-semibold"> Already Have an Account? <br/>
                <a href="/login">SIGN IN<span class="menu-icon"><i class="fa fa-angle-double-right fa-fw"></i></span></a>
              </div>
              </div>
              <!-- Panel Widget -->
            </div>
            <!-- vd_login-page --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 
    </div>
    <!-- .vd_content-wrapper --> 
    
    <!-- Middle Content End --> 
@endsection

@section('page_script')
<?php //include(resource_path('views').'/templates/scripts/pages-register.blade.php'); ?>
@endsection
