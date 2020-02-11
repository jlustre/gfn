 <!-- menu-default -->
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
            </ul>   
      	</div>
    </li>
    <li>
        <a href="javascript:void(0);" data-action="click-trigger">
            <span class="menu-icon"><i class="fa fa-dashboard"></i></span> 
            <span class="menu-text">Manage</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
        <div class="child-menu"  data-action="click-target">
            <ul>
                <li>
                    <a href="/manage/todo">
                        <span class="menu-icon"><i class="fa fa-list-ol"></i></span>
                        <span class="menu-text">My Todos List</span>  
                    </a>
                </li>
                <li>
                    <a href="/manage/prospect">
                        <span class="menu-icon"><i class="fa fa-users"></i></span>
                        <span class="menu-text">My Prospects List</span>  
                    </a>
                </li>                
                                                                                                                 
            </ul>   
        </div>
    </li>     
                 
</ul>
<!-- Head menu search form ends --> 