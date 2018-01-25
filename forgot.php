<?php
	include('system_load.php');
	//This loads system.
	
	if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') { 
		HEADER('LOCATION: dashboard.php');
	} //If user is loged in redirect to specific page.
	
	$new_user = new Users; //creating user object.
	
	if(isset($_POST['forgot_pass'])) {
		$forgot_pass = $_POST['forgot_pass'];
		if($forgot_pass == 1){
			extract($_POST);
			$message = $new_user->forgot_user($email);
		}//processing forgot password Email sending.
	}//if isset forgot pass
	
	if(isset($_POST['reset_form'])) {
		$reset_form = $_POST['reset_form'];
		if($reset_form == 1){
			extract($_POST);
			if($password!=$match_password){
				$message = $label_obj->label('password_no_match');	
			} else {
			   $confirmation_code = $_GET['confirmation_code'];
			   $message = $new_user->reset_pass_user($_GET['user_id'],$confirmation_code,$password);
			}
		}//reset Form reset password processing.
	}//isset reset_ form
	
	$page_title = $label_obj->label('forgot_pass_title'); //You can edit this to change your page title.
	require_once('includes/header.php');
?>
<link rel="stylesheet" type="text/css" href="css/signin.css" media="all" />
         <?php if(!isset($_GET['confirmation_code']) || $_GET['confirmation_code'] == '') : ?>   
        <form action="<?php $_SERVER['PHP_SELF']?>" class="form-signin" id="forgot_form" name="forgot" method="post">
            <label><?php echo $label_obj->label('form_label'); ?></label>
                <input type="text" class="form-control" placeholder="<?php echo $label_obj->label('login_form_label_1'); ?>" name="email" required="required" />
                <input type="submit" class="btn btn-lg btn-primary btn-block" value="<?php echo $label_obj->label('submit_button'); ?>" />
 	            <input type="hidden" name="forgot_pass" value="1" />
            </form>
            <script>
				$(document).ready(function() {
					// validate the register form
					$("#forgot_form").validate();
				});
            </script>
			<?php else: ?>
            <form action="<?php $_SERVER['PHP_SELF']?>" class="form-signin" id="reset_form" name="reset_form" method="post">
                <input type="password" name="password" class="form-control" placeholder="<?php echo $label_obj->label('new_password'); ?>" required="required" />
                <input type="password" name="match_password" class="form-control" placeholder="<?php echo $label_obj->label('confirm_password'); ?>" required="required"/>
                <input type="hidden" value="1" name="reset_form" />
                <input type="submit" class="btn btn-lg btn-primary btn-block" value="<?php echo $label_obj->label('submit_button'); ?>" />
            </form>
            <script>
				$(document).ready(function() {
					// validate the register form
					$("#reset_form").validate();
				});
            </script>
            <?php endif; ?>
        <div class="text-center">
        	<?php echo $label_obj->label('already_account'); ?> <a href="login.php"><?php echo $label_obj->label('sign_in'); ?></a><br />
            <?php echo $label_obj->label('not_member_yet'); ?> <a href="register.php"><?php echo $label_obj->label('sign_up'); ?></a>
        </div>
<?php
	require_once("includes/footer.php");
?>