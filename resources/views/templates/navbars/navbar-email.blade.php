<div class="vd_navbar vd_nav-width vd_navbar-email vd_bg-black-80 <?php if (isset($current_navbar)) {echo($current_navbar);} ?> <?php if (isset($current_navbar) && $current_navbar=="vd_navbar-left") {echo($navbar_left_extra_class);} ?> <?php if (isset($current_navbar) && $current_navbar=="vd_navbar-right") {echo($navbar_right_extra_class);} ?>">
	<div class="navbar-tabs-menu clearfix">
			<span class="expand-menu" data-action="expand-navbar-tabs-menu">
            	<span class="menu-icon menu-icon-left">
            		<i class="fa fa-ellipsis-h"></i>
                    <span class="badge vd_bg-red">
                        20
                    </span>                    
                </span>
            	<span class="menu-icon menu-icon-right">
            		<i class="fa fa-ellipsis-h"></i>
                    <span class="badge vd_bg-red">
                        20
                    </span>                    
                </span>                
            </span>  
            <div class="menu-container">               
                 <?php include(resource_path('views')."/templates/navbars/tabs-search.blade.php") ?>   
            </div>        
                                                 
    </div>
	<div class="navbar-menu clearfix">
    	<h3 class="menu-title hide-nav-medium hide-nav-small"><a href="/admin/dashboard" class="btn vd_btn vd_bg-red"><span class="append-icon"><i class="fa fa-dashboard"></i></span>Dashboard</a></h3>
        <div class="vd_menu">
            <?php include(resource_path('views')."/templates/navbars/menu-email.blade.php") ?>  
        </div>  

            
    </div>
    <div class="navbar-spacing clearfix">
    </div>
</div>