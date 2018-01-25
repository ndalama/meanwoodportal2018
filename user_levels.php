<?php
	include('system_load.php');
	//This loads system.
	
	//user Authentication.
	authenticate_user('admin');
	
	//Delete user level.
	if(isset($_POST['delete_level']) && $_POST['delete_level'] != '') { 
		$message = $new_level->delete_level($_SESSION['user_type'], $_POST['delete_level']);
	}//delete level ends here.
	
	$page_title = $label_obj->label("manage_user_levels"); //You can edit this to change your page title.
	require_once("includes/header.php"); //including header file.

?>
    <p><a href="manage_user_level.php" class="btn btn-primary btn-default"><?=$label_obj->label("add_new"); ?></a></p>
                    <table cellpadding="0" cellspacing="0" border="0" class="table-responsive table-hover table display table-bordered" id="wc_table" width="100%">
                        <thead>
                            <tr>
                                <th><?=$label_obj->label("id"); ?></th>
                                <th><?=$label_obj->label("level_name"); ?></th>
                                <th><?=$label_obj->label("level_description"); ?></th>
                                <th><?=$label_obj->label("level_page_name"); ?></th>
                                <th><?=$label_obj->label("message"); ?></th>
                                <th class="sorting_disabled"><?=$label_obj->label("edit"); ?></th>
                                <th><?=$label_obj->label("delete"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            	<td>0</td>
                                <td>admin</td>
                                <td><?=$label_obj->label("default_level_for_admins"); ?></td>
                                <td>dashboard.php</td>
                                <td><button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_admin">
  							<?=$label_obj->label("message"); ?>
							</button></td>
<script type="text/javascript">
$(function(){
$("#message_form_admin").on("submit", function(e){
  e.preventDefault();
  tinyMCE.triggerSave();
  $.post("includes/messageprocess.php", 
	 $("#message_form_admin").serialize(), 
	 function(data, status, xhr){
	   $("#success_message_admin").html("<div class='alert alert-success'>"+data+"</div>");
	 });
});
});
</script>				
<div class="modal fade" id="modal_admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="message_form_admin" method="post" name="send_message">
	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?=$label_obj->label("send_message"); ?></h4>
      </div>
	  
      <div class="modal-body">
      		<div id="success_message_admin"></div>
	   		<div class="form-group">
				<label class="control-label"><?=$label_obj->label("message_to"); ?></label>
				<input type="text" class="form-control" name="message_to" value="<?=$label_obj->label("all_admin_users"); ?>" readonly />
			</div>
			
			<div class="form-group">
				<label class="control-label"><?=$label_obj->label("subject"); ?></label>
				<input type="text" class="form-control" name="subject" value="" />
			</div>
			
			<div class="form-group">
				<label class="control-label"><?=$label_obj->label("message"); ?></label>
				<textarea class="form-control tinyst" name="message"></textarea>
			</div>
      </div>
      <input type="hidden" name="level_name" value="admin" />
	  <input type="hidden" name="level_form" value="1" />
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=$label_obj->label("close"); ?></button>
		<input type="submit" value="<?=$label_obj->label("send_message"); ?>" class="btn btn-primary" />
      </div>
    </div><!-- /.modal-content -->
   </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <?php $new_level->list_levels($_SESSION['user_type']); ?>
                        </tbody>
                    </table>
                     
<?php
	require_once("includes/footer.php");
?>