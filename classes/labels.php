<?php
//user levels Class

class WebsiteLabels {
	public $category;
	public $field;
	public $result;
	
	function label($key) { 
		global $db;
		$query = "SELECT * from website_labels WHERE field='".$key."'";
		$result = $db->query($query) or die($db->error);
		$row = $result->fetch_array();
		$result = $row['result'];
		$result_return = stripslashes($result);
		return $result;
	}
	
	function list_labels() { 
		global $db;
		$query = "SELECT * from website_labels";
		$result = $db->query($query) or die($db->error);
		$content = '';
		
		while($row = $result->fetch_array()) { 
			$content .= '<tr>';
			$content .= '<td>'.$row['id'].'</td>';
			$content .= '<td>'.$row['field'].'</td>';
			$content .= '<td><input class="form-control" type="text" name="'.$row['id'].'" value="'.$row['result'].'" /></td>';
			$content .= '</tr>';
		}//End while here.
		return $content;
	}
	
	function update_label($field, $label) { 
		global $db;
		global $label_obj;
		
		$label = addslashes($label);
		$query = 'UPDATE website_labels SET
   	    			result = "'.$label.'"
			WHERE id="'.$field.'"';
		$result = $db->query($query) or die($db->error);
		return $label_obj->label("updated_label");
	}//add_user_level ends here.
	
	
	function add_label($category, $field, $label) { 
		global $db;
		global $label_obj;
		//checking if level already exist.
		$query = "SELECT * from website_labels WHERE field='".$field."'";
		$result = $db->query($query) or die($db->error);
		$num_rows = $result->num_rows;
		
		if($num_rows > 0) { 
			$message = $label_obj->label("label_cannot_add");
		} else { 
			$label = addslashes($label);
			$query = "INSERT into website_labels VALUES(NULL, '".$category."', '".$field."', '".$label."')";
			$result = $db->query($query) or die($db->error);
			$message = $label_obj->label("label_add_success");
		}
		return $message;
	}//add_user_level ends here.
	
}//class ends here.