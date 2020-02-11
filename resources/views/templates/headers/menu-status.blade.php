<!-- From: /templates/headers/header-1.blade.php -->
<!-- menu-status -->
<ul class="mega-ul">
    <?php //include_once(resource_path('views')."/templates/headers/top-menu.blade.php"); ?>
     
    <li id="top-menu-profile" class="profile mega-li"> 
        <a href="#" class="mega-link"  data-action="click-trigger"> 
            <span  class="mega-image">
                <img src="<?php echo asset('img/avatar/avatar.jpg'); ?>" alt="example image" />               
            </span>
            <span class="mega-name">
                <?php echo Auth::user()->username; ?> <i class="fa fa-caret-down fa-fw"></i> 
            </span>
        </a> 
      <div class="vd_mega-menu-content  width-xs-2  left-xs left-sm" data-action="click-target">
        <div class="child-menu"> 
        	<div class="content-list content-menu">
                <ul class="list-wrapper pd-lr-10">
                    <li> <a href="<?php echo Auth::user()->isAdmin() ? '/admin/users' : '/profile'; ?>/<?php echo Auth::user()->id; ?>"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">My Profile</div> </a> </li>
                    <!-- <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-trophy"></i></div> <div class="menu-text">My Achievements</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-envelope"></i></div> <div class="menu-text">Messages</div><div class="menu-badge"><div class="badge vd_bg-red">10</div></div> </a>  </li> -->
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-tasks
"></i></div> <div class="menu-text"> Tasks</div><div class="menu-badge"><div class="badge vd_bg-red">5</div></div> </a> </li> 
                    <li class="line"></li>                
                    <!-- <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-lock
"></i></div> <div class="menu-text">Privacy</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-cogs"></i></div> <div class="menu-text">Settings</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class="  fa fa-key"></i></div> <div class="menu-text">Lock</div> </a> </li> -->
                    
                    <li><a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power"></i> <div class="menu-icon"><i class=" fa fa-sign-out"></i></div>  <div class="menu-text">Sign Out</div> </a>

                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        </form>
                    </li>
                    <!--<li class="line"></li>                
                     <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-question-circle"></i></div> <div class="menu-text">Help</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" glyphicon glyphicon-bullhorn"></i></div> <div class="menu-text">Report a Problem</div> </a> </li>  -->             
                </ul>
            </div> 
        </div> 
      </div>     
  
    </li> 
                  
    <?php if ($navbar_right_config != 0){   ?>   
    <li id="top-menu-settings" class="one-big-icon hidden-xs hidden-sm mega-li" data-intro="<strong>Toggle Right Navigation </strong><br/>On smaller device such as tablet or phone you can click on the middle content to close the right or left navigation." data-step=2 data-position="left"> 
    	<a href="#" class="mega-link"  data-action="toggle-navbar-right"> 
           <span class="mega-icon">
                <i class="fa fa-comments"></i> 
            </span> 
<!--            <span  class="mega-image">
                <img src="<?php echo asset('img/avatar/avatar.jpg'); ?>" alt="example image" />               
            </span> -->           
			<span class="badge vd_bg-red">8</span>               
        </a>              
       
    </li>
	<?php } ?>
</ul>
<!-- Head menu search form ends --> 