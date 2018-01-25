    <div class="sidebar-menu">
    	<nav class="navbar navbar-default" role="navigation">
  		<!-- Brand and toggle get grouped for better mobile display -->
  		<div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
    			<a class="navbar-brand" href="dashboard.php"><img src="http://localhost:8888/mportal/mlogo-small.jpg" alt="Meanwood Proeprty Land Owner Portal" /><?php //echo get_option('site_name'); ?></a>
               <!--collapse user info box opner-->
                        <div class="settings-icon">
						<a href="#collapseExample" data-toggle="collapse" title="View user detail" data-animate="true">
							<i class="glyphicon glyphicon-triangle-bottom"></i>
						</a>
						</div> 
  	</div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
	    <li><a href="dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> <?=$label_obj->label('dashboard');?></a></li>
        <li><a href="users.php"><span class="glyphicon glyphicon-user"></span> <?=$label_obj->label('users'); ?></a></li>
        <li><a href="user_levels.php"><span class="glyphicon glyphicon-tag"></span> <?=$label_obj->label('user_levels'); ?></a></li>
        <li><a href="messages.php"><span class="glyphicon glyphicon-envelope"></span> <?=$label_obj->label('messages'); ?> <span class="badge"><?php $message_obj->unread_count(); ?></span></a></li>
                    <li><a href="notes.php"><span class="glyphicon glyphicon-pushpin"></span> <?=$label_obj->label('my_notes'); ?></a></li>
                    <li><a href="announcements.php"><span class="glyphicon glyphicon-bullhorn"></span> <?=$label_obj->label('announcements'); ?></a></li>
        <li><a href="website_labels.php"><span class="glyphicon glyphicon-globe"></span> <?=$label_obj->label('update_language'); ?></a></li>
        <li><a href="all.php">Page For Loged in Users</a></li>
        <li><a href="subscriber.php">Page For Subscriber Level Users</a></li>
    </ul>
    
  </div><!-- /.navbar-collapse -->
</nav>
</div>
<!--==================Sidebar Ends Here===========================-->

