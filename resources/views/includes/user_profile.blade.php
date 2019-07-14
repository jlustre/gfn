<div class="vd_content-section clearfix">
        <div class="row">
          <div class="col-sm-3">
            <div class="panel widget light-widget panel-bd-top">
              <div class="panel-heading no-title"> </div>
              <div class="panel-body">
                <div class="text-center vd_info-parent"> <img alt="example image" src="<?php echo asset('img/avatar/big.jpg'); ?>"> </div>
                <div class="row">
                  <div class="col-xs-12"> <a class="btn vd_btn vd_bg-green btn-xs btn-block no-br"><i class="fa fa-check-circle append-icon" ></i>Friends</a> </div>
                  <div class="col-xs-12"> <a class="btn vd_btn vd_bg-grey btn-xs btn-block no-br"><i class="fa fa-envelope append-icon"></i>Send Message</a> </div>
                </div>
                <h2 class="font-semibold mgbt-xs-5">{{  $user->profile->firstname.' '.$user->profile->lastname }}</h2>
                <h4>{{ $user->email }}</h4>
                <p>Ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                <div class="mgtp-20">
                  <table class="table table-striped table-hover">
                    <tbody>
                      <tr>
                        <td style="width:60%;">Member Status: </td>
                        <td><span class="label label-{{ $user->is_active ? 'success' : 'default' }}">{{ $user->is_active ? 'Active' : 'Inactive' }}</span></td>
                      </tr>
                      <tr>
                        <td>User Rating: </td>
                        <td><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i></td>
                      </tr>
                      
                      <tr>
                        <td>Role: </td>
                        <td> {{ $user->role->name }} </td>
                      </tr>

                      <tr>
                        <td>Rank: </td>
                        <td> {{ $user->role->name }} </td>
                      </tr>

                      <tr>
                        <td>Member Since: </td>
                        <td> {{ $user->created_at }} </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- panel widget -->
            
             <?php  //include(resource_path('views').'/templates/widgets/friends.blade.php'); ?>
          </div>
          <div class="col-sm-9">
            <?php  include(resource_path('views').'/templates/widgets/widget-profile-tabs.blade.php'); ?>
          </div>
        </div>
        <!-- row --> 
        
      </div>
      <!-- .vd_content-section -->