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
    			<a class="navbar-brand" href="dashboard.php"><img src="http://www.meanwoodproperty.com/ownerportal/mlogo-small.jpg" alt="Meanwood Property Land Owner Portal" /><?php //echo get_option('site_name'); ?></a>
                        <!--collapse user info box opner-->
                        <div class="settings-icon">
						<a href="#collapseExample" data-toggle="collapse" title="View user detail" data-animate="true">
							<i class="glyphicon glyphicon-triangle-bottom"></i>
						</a>
						</div>
		
  	</div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
  <?php 
  	$level_page = $new_level->get_userlevel_info($_SESSION['user_type'], 'level_page');
  ?>
    <ul class="nav navbar-nav">
	    <li><a href="<?php echo $level_page; ?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
        	<ul>
                <li><a href="dashboard.php?logout=1">Logout</a></li>
    	    </ul>
        </li>
        <li><a href="edit_profile.php?user_id=<?php echo $_SESSION['user_id']; ?>"><span class="glyphicon glyphicon-user"></span> Edit Profile</a></li>
        <li><a href="subscriber.php"><span class="glyphicon glyphicon-link"></span>  Project Updates <?php // echo $label_obj->label('subscribers'); ?></a></li>

        <li><a href="messages.php"><span class="glyphicon glyphicon-envelope"></span> <?php echo $label_obj->label('messages'); ?> <span class="badge"><?php $message_obj->unread_count(); ?></span></a>
        	<ul>
                <li><a href="messages.php">Inbox</a></li>
                <li><a href="messages.php?type=sent">Sent Items</a></li>
    	    </ul>
        </li>
        <!--<li><a href="http://www.meanwoodproperty.com/plotowner/notes.php"><span class="glyphicon glyphicon-paperclip"></span> My Notes</a></li> -->
        <li><a href="security.php"><span class="glyphicon glyphicon-paperclip"></span> Security</a></li>
        <li><a href="roads.php"><span class="glyphicon glyphicon-paperclip"></span> Roads</a></li>
        <li><a href="garbage.php"><span class="glyphicon glyphicon-paperclip"></span> Garbage</a></li>
        <li><a href="water.php"><span class="glyphicon glyphicon-paperclip"></span> Water</a></li>
        <li><a href="zesco.php"><span class="glyphicon glyphicon-paperclip"></span> ZESCO</a></li>
        <li><a href="payments.php"><span class="glyphicon glyphicon-paperclip"></span> Payments</a></li>
        <li><a href="guidelines.php"><span class="glyphicon glyphicon-paperclip"></span> Guidelines</a></li>

    </ul>
    
  </div><!-- /.navbar-collapse -->
</nav>
</div>
<!--==================Sidebar Ends Here===========================-->