<?php
	include('system_load.php');
	//This loads system.
	
	if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') { 
		HEADER('LOCATION: dashboard.php');
	} //If user is loged in redirect to specific page.
	
	if(isset($_POST['add_user'])) {
		$add_user = $_POST['add_user'];
			if($add_user == 1){
			extract($_POST);
	 if(get_option('activate_captcha')) {	
		require_once('includes/recaptchalib.php');
	  	$privatekey = get_option('private_key');
  		$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
	  if (!$resp->is_valid) {
		// What happens when the CAPTCHA was entered incorrectly
	   $message = $label_obj->label('register_err_8');
	  	$captcha = '1';
	  }
  		}
			if(isset($captcha) && $captcha == '1') { 
				///captcha is not correct.
			} else if($first_name == '') { 
				$message = $label_obj->label('register_err_7');
			} else if($username == '') {
				$message = $label_obj->label('register_err_6');
			} else if($email == '') { 
				$message = $label_obj->label('register_err_5');
			} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    			$message = $label_obj->label('register_err_4');
			} else if($password == ''){ 
				$message = $label_obj->label('register_err_3');
			} else if($_POST['privacy_policy'] != '1') { 
				$message = $label_obj->label('register_err_2');
			} else if($user_type == '') { 
				$message = $label_obj->label('register_err_1');
			} else {
			if(get_option('disable_registration') == '1') { 
			$message = $label_obj->label('registeration_disabled_temporary');
			HEADER('LOCATION: register.php?message='.$message);
			exit();
			} else {
			$newObj=new Users;
			$message = $newObj->register_user($first_name, $last_name,$owner_type, $user_type, $username, $email, $password);
			HEADER('LOCATION: register.php?message='.$message);
			}
			}//validation ends here.
		}//form processing ends here.
	}//isset user register add user.
	
	$page_title = $label_obj->label('registration_page_title'); //You can edit this to change your page title.
	require_once('includes/header.php');
	
	if(get_option('facebook_login') == '1') { 
		include('includes/add_facebook.php');
		echo '<div id="fb_return_msg"></div>';
	}
	?>
<link rel="stylesheet" type="text/css" href="css/signin.css" media="all" />
    	<!-- you can copy following form in your registration page!-->
            <form action="<?php $_SERVER['PHP_SELF']?>" class="form-signin" id="register_form" name="register" method="post">
            	<input type="text" name="first_name" class="form-control" placeholder="<?php echo $label_obj->label('first_name'); ?>*"  />
                <input type="text" name="last_name" class="form-control" placeholder="<?php echo $label_obj->label('last_name'); ?>" />
                <input type="text" name="username" class="form-control" placeholder="Plot Number*" required="required"/>
                <select style="height: 45px;margin:0; color: #555;" name="owner_type" class="form-control" required="required">
				  <option value="Single owner">Single owner*</option>
				  <option value="Multiple owner">Multiple owner*</option>
				</select>
                <input type="text" name="email" class="form-control" placeholder="<?php echo $label_obj->label('email'); ?>*" required="required"/>
                <input type="password" name="password" class="form-control" placeholder="<?php echo $label_obj->label('password'); ?>*" required="required"/>
                
                 	<?php 
						//This is captcha code please do not remove it you can deactivate captcha by going admin section general settings. Else form will not work . on other page.
						if(get_option('activate_captcha') == '1') { 
						  require_once('includes/recaptchalib.php');
						  $publickey = get_option('public_key'); // you got this from the signup page
						  echo recaptcha_get_html($publickey);
						} ?>

             <input type="hidden" value="1" name="add_user" />
             <!--Default register user is subscriber, you can change it to any other level you have created-->
             <input type="hidden" name="user_type" value="<?php echo get_option('register_user_level'); ?>" />
             <!--user type registration ends here.-->
             <label>
             <input type="checkbox" name="privacy_policy" value="1" required="required" /> <?php echo $label_obj->label('policy_text'); ?>
             </label>
             
             <input type="submit" class="btn btn-lg btn-primary btn-block" value="<?php echo $label_obj->label('register_button'); ?>" />
            </form>
            <?php if(get_option('facebook_login') == '1') { ?>
            <center><fb:login-button scope="public_profile,email" size="xlarge" onlogin="checkLoginState();">
			<?php echo $label_obj->label("facebook_register_btn"); ?>
            </fb:login-button></center>
            <?php } ?>
            <script>
				$(document).ready(function() {
					// validate the register form
					$("#register_form").validate();
				});
            </script>

        <div class="text-center">
        	<?php echo $label_obj->label('already_account'); ?> <a href="login.php"><?php echo $label_obj->label('sign_in'); ?></a>
        </div>
<?php
	require_once("includes/footer.php");
?>