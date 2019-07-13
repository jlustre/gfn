<?php //require_once(resource_path('views').'/templates/headers/opening.blade.php'); ?>
<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html><!--<![endif]-->
<?php $root=$_SERVER['DOCUMENT_ROOT']; 
      //$subfolder="/vendroid";
      $subfolder="";
      $site="http://localhost/vendroid/"; // not used, for future development 
?>

<!-- Specific Page Data -->
@yield('page_data') 
<!-- End of Data -->

<!-- Specific Page Data -->
@yield('specific_css') 
<!-- End of Data -->

<?php require(resource_path('views').'/templates/headers/'.$header.'.blade.php'); ?>

<div class="content">
  <div class="container">
    <!-- Start Left Sidebar -->
    @yield('sidebar_left') 
    <!-- End Left Sidebar -->

    <!-- Start Right Sidebar -->
    @yield('sidebar_right') 
    <!-- End Right Sidebar -->
    
    <!-- Start Middle Content -->
    <div class="vd_content-wrapper">
      <div class="vd_container">
        <div class="vd_content clearfix">
          <!-- Start Right Sidebar -->
            @yield('breadcrumb') 
          <!-- End Right Sidebar -->

          <!-- Start Right Sidebar -->
            @yield('title_header') 
          <!-- End Right Sidebar -->
          
          <div class="vd_content-section clearfix">
             @yield('content') 
          </div> <!-- .vd_content-section --> 

        </div> <!-- .vd_content --> 
      </div> <!-- .vd_container --> 
    </div> <!-- .vd_content-wrapper --> 
    <!-- End Middle Content --> 
    
  </div>
  <!-- .container --> 
</div>
<!-- .content -->

<?php require_once(resource_path('views').'/templates/footers/'.$footer.'.blade.php'); ?>

<!-- Specific Page Scripts Put Here -->
@yield('page_script')

<!-- Specific Page Scripts END -->
<?php require_once(resource_path('views').'/templates/footers/closing.blade.php'); ?>


