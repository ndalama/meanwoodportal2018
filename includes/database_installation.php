<?php
if(!defined('ACCESSDBINS')) {
   die('Direct access not permitted');
}

//Database Connection file. Update with your Database information once you create database from cpanel, or mysql.
if($db->query('SELECT 1 from user_meta') == FALSE) { 
		$query = 'CREATE TABLE user_meta (
			`user_meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`user_id` bigint(20) NOT NULL,
			`message_email` varchar(50) NOT NULL,
			`last_login_time` datetime NOT NULL,
			`last_login_ip` varchar(120) NOT NULL,
  			`login_attempt` bigint(20) NOT NULL,
			`login_lock` varchar(50) NOT NULL,
			PRIMARY KEY (`user_meta_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'User Meta Table created.<br>';
	}  //Creating user notes table ends here.
	
	if($db->query('SELECT 1 from message_meta') == FALSE) { 
		$query = 'CREATE TABLE message_meta (
			`msg_meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`message_id` bigint(20) NOT NULL,
			`status` varchar(100) NOT NULL,
			`from_id` bigint(20) NOT NULL,
			`to_id` bigint(20) NOT NULL,
  			`subject_id` bigint(20) NOT NULL,
			PRIMARY KEY (`msg_meta_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Message Meta Table created.<br>';
	}  //Creating user notes table ends here.
	
	if($db->query('SELECT 1 from messages') == FALSE) { 
		$query = 'CREATE TABLE messages (
			`message_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`message_datetime` datetime NOT NULL,
			`message_detail` varchar(1000) NOT NULL,
			PRIMARY KEY (`message_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Messages Table created.<br>';
	}  //Creating user notes table ends here.
	
	if($db->query('SELECT 1 from subjects') == FALSE) { 
		$query = 'CREATE TABLE subjects (
			`subject_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`subject_title` varchar(600) NOT NULL,
  			PRIMARY KEY (`subject_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Subjects Table created.<br>';
	}  //Creating user notes table ends here.
	
	if($db->query('SELECT 1 from notes') == FALSE) { 
		$query = 'CREATE TABLE notes (
			`note_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`note_date` date NOT NULL,
			`note_title` varchar(200) NOT NULL,
			`note_detail` varchar(600) NOT NULL,
			`user_id` bigint(20) NOT NULL,
  			PRIMARY KEY (`note_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Notes Table created.<br>';
	}  //Creating user notes table ends here.
	
	if($db->query('SELECT 1 from announcements') == FALSE) { 
		$query = 'CREATE TABLE announcements (
			`announcement_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`announcement_date` date NOT NULL,
			`announcement_title` varchar(200) NOT NULL,
			`announcement_detail` varchar(1000) NOT NULL,
			`user_type` varchar(100) NOT NULL,
			`announcement_status` varchar(50) NOT NULL,
  			PRIMARY KEY (`announcement_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Notes Table created.<br>';
	}  //Creating user notes table ends here.
	
	//if database tables does not exist already create them.
	if($db->query('SELECT 1 from options') == FALSE) {
		$query = 'CREATE TABLE options (
			`option_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`option_name` varchar(500) NOT NULL,
			`option_value` varchar(500) NOT NULL,
  			PRIMARY KEY (`option_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Options Table created.<br>';
	} //creating options table.
	
	if($db->query('SELECT 1 from users') == FALSE) { 
		$query = 'CREATE TABLE users (
			`user_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`first_name` varchar(100) NOT NULL,
			`last_name` varchar(100) NOT NULL,
			`gender` varchar(50) NOT NULL,
			`date_of_birth` date NOT NULL,
			`address1` varchar(200) NOT NULL,
			`address2` varchar(200) NOT NULL,
			`city` varchar(100) NOT NULL,
			`state` varchar(100) NOT NULL,
			`country` varchar(100) NOT NULL,
			`zip_code` varchar(100) NOT NULL,
			`mobile` varchar(200) NOT NULL,
			`phone` varchar(200) NOT NULL,
			`username` varchar(100) NOT NULL,
			`email` varchar(200) NOT NULL,
			`password` varchar(200) NOT NULL,
			`profile_image` varchar(500) NOT NULL,
			`description` varchar(600) NOT NULL,
			`status` varchar(100) NOT NULL,
			`activation_key` varchar(100) NOT NULL,
			`date_register` date NOT NULL,
			`user_type` varchar(100) NOT NULL,
  			PRIMARY KEY (`user_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Users Table created.<br>';
	}  //Creating users table ends here.
	
	//if database tables does not exist already create them.
	if($db->query('SELECT 1 from user_level') == FALSE) {
		$query = 'CREATE TABLE user_level (
			`level_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`level_name` varchar(200) NOT NULL,
			`level_description` varchar(600) NOT NULL,
			`level_page` varchar(100) NOT NULL,
  			PRIMARY KEY (`level_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Options Table created.<br>';
	} //creating user level table ends.
	
	//if database tables does not exist already create them.
	if($db->query('SELECT 1 from website_labels') == FALSE) {
		$query = 'CREATE TABLE website_labels (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`category` varchar(255) NOT NULL,
			`field` varchar(255) NOT NULL,
			`result` longtext NOT NULL,
  			PRIMARY KEY (`id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Website Labels Created.<br>';
	} //creating user level table ends.