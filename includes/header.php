<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="HandheldFriendly" content="true" />
<meta name="MobileOptimized" content="width" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=2.0, user-scalable=no" />

<title><?php echo $page_title; ?></title>
<!--add_bootstrap start here.-->
<?php 
	$skin = get_option('skin');
	if(isset($skin) && $skin == 'default') {
} ?>
<!--addd bootstap ends here.-->

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="style.css" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<script src="js/jquery-1.11.2.min.js"></script>
	<style type="text/css" title="currentStyle">
        @import "css/demo_table.css";
    </style>
    <link href="css/croppic.css" rel="stylesheet">
</head>
<body>
<?php
	//add User info box if user is signed in.
	if(partial_access('all')): 
		require_once('collapseuserinfo.php');
	endif;	
?>

<!--********** Main Container Start ***********-->
<div class="page-container">
	<!--sidebar Nav ere-->
	<?php if(partial_access('admin')): 
		//nav when user is loged in as admin.
		require_once('admin_nav.php');
	elseif(partial_access('all')):
		//nav when user is not admin but loged in.
		require_once('non_admin_nav.php');
	else:
		//nav when user is not loged in.
		//require_once('non_logedin_user_nav.php');
	endif; ?>
<div class="main-content" <?php if(!isset($_SESSION['user_id'])): echo 'style="width:100%;"'; endif; ?>>
	<?php
		//This file includes top bar navigation things.
		if(partial_access('all')): //If user is loged in this bar would show up.
			require_once('top_bar.php');
		else:
			require_once('non_loged_in_top_bar.php');
		endif;
	?>

   
   <div class="page-title">
        <h1 class="title"><?php echo $page_title; ?></h1>
    </div><!--page title ends here.-->
   
<div class="row mywidget" style="background: url(http://www.meanwoodproperty.com/wp-content/uploads/2016/08/header-ibex-hill.jpg) center fixed;padding:20px;" >
    <?php
		//announcement box starts here.
		if(isset($_POST['active_notification'])) { 
			$_SESSION['active_notification'] = $_POST['active_notification'];
		}
		if(isset($_SESSION['active_notification']) && $_SESSION['active_notification'] == 'No'):
		//when notification is not active.
		else:
	 	if(isset($_SESSION['user_type'])){
		$ann_obj = new Announcements;
		$ann_obj->get_latest_announcement();
		}
		endif;//announcement box ends here. 
		
  //display message if exist.
	if(isset($_GET['message']) && $_GET['message'] != '') { 
		echo '<div class="alert alert-success">';
		echo $_GET['message'];
		echo '</div>';
	}
	if(isset($message) && $message != '') { 
		echo '<div class="alert alert-success">';
		echo $message;
		echo '</div>';
	}