<?php
	include('system_load.php');
	//This loads system.
	authenticate_user('subscriber');
	
	$page_title = 'Meanwood Portals | Plot Owner Portal';
	require_once('includes/header.php');	
?>
<div style="background: #fff; padding: 30px;">
<h5>Dear <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>,</h5>
<h2>GARBAGE UPDATES:</h2>
--------------------------
<h3>JUST IN:</h3>
<p>1.  MPDC and the Association are in the process of engaging a refuse collection company to service the Housing Development. Details will be provided in due course. Please note that you will be required to pay for this service.</p>
</div>
<!--footer-->
<?php require_once('includes/footer.php'); ?>