	<div class="top_section">
    	<nav class="navbar user-info-navbar"  role="navigation"><!-- User Info, Notifications and Menu Bar -->
				<!-- Left links for user info navbar -->
				<ul class="user-info-menu left-links list-inline list-unstyled">
					<li class="dropdown hover-line">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="glyphicon glyphicon-envelope"></i>
							<span class="badge badge-green"><?php $message_obj->unread_count(); ?></span>
						</a>
			
						<ul class="dropdown-menu messages">
							<li>
								<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
									<?php $message_obj->message_widget(); ?>
								</ul>
							</li>
							
							<li class="external">
								<a href="messages.php">
									<span>All Messages</span>
									<i class="glyphicon glyphicon-inbox"></i>
								</a>
							</li>
						</ul>
					</li>
			
					<li class="dropdown hover-line">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="glyphicon glyphicon-paperclip"></i>
							<span class="badge"><?php $notes_obj->notes_count(); ?></span>
						</a>
			
						<ul class="dropdown-menu notifications">
							<li>
								<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
									<?php $notes_obj->notes_widget(); ?>
								</ul>
							</li>
							
							<li class="external">
								<a href="notes.php">
									<span>View all notes</span>
									<i class="glyphicon glyphicon-calendar"></i>
								</a>
							</li>
						</ul>
					</li>
			</ul>
			
			
				<!-- Right links for user info navbar -->
				<ul class="user-info-menu right-links list-inline list-unstyled">
					<li class="dropdown user-profile">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo $profile_img; ?>" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
							<span>
								<?php echo $new_user->get_user_info($_SESSION['user_id'], 'first_name'); ?> <?php echo $new_user->get_user_info($_SESSION['user_id'], 'last_name'); ?>
								<b class="caret"></b>
							</span>
						</a>
			<?php if(partial_access('admin')): //following nav is for admin users only. ?>
				<ul class="dropdown-menu">
                	<li><a href="messages.php"><span class="glyphicon glyphicon-envelope"></span> <?=$label_obj->label('messages'); ?> <span class="badge"><?php $message_obj->unread_count(); ?></span></a></li>
                    <li><a href="notes.php"><span class="glyphicon glyphicon-pushpin"></span> <?=$label_obj->label('my_notes'); ?></a></li>
                	<li role="presentation" class="divider"></li>
                    <li><a href="general_settings.php"><span class="glyphicon glyphicon-wrench"></span> <?=$label_obj->label('general_settings'); ?></a></li>
                    <li><a href="announcements.php"><span class="glyphicon glyphicon-bullhorn"></span> <?=$label_obj->label('announcements'); ?></a></li>
			        <li><a href="edit_profile.php?user_id=<?php echo $_SESSION['user_id']; ?>"><span class="glyphicon glyphicon-user"></span> <?=$label_obj->label('edit_profile'); ?></a></li>
                    <li><a href="dashboard.php?logout=1"><span class="glyphicon glyphicon-log-out"></span> <?=$label_obj->label('logout');?></a></li>
                </ul>
              <?php elseif(partial_access('all')) : //following nav for all other loged in users. ?>
              	<ul class="dropdown-menu">
                	<li><a href="messages.php"><span class="glyphicon glyphicon-envelope"></span> <?=$label_obj->label('messages'); ?> <span class="badge"><?php $message_obj->unread_count(); ?></span></a></li>
                    <li><a href="notes.php"><span class="glyphicon glyphicon-pushpin"></span> <?=$label_obj->label('my_notes'); ?></a></li>
                    <li role="presentation" class="divider"></li>
                	<li><a href="edit_profile.php?user_id=<?php echo $_SESSION['user_id']; ?>"><span class="glyphicon glyphicon-user"></span> <?=$label_obj->label('edit_profile'); ?></a></li>
                    <li><a href="dashboard.php?logout=1"><span class="glyphicon glyphicon-log-out"></span> <?=$label_obj->label('logout'); ?></a></li>
                </ul>
               <?php endif; ?>   
					</li>
				</ul>
			</nav>
    </div><!--topbar ends here-->