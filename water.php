<?php
	include('system_load.php');
	//This loads system.
	authenticate_user('subscriber');
	
	$page_title = 'Meanwood Portals | Plot Owner Portal';
	require_once('includes/header.php');	
?>
<div style="background: #fff; padding: 30px;">
<h5>Dear <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>,</h5>
<h2>WATER UPDATES:</h2>
--------------------------
<h3>JUST IN:</h3>
<p>1.  MPDC are in the process of concluding talks with the relevant regulatory authorities on water supply within the projects. Details on connection and supply will be provided in due course.</p>
</div>
<!--footer-->
<?php require_once('includes/footer.php'); ?>