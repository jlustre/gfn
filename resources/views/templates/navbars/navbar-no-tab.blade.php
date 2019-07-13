<div class="vd_navbar vd_nav-width vd_navbar-no-tab <?php if (isset($current_navbar)) {echo($current_navbar);} ?> <?php if (isset($current_navbar) && $current_navbar=="vd_navbar-left") {echo($navbar_left_extra_class);} ?> <?php if (isset($current_navbar) && $current_navbar=="vd_navbar-right") {echo($navbar_right_extra_class);} ?>">
	<div class="navbar-menu clearfix">
        <div class="vd_panel-menu hidden-xs">
            <span data-original-title="Expand All" data-toggle="tooltip" data-placement="bottom" data-action="expand-all" class="menu">
                <i class="fa fa-sort-amount-asc"></i>
            </span>                   
        </div>
    	<h3 class="menu-title hide-nav-medium hide-nav-small">UI Features</h3>
        <div class="vd_menu">
			<?php 
              if (isset($current_navbar) && $current_navbar=="vd_navbar-left"){
                include(resource_path('views')."/templates/navbars/menu-".$navbar_left_menu.".blade.php");
              } else if (isset($current_navbar) && $current_navbar=="vd_navbar-right"){
                include(resource_path('views')."/templates/navbars/menu-".$navbar_right_menu.".blade.php");				  
              }			
            ?>
        </div>             
    </div>
    <div class="navbar-spacing clearfix">
    </div>
    <div class="vd_menu vd_navbar-bottom-widget">
        <ul>
            <li>
                <a href="pages-logout.php">
                    <span class="menu-icon"><i class="fa fa-sign-out"></i></span>          
                    <span class="menu-text">Logout</span>             
                </a>
                
            </li>
        </ul>
    </div>     
</div>