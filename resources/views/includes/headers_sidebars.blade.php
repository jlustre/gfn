@section('sidebar_left')
    <?php if ($navbar_left_config != 0) { $current_navbar="vd_navbar-left"; require(resource_path('views').'/templates/navbars/'.$navbar_left.'.blade.php'); }?>
@endsection

@section('sidebar_right')
    <?php if ($navbar_right_config != 0) { $current_navbar="vd_navbar-right"; require(resource_path('views').'/templates/navbars/'.$navbar_right.'.blade.php'); }?>
@endsection

@section('breadcrumb')
    <?php include(resource_path('views').'/templates/widgets/head-section.blade.php'); ?> 
@endsection

@section('title_header')
     <?php include(resource_path('views').'/templates/widgets/title-section.blade.php'); ?>  
@endsection