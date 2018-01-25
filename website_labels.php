<?php
	include('system_load.php');
	//Including this file we load system.
	
	//user Authentication.
	authenticate_user('admin');
	
	define("FormProcessing", TRUE);
	include("includes/formprocessing.php");
	
	//Page display settings.
	$page_title = $label_obj->label('label_page_title'); //You can edit this to change your page title.
	require_once("includes/header.php"); //including header file.
?>
    <div class="col-sm-12">
    <p><a href="manage_labels.php" class="btn btn-primary btn-default"><?=$label_obj->label("add_new"); ?></a></p>
    	<form action="" method="post">
    	<table class="table-responsive table-hover table display table-bordered" id="wc_table" width="100%">
                        <thead>
                            <tr>
                                <th><?=$label_obj->label("id"); ?></th>
                                <th><?=$label_obj->label("label_field"); ?></th>
                                <th><?=$label_obj->label("label_result"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?=$label_obj->list_labels(); ?>
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
         	<input type="hidden" name="update_labels" value="1" />
            <input type="submit" class="btn btn-primary pull-right" value="<?=$label_obj->label('update_labels');?>" />
         </form>           
   </div><!--left-side-form ends here.-->                   
<?php
	require_once("includes/footer.php");
?>