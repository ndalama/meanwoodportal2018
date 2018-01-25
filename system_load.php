<?php
	session_start();
	/*This file loads system to do basic functions on the site, Please do not change anything here if you dont know what you are doing.*/
	include('includes/db_connect.php');
	include('includes/functions.php');
	//Redirecting to installation wizard if not installed already.
	global $db;
	//Checks if options exist and installation is complete.
	$val = $db->query('SELECT 1 from notes');
	if($val == FALSE) {
	  HEADER("LOCATION: install.php");
	}
	include('includes/update.php');
	//Session signout after session timeout.
	if(isset($_SESSION['timeout'])) {
		if ($_SESSION['timeout'] + get_option('session_timeout') * 60 < time()) {
		 	session_destroy();
			HEADER('LOCATION: '.get_option('redirect_on_logout'));
			exit();
		}
	}
	//Adding Language.
	include('classes/labels.php');
	include('classes/users.php');
	include('classes/userlevel.php');
	include('classes/notes.php');
	include('classes/messages.php');
	include('classes/announcements.php');

	$label_obj = new WebsiteLabels;
	$new_user = new Users;
	
	if(isset($_SESSION['user_id'])):
	$new_user = new Users;
	$user_status = $new_user->get_user_info($_SESSION['user_id'], 'status');
	
	if($user_status == 'ban' || $user_status == 'deactivate' || $user_status == 'suspend') { 
		session_destroy();
		HEADER('LOCATION: index.php');
	}
		$message_obj = new Messages;
		$new_level = new Userlevel;
		$notes_obj = new Notes;
		$announcement_obj = new Announcements;
	
		if($new_user->get_user_info($_SESSION['user_id'], 'profile_image') == '') { 
			$profile_img = 'images/thumb.png';
		} else { 
			$profile_img = $new_user->get_user_info($_SESSION['user_id'], 'profile_image');
		}
	endif;