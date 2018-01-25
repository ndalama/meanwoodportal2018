<?php
	include('system_load.php');
	//This loads system.
	authenticate_user('subscriber');
	
	$page_title = 'Meanwood Portals | Plot Owner Portal';
	require_once('includes/header.php');	
?>
<div style="background: #fff; padding: 30px;">
<h5>Dear <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>,</h5>
<h2>ROADS UPDATES:</h2>
--------------------------
<h3>JUST IN:</h3>
<p>1.       <b>Road naming</b> - The policy relating to road naming had been going under review 2017 and as a result, there were delays to the road naming process. The new policy Local Government Policy has since been implemented and MPDC submitted a request for road naming rights. We apologise for the inconvenience the delay has caused and thank you for your patience.</p>

<p>2.       <b>Road Works</b> - Repair to the main roads into and out of the Housing Development is underway as well as grading of the roads in Phase 5.  MPDC have and are doing a lot of work on road infrastructure. The project has been ongoing for over 10 years and some of the roads we have worked on have deteriorated over time due to wear and tear. This has been exacerbated by high traffic and construction trucks.<br /><br />

We are not in the position to continuously shoulder road maintenance costs and as such.  MPDC is pleased with the initiative by Plot Owners to mobilize funding for rehabilitate roads in the projects and are willing to make some capital contribution towards this. A fund has been set up and through the Association, Plot Owners will be able to make contributions to this fund.<br /><br />

Our Project Engineer has submitted bills of quantities (BOQ) for road rehabilitation which will be shared. We encourage all Property Owners to make their contributions in a timely manner to ensure timely execution of the rehabilitation works..</p>
</div>
<!--footer-->
<?php require_once('includes/footer.php'); ?>