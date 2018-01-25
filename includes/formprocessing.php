<?php
if(!defined('FormProcessing')) {
   die('Direct access not permitted');
}

//Update Website Labels
if(isset($_POST['update_labels']) && $_POST['update_labels'] == '1') { 
	foreach($_POST as $key => $label) { 
		if($key != 'wc_table_length') {
			$message = $label_obj->update_label($key, $label);	
		}
	}
}

//Add label
if(isset($_POST['add_label']) && $_POST['add_label'] == '1') { 
	$message = $label_obj->add_label('', $_POST['field_name'], $_POST['field_result']);	
}