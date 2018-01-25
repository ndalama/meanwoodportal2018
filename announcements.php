<?php
	include('system_load.php');
	//This loads system.
	
	//user Authentication.
	authenticate_user('admin');
	
	//Delete note.
	if(isset($_POST['delete_announcement']) && $_POST['delete_announcement'] != '') { 
		$message = $announcement_obj->delete_announcement($_POST['delete_announcement']); 
	}//delete ends here.
		
	$page_title = $label_obj->label("announcements"); //You can edit this to change your page title.
	require_once("includes/header.php"); //including header file.
?>
    <p>
    <a href="manage_announcement.php" class="btn btn-primary btn-default"><?php echo $label_obj->label("add_new"); ?></a>
    </p>
   <?php $announcement_obj->list_announcements(); ?>

<?php
	require_once("includes/footer.php");
?>