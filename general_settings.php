<?php
	include('system_load.php');
	//Including this file we load system.
	
	//user Authentication.
	authenticate_user('admin');
	
	//user level object
	$new_userlevel = new Userlevel;
	
	//installation form processing when submits.
	if(isset($_POST['settings_submit']) && $_POST['settings_submit'] == 'Yes') {
	//validation to check if fields are empty!
	if($_POST['site_url'] == '') { 
		$message = $label_obj->label('site_url_empty');
	} else if($_POST['email_from'] == '') { 
		$message = $label_obj->label('email_from_required');
	} else if($_POST['email_to'] == '') { 
		$message = $label_obj->label('reply_cannot_empty');
	} else {
		//adding site url
		set_option('site_url', $_POST['site_url']);
		set_option('site_name', $_POST['site_name']);
		set_option('email_from', $_POST['email_from']);
		set_option('email_to', $_POST['email_to']);
		set_option('public_key', $_POST['public_key']);
		set_option('private_key', $_POST['private_key']);
		set_option('redirect_on_logout', $_POST['redirect_on_logout']);
		set_option('language', $_POST['language']);
		set_option('skin', $_POST['skin']);
		set_option('maximum_login_attempts', $_POST['maximum_login_attempts']);
		set_option('wrong_attempts_time', $_POST['wrong_attempts_time']);
		set_option('session_timeout', $_POST['session_timeout']);
		set_option('register_user_level', $_POST['register_user_level']);
		set_option('facebook_api_key', $_POST['facebook_api_key']);
		
		if(isset($_POST['activate_captcha'])) {
			set_option('activate_captcha', $_POST['activate_captcha']);
		} else { 
			set_option('activate_captcha', '0');
		}
		if(isset($_POST['notify_user_group'])) {
			set_option('notify_user_group', $_POST['notify_user_group']);
		} else { 
			set_option('notify_user_group', '0');
		}
		if(isset($_POST['register_verification'])) {
			set_option('register_verification', $_POST['register_verification']);
		} else { 
			set_option('register_verification', '0');
		}
		if(isset($_POST['facebook_login'])) {
			set_option('facebook_login', $_POST['facebook_login']);
		} else { 
			set_option('facebook_login', '0');
		}
		if(isset($_POST['disable_login'])) {
			set_option('disable_login', $_POST['disable_login']);
		} else { 
			set_option('disable_login', '0');
		}
		if(isset($_POST['disable_registration'])) {
			set_option('disable_registration', $_POST['disable_registration']);
		} else { 
			set_option('disable_registration', '0');
		}
		$message = $label_obj->label('settings_saved1');
		HEADER('LOCATION: general_settings.php?message='.$message); 
		}//form validations
	}//form processing.

	//Page display settings.
	$page_title = $label_obj->label('general_setting_page_title'); //You can edit this to change your page title.
	require_once("includes/header.php"); //including header file.
?>
                    <div class="col-sm-10">
                    <form name="set_install" id="set_install" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    	
                        <div class="form-group">
                        <label class="control-label"><?php echo $label_obj->label('site_url'); ?>*:</label>
                        <input type="text" name="site_url" class="form-control" value="<?php echo get_option('site_url'); ?>" required /><small><?php echo $label_obj->label('site_url_des'); ?></small>
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label"><?php echo $label_obj->label('site_name'); ?>:</label>
                        <input type="text" name="site_name" class="form-control" value="<?php echo get_option('site_name'); ?>" />
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label"><?php echo $label_obj->label('redirect_on_logout'); ?>:</label>
                        <input type="text" name="redirect_on_logout" class="form-control" value="<?php echo get_option('redirect_on_logout'); ?>" />
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label"><?php echo $label_obj->label('disable_registration'); ?>:</label>
                        <input type="checkbox" name="disable_registration" <?php if(get_option('disable_registration') == '1'){echo 'checked="checked"'; }?> value="1" title="<?php echo $label_obj->label('disable_registration_title'); ?>" />
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label"><?php echo $label_obj->label('disable_login'); ?>:</label>
                        <input type="checkbox" name="disable_login" <?php if(get_option('disable_login') == '1'){echo 'checked="checked"'; }?> value="1" title="<?php echo $label_obj->label('disable_login_check_title'); ?>" />
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label"><?php echo $label_obj->label('notify_user_group'); ?>:</label>
                        <input type="checkbox" name="notify_user_group" <?php if(get_option('notify_user_group') == '1'){echo 'checked="checked"'; }?> value="1" title="<?php echo $label_obj->label('notify_user_group_title'); ?>" />
                        </div>
                        
                        <div class="form-group">
                        	<label class="control-label"><?php echo $label_obj->label("default_system_user_type"); ?></label>
                            <select name="register_user_level" class="form-control">
									<option value=""><?php echo $label_obj->label("select_user_type"); ?></option>
                                    <?php $new_userlevel->userlevel_options(get_option('register_user_level')); ?>	                            </select>
                         </div>
                        
                        <div class="form-group">
                        <label class="control-label"><?php echo $label_obj->label('session_timeout'); ?>:</label>
                        <input type="text" name="session_timeout" class="form-control" value="<?php echo get_option('session_timeout'); ?>" />
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label"><?php echo $label_obj->label('maximum_login_attempts'); ?>:</label>
                        <input type="text" name="maximum_login_attempts" class="form-control" value="<?php echo get_option('maximum_login_attempts'); ?>" />
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label"><?php echo $label_obj->label('wrong_attempts_time'); ?>:</label>
                        <input type="text" name="wrong_attempts_time" class="form-control" value="<?php echo get_option('wrong_attempts_time'); ?>" />
                        </div>
                        
                    	<div class="panel-group" id="accordion">
                          <!--stars here.-->
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#facebook_setting">
                                  <?php echo $label_obj->label('facebook_login_setting'); ?>
                                </a>
                              </h4>
                            </div>
                            <div id="facebook_setting" class="panel-collapse collapse">
                              <div class="panel-body">
                                
                                <div class="form-group">
                                <label class="control-label"><?php echo $label_obj->label('activate_facebook_login'); ?>:</label>
                                <input type="checkbox" name="facebook_login" <?php if(get_option('facebook_login') == '1'){echo 'checked="checked"'; }?> value="1" title="<?php echo $label_obj->label('facebook_login_check_title'); ?>" />
                                </div>
                                <div class="form-group">
                                <label class="control-label"><?php echo $label_obj->label('facebook_api_key_label'); ?>:</label>
                                <input type="text" name="facebook_api_key" class="form-control" value="<?php echo get_option('facebook_api_key'); ?>" /><small><?php echo $label_obj->label('facebook_api_helper'); ?></small>
                                </div>
                              </div>
                            </div>
                          </div>
                            <!--end here.-->
                          
                          <!--stars here.-->
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#email_setting">
                                  <?php echo $label_obj->label('email_seeting'); ?>
                                </a>
                              </h4>
                            </div>
                            <div id="email_setting" class="panel-collapse collapse">
                              <div class="panel-body">
                                <p>
									<?php echo $label_obj->label('email_des_1'); ?>
                                </p>
                                
                                <div class="form-group">
                                <label class="control-label"><?php echo $label_obj->label('email_from'); ?>*:</label>
                                <input type="text" name="email_from" class="form-control" value="<?php echo get_option('email_from'); ?>"  />
                                </div>
                                
                                <div class="form-group">
                                <label class="control-label"><?php echo $label_obj->label('reply_to'); ?>*:</label>
                                <input type="text" name="email_to" class="form-control" value="<?php echo get_option('email_to'); ?>" required />
                                </div>
                                <div class="form-group">
                                <label class="control-label"><?php echo $label_obj->label('activate_without_verification'); ?>:</label>
                                <input type="checkbox" name="register_verification" <?php if(get_option('register_verification') == '1'){echo 'checked="checked"'; }?> value="1" title="<?php echo $label_obj->label('activate_without_2'); ?>" />
                                </div>
                              </div>
                            </div>
                          </div>
                            <!--end here.-->
                          
                          <!--stars here.-->
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                  <?php echo $label_obj->label('captcha_settings'); ?>
                                </a>
                              </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                              <div class="panel-body">
                                <p><?php echo $label_obj->label('captcha_des_1'); ?> <a href="http://www.google.com/recaptcha/whyrecaptcha" target="_blank"><?php echo $label_obj->label('captcha_des_2'); ?></a> <?php echo $label_obj->label('captcha_des_3'); ?></p>
                                <div class="form-group">
                                <label class="control-label"><?php echo $label_obj->label('activate_captcha'); ?>:</label>
                                <input type="checkbox" name="activate_captcha" <?php if(get_option('activate_captcha') == '1'){echo 'checked="checked"'; }?> value="1" />
                                </div>
                                
                                <div class="form-group">
                                <label class="control-label"><?php echo $label_obj->label('private_key'); ?>:</label>
                                <input type="text" class="form-control" name="private_key" value="<?php echo get_option('private_key'); ?>" />
                                </div>
                                
                                <div class="form-group">
                                <label class="control-label"><?php echo $label_obj->label('public_key'); ?>:</label>
                                <input type="text" class="form-control" name="public_key" value="<?php echo get_option('public_key'); ?>" />
                                </div>
                              </div>
                            </div>
                          </div>
                            <!--end here.-->
                        </div>
						<hr />

                    <input type="hidden" name="settings_submit" value="Yes" />
                    <input type="submit" value="<?php echo $label_obj->label('submit_button'); ?>" class="btn btn-primary" />
            </form>
            <script>
				$(document).ready(function() {
					// validate the Installation form
					$("#set_install").validate();
				});
            </script>
           </div><!--left-side-form ends here.-->                   
<?php
	require_once("includes/footer.php");
?>