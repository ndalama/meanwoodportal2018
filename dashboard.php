<?php
	include('system_load.php');
	//Including this file we load system.
	/*
	Logout function if called.
	*/
	if(isset($_GET['logout']) && $_GET['logout'] == 1) { 
		session_destroy();
		HEADER('LOCATION: '.get_option('redirect_on_logout'));
		exit();
	} //Logout done.
	
	//user Authentication.
	authenticate_user('admin');
	
	$page_title = $label_obj->label('dashboard_title'); //You can edit this to change your page title.
	require_once("includes/header.php"); //including header file.
?>

	<!--Small Widget Starts Here-->
    <div class="col-sm-3">
      <div class="dash-widget dash-counter" data-count=".num" data-from="0" data-to="99.9" data-suffix="%" data-duration="2">
          <div class="dash-icon">
              <i class="glyphicon glyphicon-user"></i>
          </div>
          <div class="dash-label">
              <strong class="num"><?php $new_user->get_total_users('all');?></strong>
              <span><?php echo $label_obj->label('total_users'); ?></span>
          </div>
      </div>
	</div>
    
    <div class="col-sm-3">
      <div class="dash-widget dash-counter" data-count=".num" data-from="0" data-to="99.9" data-suffix="%" data-duration="2">
          <div class="dash-icon">
              <i class="glyphicon glyphicon-user"></i>
          </div>
          <div class="dash-label">
              <strong class="num"><?php $new_user->get_total_users('activate');?></strong>
              <span><?php echo $label_obj->label('active_users'); ?></span>
          </div>
      </div>
	</div>
    
    <div class="col-sm-3">
      <div class="dash-widget dash-counter" data-count=".num" data-from="0" data-to="99.9" data-suffix="%" data-duration="2">
          <div class="dash-icon">
              <i class="glyphicon glyphicon-user"></i>
          </div>
          <div class="dash-label">
              <strong class="num"><?php $new_user->get_total_users('deactivate');?></strong>
              <span><?php echo $label_obj->label('deactivate_users'); ?></span>
          </div>
      </div>
	</div>
    
    <div class="col-sm-3">
      <div class="dash-widget dash-counter" data-count=".num" data-from="0" data-to="99.9" data-suffix="%" data-duration="2">
          <div class="dash-icon">
              <i class="glyphicon glyphicon-user"></i>
          </div>
          <div class="dash-label">
              <strong class="num"><?php $new_user->get_total_users('ban');?></strong>
              <span><?php echo $label_obj->label('ban_users'); ?></span>
          </div>
      </div>
	</div>
    
    <div class="col-sm-3">
      <div class="dash-widget dash-counter" data-count=".num" data-from="0" data-to="99.9" data-suffix="%" data-duration="2">
          <div class="dash-icon">
              <i class="glyphicon glyphicon-user"></i>
          </div>
          <div class="dash-label">
              <strong class="num"><?php $new_user->get_total_users('suspend');?></strong>
              <span><?php echo $label_obj->label('suspend_users'); ?></span>
          </div>
      </div>
	</div>
  	<!--Small Widget Ends Here-->
</div>
<div class="row mywidget"> 
	<h3 style="margin-left:15px;">User Levels</h3>
	<?php $new_level->get_level_info(); ?>
</div>    
 
    <!--============================= Chat Section area Starts Here =====================================-->
    
    <div class="row mywidget">
    	
        <div class="dash-widget dash-conversations">
						
						<div class="dash-header clearfix">
							<div class="dash-icon">						
								<i class="glyphicon glyphicon-bullhorn"></i>
							</div>
							<div class="dash-label">
								<h3>
									Announcements
									<small>Recent Announcements</small>
								</h3>
							</div>
						</div>
						<div class="dash-body">
							<ul class="list-unstyled">
								<?php $announcement_obj->announcement_widget(); ?>
							</ul>
						</div>
						<div class="dash-footer">
							<a href="announcements.php">View All</a>
						</div>
					</div>
    </div>
<!--new HTML Ends HEre-->
    
<div class="clearfix">
<?php
	require_once("includes/footer.php");
?>