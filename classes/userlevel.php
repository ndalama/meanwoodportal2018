<?php
//user levels Class

class Userlevel {
	public $level_name;
	public $level_description;
	public $level_page;
	
	function get_userlevel_info($levelname, $term) { 
		global $db;
		$query = "SELECT * from user_level WHERE level_name='".$levelname."'";
		$result = $db->query($query) or die($db->error);
		$row = $result->fetch_array();
		return $row[$term];
	}//get user email ends here.
	
	function set_level($level_id) { 
		global $db;
		$query = 'SELECT * from user_level WHERE level_id="'.$level_id.'"';
		$result = $db->query($query) or die($db->error);
		$row = $result->fetch_array();
		$this->level_name = $row['level_name'];
		$this->level_description = $row['level_description'];
		$this->level_page = $row['level_page'];
	}//level set ends here.
	
	function update_user_level($level_id, $level_name, $level_description, $level_page) { 
		global $db;
		global $label_obj;
		$query = 'UPDATE user_level SET
				  level_name = "'.$level_name.'",
				  level_description = "'.$level_description.'",
				  level_page = "'.$level_page.'"
				   WHERE level_id="'.$level_id.'"';
		$result = $db->query($query) or die($db->error);
		return $label_obj->label("userlevel_update_success");
	}//update user level ends here.
	
	function add_user_level($level_name, $level_description, $level_page) { 
		global $db;
		global $label_obj;
		//checking if level already exist.
		$query = "SELECT * from user_level WHERE level_name='".$level_name."'";
		$result = $db->query($query) or die($db->error);
		$num_rows = $result->num_rows;
		
		if($num_rows > 0) { 
			$message = $label_obj->label("userlevel_cannot_add");
		} else { 
			$level_page = stripslashes($level_page);
			$query = "INSERT into user_level VALUES(NULL, '".$level_name."', '".$level_description."', '".$level_page."')";
			$result = $db->query($query) or die($db->error);
			$message = $label_obj->label("userlevel_add_success");
		}
		return $message;
	}//add_user_level ends here.
	
	function list_levels($user_type) {
		global $db;
		global $label_obj;
		if($user_type == 'admin') { 
			$query = 'SELECT * from user_level ORDER by level_name ASC';
			$result = $db->query($query) or die($db->error);
			$content = '';
			$count = 0;
			while($row = $result->fetch_array()) { 
				extract($row);
				$count++;
				if($count % 2 == 0) { 
					$class = 'even';
				} else { 
					$class = 'odd';
				}
				$content .= '<tr class="'.$class.'">';
				$content .= '<td>';
				$content .= $level_id;
				$content .= '</td><td>';
				$content .= $level_name;
				$content .= '</td><td>';
				$content .= $level_description;
				$content .= '</td><td>';
				$content .= $level_page;
				$content .= '</td><td>';
				$content .= '<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_'.$level_id.'">
  							'.$label_obj->label("message").'
							</button>';
				$content .= '<!-- Modal -->
<script type="text/javascript">
$(function(){
$("#message_form_'.$level_id.'").on("submit", function(e){
  e.preventDefault();
  tinyMCE.triggerSave();
  $.post("includes/messageprocess.php", 
	 $("#message_form_'.$level_id.'").serialize(), 
	 function(data, status, xhr){
	   $("#success_message_'.$level_id.'").html("<div class=\'alert alert-success\'>"+data+"</div>");
	 });
});
});
</script>				
<div class="modal fade" id="modal_'.$level_id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="message_form_'.$level_id.'" method="post" name="send_message">
	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">'.$label_obj->label("send_message").'</h4>
      </div>
	  
      <div class="modal-body">
      		<div id="success_message_'.$level_id.'"></div>
	   		<div class="form-group">
				<label class="control-label">'.$label_obj->label("message_to").'</label>
				<input type="text" class="form-control" name="message_to" value="All '.$level_name.'" readonly="readonly" />
			</div>
			
			<div class="form-group">
				<label class="control-label">'.$label_obj->label("subject").'</label>
				<input type="text" class="form-control" name="subject" value="" />
			</div>
			
			<div class="form-group">
				<label class="control-label">'.$label_obj->label("message").'</label>
				<textarea class="tinyst form-control" name="message"></textarea>
			</div>
      </div>
	  <input type="hidden" name="level_name" value="'.$level_name.'" />
	  <input type="hidden" name="level_form" value="1" />
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">'.$label_obj->label("close").'</button>
		<input type="submit" value="'.$label_obj->label("send_message").'" class="btn btn-primary" />
      </div>
    </div><!-- /.modal-content -->
   </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->';			
				$content .= '</td><td>';
				$content .= '<form method="post" name="edit" action="manage_user_level.php">';
				$content .= '<input type="hidden" name="edit_level" value="'.$level_id.'">';
				$content .= '<input type="submit" class="btn btn-default btn-sm" value="'.$label_obj->label("edit").'">';
				$content .= '</form>';
				$content .= '</td><td>';
				$content .= '<form method="post" name="delete" onsubmit="return confirm_delete();" action="">';
				$content .= '<input type="hidden" name="delete_level" value="'.$level_id.'">';
				$content .= '<input type="submit" class="btn btn-default btn-sm" value="'.$label_obj->label("delete").'">';
				$content .= '</form>';
				$content .= '</td>';
				$content .= '</tr>';
				unset($class);
			}//loop ends here.
			
		} else { 
			$content = $label_obj->label("level_err_1");
		}	
		echo $content;
	}//list_levels ends here.
	
	function delete_level($user_type, $level_id) {
		global $db;
		global $label_obj;
		if($user_type == 'admin') {
			$query = 'DELETE from user_level WHERE level_id="'.$level_id.'"';
			$result = $db->query($query) or die($db->error);
			$message = $label_obj->label("user_level_delete_succ");	
		} else { 
			$message = $label_obj->label("user_level_cannot_del");
		}	
		return $message;
	}//delete level ends here.
	
	function userlevel_options($user_type) {
		global $db;
		$query = 'SELECT * from user_level ORDER by level_name ASC';
		$result = $db->query($query) or die($db->error);
		$options = '';
		if($user_type != '') { 
			while($row = $result->fetch_array()) { 
				if($user_type == $row['level_name']) {
				$options .= '<option selected="selected" value="'.$row['level_name'].'">'.ucfirst($row['level_name']).'</option>';
				} else { 
				$options .= '<option value="'.$row['level_name'].'">'.ucfirst($row['level_name']).'</option>';
				}
			}
		} else { 
			while($row = $result->fetch_array()) { 
				$options .= '<option value="'.$row['level_name'].'">'.ucfirst($row['level_name']).'</option>';
			}
		}
		echo $options;	
	}//return user level options for select
	
	function get_level_info() { 
		global $db;
		global $label_obj;
		if($_SESSION['user_type'] == 'admin') { 
				$query = "SELECT * from users WHERE user_type='admin'";
				$result = $db->query($query) or die($db->error);
				$num_rows = $result->num_rows;
				
				$table = '<div class="col-sm-3">
            <div class="dash-widget dash-counter-block">
                <div class="dash-upper">
                    <div class="dash-icon">
                        <i class="glyphicon glyphicon-tag"></i>
                    </div>
                    <div class="dash-label">
                        <strong class="num">'.$num_rows.'</strong>
                        <span>'.$label_obj->label("admin").'</span>
                    </div>
                </div>
                <div class="dash-lower">
                    <div class="border"></div>
                    <span>Redirects to</span>
                    <strong>dashboard.php</strong>
                </div>
            </div>
    		</div>';
				
			$query = "SELECT * from user_level ORDER by level_name ASC";
			$result = $db->query($query) or die($db->error);
			
			while($row = $result->fetch_array()) { 
				$query_users = "SELECT * from users WHERE user_type='".$row['level_name']."'";
				$result_users = $db->query($query_users) or die($db->error);
				$num_rows = $result_users->num_rows;
				
				$table .= '<div class="col-sm-3">
            <div class="dash-widget dash-counter-block">
                <div class="dash-upper">
                    <div class="dash-icon">
                        <i class="glyphicon glyphicon-tag"></i>
                    </div>
                    <div class="dash-label">
                        <strong class="num">'.$num_rows.'</strong>
                        <span>'.ucfirst($row['level_name']).'</span>
                    </div>
                </div>
                <div class="dash-lower">
                    <div class="border"></div>
                    <span>Redirects to</span>
                    <strong>'.$row['level_page'].'</strong>
                </div>
            </div>
    		</div>';
			}
			echo $table;
		} else { 
			echo $label_obj->label("cannot_view_this_list");
		}
	}//get user level info ends here.
}//class ends here.