<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>CV. Karya Indah 8 Express</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href='<?php echo base_url().'assets/image/logo.png';?>'/>
		<link rel="stylesheet" href='<?php echo base_url().'assets/css/login_style.css';?>'/>
    </head>
    <body>
		<div class="wrapper">
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
					<?php echo form_open('login/user_login',array('class'=>'login active'));?>
		
						<h3>Login Administrator</h3>
						<div>
							<label>Username:</label>
							<input type="text" name="username"/>
							<div style="padding-left:30px; color:red;"><?php echo form_error('username')?></div>
						</div>
						<div>
							<label>Password: </label>
							<input type="password" name="password"/>
							<div style="padding-left:30px; color:red;"><?php echo form_error('password')?></div>
						</div>
						<div class="bottom">
							<input type="submit" value="Login"></input>
							<div class="clear"></div>
						</div>
					<?php echo form_close()?>
				</div>
				<div class="clear"></div>
			</div>
		</div>	
		<div id='footer'>
			<small>Copyright © 2015 CV. Karya Indah 8 Express</small>
		</div>
    </body>
</html>