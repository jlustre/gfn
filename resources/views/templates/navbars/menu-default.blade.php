 <ul>
    <?php if (Auth::user()->isAdmin() && Auth::user()->isActive()) { ?>
    <li>
        <a href="/admin/users">
            <span class="menu-icon"><i class="fa fa-dashboard"></i></span> 
            <span class="menu-text">Admin</span>  
        </a> 
    </li>
    <?php } ?>

    <li>
    	<a href="javascript:void(0);" data-action="click-trigger">
        	<span class="menu-icon"><i class="fa fa-dashboard"></i></span> 
            <span class="menu-text">Dashboard</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
       	</a>
     	<div class="child-menu"  data-action="click-target">
            <ul>
                <li>
                    <a href="index.php">
                        <span class="menu-text">Default Dashboard</span>  
                    </a>
                </li>              
                <li>
                    <a href="index-ecommerce.php">
                        <span class="menu-text">E-Commerce Dashboard</span>  
                    </a>
                </li> 
                <li>
                    <a href="index-analytics.php">
                        <span class="menu-text">Analytics Dashboard</span>  
                    </a>
                </li> 
                <li>
                    <a href="index-blogging.php">
                        <span class="menu-text">Blogging Dashboard</span>  
                    </a>
                </li>  
                <li>
                    <a href="index-event-management.php">
                        <span class="menu-text">Event Management Dashboard</span>  
                        <span class="menu-badge"><span class="badge vd_bg-yellow">NEW</span></span>
                    </a>
                </li>                                                                                                  
            </ul>   
      	</div>
    </li>  
 	 
    <li>
    	<a href="#">
        	<span class="menu-icon"><i class="fa fa-shopping-cart"></i></span> 
            <span class="menu-text">Buy Products</span>  
            <span class="menu-badge"><span class="badge vd_bg-red"><i class="fa fa-exclamation"></i></span></span>
       	</a>
    </li>   
                 
</ul>
<!-- Head menu search form ends --> 