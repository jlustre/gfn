<ul class="mega-ul">
    <li id="top-menu-1" class="one-icon mega-li"> 
		<a href="/login" class="btn vd_btn vd_bg-yellow font-semibold"><?php echo  __('Login'); ?></a>	
    </li>
   <?php if (Route::has('register')) { ?>
    <li id="top-menu-2" class="one-icon mega-li"> 
		<a href="/register" class="btn vd_btn  vd_bg-yellow font-semibold"><?php echo  __('Register'); ?></a>	
    </li>
   <?php } ?>

</ul>
<!-- Head menu search form ends --> 
