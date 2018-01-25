<?php
	include('system_load.php');
	//This loads system.
	authenticate_user('subscriber');
	
	$page_title = 'Meanwood Portals | Plot Owner Portal';
	require_once('includes/header.php');	
?>
<div style="background: #fff; padding: 30px;">
<h3><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?> Meanwood Ibex Hill Account</h3>
<p>As Meanwood we are proud to have you as a member of our community and this platform is there for us to connect and serve you.</p><p>Use your account to get the latest updates, news, announcements from Meanwood Property.  You may also use our messaging system to stay in touch with us.</p>

<h3>LATEST PROJECT UPDATES:</h3>
<ul>
	 <li><a href="security.php"><span class="glyphicon glyphicon-paperclip"></span> Security</a></li>
        <li><a href="roads.php"><span class="glyphicon glyphicon-paperclip"></span> Roads</a></li>
        <li><a href="garbage.php"><span class="glyphicon glyphicon-paperclip"></span> Garbage</a></li>
        <li><a href="water.php"><span class="glyphicon glyphicon-paperclip"></span> Water</a></li>
        <li><a href="zesco.php"><span class="glyphicon glyphicon-paperclip"></span> ZESCO</a></li>
        <li><a href="payments.php"><span class="glyphicon glyphicon-paperclip"></span> Payments</a></li>
        <li><a href="guidelines.php"><span class="glyphicon glyphicon-paperclip"></span> Guidelines</a></li>
</ul>
</div>
<!--footer-->
<?php require_once('includes/footer.php'); ?>