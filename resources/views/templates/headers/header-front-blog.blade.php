<?php //require_once('templates/headers/head.tpl.php'); ?>
@include('templates.headers.head')
<!-- header-front-blog -->
<!-- Header Start -->
  <header class="header-2" id="header">
      <div class="vd_top-menu-wrapper <?php if (isset($top_menu_extra_class)) { echo($top_menu_extra_class);}?>">
        <div class="container">
          <div class="vd_top-nav vd_nav-width  <?php if (isset($logo_container_extra_class)) { echo($logo_container_extra_class);}?>">
          <div class="vd_panel-header">
          	<div class="logo">
            	<a href="index.php"><img alt="logo" src="<?php if (isset($logo_path)) { echo($logo_path);}?>"></a>
            </div>
            <!-- logo -->
            <div class="vd_panel-menu visible-sm visible-xs">
                	<span class="menu visible-xs" data-action="submenu">
	                    <i class="fa fa-bars"></i>
                    </span>                                 
            </div>                                     
            <!-- vd_panel-menu -->
          </div>
          <!-- vd_panel-header -->
            
          </div>    
          <div class="vd_container">
          	<div class="row">
            	<div class="col-sm-8 col-xs-12">
              		<div class="vd_mega-menu-wrapper horizontal-menu">
                    	<div class="vd_mega-menu">                
            				<?php //include_once("menu-link-front-blog.tpl.php"); ?>
                    @include('templates.headers.menu-link-front-blog')
                        </div>
                    </div>                    
                </div>
                <div class="col-sm-4 col-xs-12">
              		<div class="vd_mega-menu-wrapper">
                    	<div class="vd_mega-menu pull-right">
            				<?php //include("menu-login-btn-2.tpl.php"); ?> 
                    @include('templates.headers.menu-login-btn-2')                       
                        </div>
                    </div>
                </div>

            </div>
          </div>
        </div>
        <!-- container --> 
      </div>
      <!-- vd_primary-menu-wrapper --> 

  </header>
  <!-- Header Ends --> 