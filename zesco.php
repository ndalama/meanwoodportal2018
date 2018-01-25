<?php
	include('system_load.php');
	//This loads system.
	authenticate_user('subscriber');
	
	$page_title = 'Meanwood Portals | Plot Owner Portal';
	require_once('includes/header.php');	
?>
<div style="background: #fff; padding: 30px;">
<h5>Dear <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>,</h5>
<h2>ZESCO UPDATES:</h2>
--------------------------
<h3>JUST IN:</h3>
<p>Currently no updates...</p>
</div>
<!--footer-->
<?php require_once('includes/footer.php'); ?>