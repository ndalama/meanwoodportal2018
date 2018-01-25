<?php
	include('system_load.php');
	//This loads system.
	authenticate_user('subscriber');
	
	$page_title = 'Meanwood Portals | Plot Owner Portal';
	require_once('includes/header.php');	
?>
<div style="background: #fff; padding: 30px;">
<h5>Dear <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>,</h5>
<h2>PAYMENTS:</h2>
--------------------------
<h3>How to Pay</h3>
<p>The following are account details that can be used for all payments:  (To be added)<br /><br />

Please contact our Accounts Department for any payment related inquiries.</p>
</div>
<!--footer-->
<?php require_once('includes/footer.php'); ?>