@extends('layouts.app')

@section('page_data')
<?php require_once(resource_path('views').'/templates/config.php'); ?>
@endsection

@section('specific_css')
  <?php $title = 'Login Pages HTML Template - Responsive Multipurpose Admin Templates'; ?>
  <?php $keywords = 'HTML5 Template, CSS3, All Purpose Admin Template, Vendroid'; ?>
  <?php $description = 'Login Pages - Responsive Admin HTML Template'; ?>
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
    }
    .is-invalid {
      border: 1px solid red;
    }
    
  </style>
@endsection

@section('content')
<!-- Middle Content Start -->
    <div class="vd_content-wrapper">
      <div class="vd_container">
        <div class="vd_content clearfix">
          <div class="vd_content-section clearfix">
            <div class="vd_login-page">
              <div class="heading clearfix">
                <div class="logo">
                  <h2 class="mgbt-xs-5"><img src="{{ asset('img/logo.png') }}" alt="logo"></h2>
                </div>
                <h4 class="text-center font-semibold vd_grey">{{ __('LOGIN TO YOUR ACCOUNT') }}</h4>
              </div>
              <div class="panel widget">

                <div class="panel-body">
                  <div class="login-icon entypo-icon"> <i class="icon-key"></i> </div>
                  @include('includes.messages')
                  <form class="form-horizontal" id="login-form" role="form" method="POST" action="/login">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                <div class="form-group  mgbt-xs-2">
                  <div class="col-md-12">
                    <div class="label-wrapper sr-only">
                      <label class="control-label" for="email">{{ __('E-Mail Address') }}</label>
                    </div>
                    <div class="vd_input-wrapper" id="email-input-wrapper"> <span class="menu-icon"> <i class="fa fa-envelope"></i> </span>
                      <input id="email" type="email" placeholder="Email" class="required form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                      <br>
                    <div class="label-wrapper">
                      <label class="control-label sr-only" for="password">{{ __('Password') }}</label>
                    </div>
                    <div class="vd_input-wrapper" id="password-input-wrapper" > <span class="menu-icon"> <i class="fa fa-lock"></i> </span>
                      <input type="password" placeholder="Password" id="password" name="password" class="required @error('password') is-invalid @enderror"  required autocomplete="current-password">
                    </div>
                  </div>
                </div> <!-- email/password fields -->

                <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                    
                <div class="form-group">
                  <div class="col-md-12 text-center mgbt-xs-5">
                    <button class="btn vd_bg-green vd_white width-100" type="submit" id="login-submit">{{ __('Login') }}</button>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="vd_checkbox">
                          <input class="form-check-input" type="checkbox" value="1" name="remember" id="checkbox-1" {{ old('remember') ? 'checked' : '' }}>
                          <label for="checkbox-1"> {{ __('Remember Me') }}</label>
                        </div>
                      </div>
                      <div class="col-xs-6 text-right">
                        <div class="">
                         <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div> <!-- submit/remember/forget -->
            </form>

            </div> <!-- panel body -->
            </div> <!-- panel widget  -->

              @if (Route::has('register'))
              <!-- Panel Widget -->
              <div class="register-panel text-center font-semibold"> <a href="/register">CREATE AN ACCOUNT<span class="menu-icon"><i class="fa fa-angle-double-right fa-fw"></i></span></a> </div>
              @endif
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
    <?php //include(resource_path('views').'/templates/scripts/pages-login.blade.php'); ?>
@endsection
