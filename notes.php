<?php
	include('system_load.php');
	//This loads system.
	//user Authentication.
	authenticate_user('all');
	
	//Delete note.
	if(isset($_POST['delete_note']) && $_POST['delete_note'] != '') { 
		$message = $notes_obj->delete_note($_POST['delete_note']); 
	}//delete ends here.
		
	$page_title = $label_obj->label("my_notes"); //You can edit this to change your page title.
	require_once("includes/header.php"); //including header file.
?>
    <p>
    <a href="manage_notes.php" class="btn btn-primary btn-default"><?php echo $label_obj->label("add_new"); ?></a>
    </p>
   <?php $notes_obj->list_notes(); ?>

<?php
	require_once("includes/footer.php");
?>