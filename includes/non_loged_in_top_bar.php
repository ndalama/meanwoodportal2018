	<div class="top_section">
    	<nav class="navbar user-info-navbar"  role="navigation"><!-- User Info, Notifications and Menu Bar -->
				<!-- Left links for user info navbar -->
				<ul class="user-info-menu left-links list-inline list-unstyled">
                	<li><a class="navbar-brand" href="<?php echo get_option('site_url'); ?>"><img style="border: 1px solid #030; margin: 0;" src="http://localhost:8888/meanwoodportal2018/logo.jpg" alt="Meanwood Property Land Owner Portal" /><?php // echo get_option('site_name'); ?></a></li>
				</ul>
			
			
				<!-- Right links for user info navbar -->
				<ul class="user-info-menu right-links list-inline list-unstyled">
					<li class="dropdown user-profile">
						<a style="background: #040;padding: 15px;color: #fff;" href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span>
								<?=$label_obj->label('join_now'); ?> <b class="caret"></b>
							</span>
						</a>
							<ul class="dropdown-menu">
                	<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> <?=$label_obj->label('sign_in'); ?></a></li>
			        <li><a href="register.php"><span class="glyphicon glyphicon-file"></span> <?=$label_obj->label('register'); ?></a></li>
                </ul> 
					</li>
				</ul>
			</nav>
    </div><!--topbar ends here-->

    <a class="navbar-brand" href="dashboard.php"><?php //echo get_option('site_name'); ?></a>