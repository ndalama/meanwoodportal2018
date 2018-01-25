<?php
	include('system_load.php');
	//This loads system.
	//user Authentication.
	authenticate_user('admin');
	
	define("FormProcessing", TRUE);
	include("includes/formprocessing.php");
	
	$page_title = $label_obj->label("add_label");
	require_once("includes/header.php"); //including header file.
?>
                    <div class="col-sm-8">
                    <form action="<?php $_SERVER['PHP_SELF']?>" id="add_level" name="level" method="post">
                    <div class="form-group">
                        	<label class="control-label"><?php echo $label_obj->label("label_field"); ?>*<small>Avoid Space or special Characters</small></label>
                            <input type="text" class="form-control" name="field_name" placeholder="<?php echo $label_obj->label("field_name"); ?>" value="" required="required" />
                      </div>
                      
                      <div class="form-group">
                        	<label class="control-label"><?php echo $label_obj->label("label_result"); ?>*</label>
                            <input type="text" name="field_result" class="form-control" value="" placeholder="<?php echo $label_obj->label("field_result"); ?>" required="required" />
                       </div>
                        <div class="form-group">
 <small>See the code below how to add these Fields in system files.  
<pre>
&lt;?=$label_obj->label('field_name');?&gt; 

//This will Print the Value of Label in PHP files.		
</pre>
</small>
                        </div>
						<input type="hidden" name="add_label" value="1" />
                        <input type="submit" class="btn btn-primary" value="<?=$label_obj->label('add_label');?>" />
                    </form>
                    <script>
						$(document).ready(function() {
							// validate the register form
							$("#add_level").validate();
						});
                    </script>
                   </div><!--left-side-form ends here.-->
                   
<?php
	require_once('includes/sidebar.php');
?>                        
<?php
	require_once("includes/footer.php");
?>