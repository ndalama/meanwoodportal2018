<?php
	include('system_load.php');
	//This loads system.
	authenticate_user('all');
	
	$page_title = $label_obj->label('all_page_title');
	$sub_title = "Page accessable for all loged in users of anytype.";
	require_once('includes/header.php');
?>

  <!--END OF MANAGE PROFILE LOGOUT-->     
<h3><?php echo $label_obj->label('all_page_title_2'); ?></h3>
<p><?php echo $label_obj->label('all_page_des_1'); ?></p>
<h3><?php echo $label_obj->label('all_page_title_3'); ?></h3>
<p><?php echo $label_obj->label('all_page_des_2'); ?></p>
<pre>
&lt;?php
	include('system_load.php');
	<?php echo $label_obj->label('home_comment_2'); ?>
	
	authenticate_user('all');
?&gt;		
</pre>

<h3><?php echo $label_obj->label('page_title_4'); ?></h3>
<p><?php echo $label_obj->label('all_page_des_3'); ?></p>
<pre>
&lt;?php
	include('system_load.php');
	<?php echo $label_obj->label('home_comment_2'); ?>
	
	authenticate_user('subscriber');
?&gt;		
</pre>

<h2><?php echo $label_obj->label('home_heading_4'); ?></h2>
<pre>
&lt;?php if(partial_access('admin')): ?&gt;	
	&lt;p&gt;<?php echo $label_obj->label('home_comment_3'); ?>&lt;/p&gt;
&lt;?php elseif(partial_access('subscriber')): ?&gt;
	&lt;p&gt;<?php echo $label_obj->label('home_comment_4'); ?>&lt;/p&gt;
&lt;?php elseif(partial_access('all')): ?&gt;
	&lt;p&gt;<?php echo $label_obj->label('home_comment_5'); ?>&lt;/p&gt;
&lt;?php else: ?&gt; 
	&lt;p&gt;<?php echo $label_obj->label('home_comment_6'); ?>&lt;/p&gt;
&lt;?php endif; ?&gt;
</pre>

<h2><?php echo $label_obj->label('home_heading_5'); ?></h2>
<?php if(partial_access('admin')): ?>	
	<h3><?php echo $label_obj->label('home_comment_3'); ?></h3>
<?php elseif(partial_access('subscriber')): ?>
	<h3><?php echo $label_obj->label('home_comment_4'); ?></h3>
<?php elseif(partial_access('all')): ?>
	<h3><?php echo $label_obj->label('home_comment_5'); ?></h3>
<?php else: ?> 
	<h3><?php echo $label_obj->label('home_comment_6'); ?></h3>
<?php endif; ?>

<!--footer -->
<?php
	require_once("includes/footer.php");
?>      