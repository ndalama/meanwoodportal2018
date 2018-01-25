<?php
	include('system_load.php');
	//This loads system.
	authenticate_user('subscriber');
	
	$page_title = 'Meanwood Portals | Plot Owner Portal';
	require_once('includes/header.php');	
?>
<div style="background: #fff; padding: 30px;">
<h5>Dear <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>,</h5>
<h2>GUIDELINES:</h2>
--------------------------
<h3>Building Regulation and Guidelines</h3>
<p>Coming soon...<br /><br />

Need Help? Drop us a message...</p>
</div>
<!--footer-->
<?php require_once('includes/footer.php'); ?>