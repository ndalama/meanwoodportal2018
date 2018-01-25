<?php
	include('system_load.php');
	//This loads system.
	authenticate_user('subscriber');
	
	$page_title = 'Meanwood Portals | Plot Owner Portal';
	require_once('includes/header.php');	
?>
<div style="background: #fff; padding: 30px;">
<h5>Dear <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>,</h5>
<h2>SECURITY UPDATES:</h2>
--------------------------
<h3>JUST IN:</h3>
<p>1.       Police post-In September 2017, MPDC handed over a half acre plot valued at Three Hundred and Fifty Thousand Kwacha (K350,000) to the Meanwood Residents and a Property Owners Association which has been allocated for a Police Post. This was done in effort to ensure improved security, safety and general law enforcement within the Housing Development. MPDC, the Association and Zambia Police are working to ensure speedy implementation of the project.</p>

<p>2.       MPDC has been meeting all the costs for security personnel at Gates A(Great East Road) and B (Chainda). Gate B was not part of the initial Housing Development design as approved by the Lusaka Provincial Planning Authority (LPPA) but was built by MPDC at the request of Residents.  We would like to advise that we will be withdrawing this service by March 2018 and starting 1st April, Plot Owners will take up the cost of security through the Association. More information on the security service, the cost and payment methods will be communicated. </p>

<p>3.       Entrance/Exit Management-MPDC has requested that the Association submit a detailed proposal for traffic management relating to the entry and exit of residents and guests to the Housing Development. The thrust of this proposal will be to prevent unnecessary traffic in and out of the Housing Development as it has a bearing on security and road infrastructure. Please contact the Association should you wish to contribute to the proposal.</p>
</div>
<!--footer-->
<?php require_once('includes/footer.php'); ?>