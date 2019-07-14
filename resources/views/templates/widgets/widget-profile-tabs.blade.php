<div class="tabs widget">
  <ul class="nav nav-tabs widget">
    <li class="active">
      <a data-toggle="tab" href="#profile-tab"> Profile <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a>
    </li>

    <li>
      <a data-toggle="tab" href="#projects-tab"> Projects <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a>
    </li> 

    <li>
      <a data-toggle="tab" href="#photos-tab"> Photos <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a>
    </li>

    <li>
      <a data-toggle="tab" href="#friends-tab"> Friends <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a>
    </li>
    <li>
      <a data-toggle="tab" href="#groups-tab"> Groups <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a>
    </li>
  </ul>

  <div class="tab-content">
    <div id="profile-tab" class="tab-pane active">
      <div class="pd-20">
<div class="vd_info tr"> <a class="btn vd_btn btn-xs vd_bg-yellow"> <i class="fa fa-pencil append-icon"></i> Edit </a> </div>      
        <h3 class="mgbt-xs-15 mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i> ABOUT</h3>
        <div class="row">
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">First Name:</label>
              <div class="col-xs-7 controls"><?php echo $user->profile->firstname; ?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Last Name:</label>
              <div class="col-xs-7 controls"><?php echo $user->profile->lastname; ?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Sponsor:</label>
              <div class="col-xs-7 controls"><?php echo $user->sponsor; ?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">User Name:</label>
              <div class="col-xs-7 controls"><?php echo $user->username; ?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Email:</label>
              <div class="col-xs-7 controls"><?php echo $user->email; ?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Phone:</label>
              <div class="col-xs-7 controls"><?php echo $user->profile->phone; ?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">City:</label>
              <div class="col-xs-7 controls">Los Angeles</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Country:</label>
              <div class="col-xs-7 controls">United States</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Birthday:</label>
              <div class="col-xs-7 controls">Jan 22, 1984</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Interests:</label>
              <div class="col-xs-7 controls">Basketball, Web, Design, etc.</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Website:</label>
              <div class="col-xs-7 controls"><a href="http://asbeez.com">www.asbeez.com</a></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Phone:</label>
              <div class="col-xs-7 controls">+1-234-5678</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
        </div>
        <hr class="pd-10"  />
        
        <div class="row">
          <?php  //include(resource_path('views').'/templates/widgets/experience.blade.php'); ?>
          <?php  //include(resource_path('views').'/templates/widgets/education.blade.php'); ?>
        </div>
        <!-- row -->
        <hr class="pd-10"  />

        <div class="row">
          <?php  //include(resource_path('views').'/templates/widgets/activity.blade.php'); ?>
          <!-- col-sm-7 --> 
          <?php  //include(resource_path('views').'/templates/widgets/skill.blade.php'); ?>
          <!-- col-sm-7 -->           
        </div>
        <!-- row --> 
      </div>
      <!-- pd-20 --> 
    </div>
    <!-- home-tab -->
    
    <?php  //include(resource_path('views').'/templates/widgets/projects-tab.blade.php'); ?>
    <?php  //include(resource_path('views').'/templates/widgets/photos-tab.blade.php'); ?>
    <?php  //include(resource_path('views').'/templates/widgets/friends-tab.blade.php'); ?>
    <?php  //include(resource_path('views').'/templates/widgets/groups-tab.blade.php'); ?>

  </div>
  <!-- tab-content --> 
</div>
<!-- tabs-widget -->