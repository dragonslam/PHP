<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Login Page
//
//	Edit history
// 
// ========================================================
//	Date     Editer     Description
// ------------------------------------------------------------------------
//'
?>
<?php
	PS_Style("/bootstrap/css/unicorn.login.css");
	PS_Script("/bootstrap/js/unicorn.login.ds.js", "login", true);
?>
<div style="padding-top:100px;padding-bottom:200px;">
	<div id="logo">
		<h1><span style="color:#ffffff;">DS Login</span></h1>
	</div>
	<div id="loginbox">            
		<form id="loginform" class="form-vertical">
			<input type="hidden" name="processApp" value="member" />
			<input type="hidden" name="processCmd" value="login" />
			<p>Enter username and password to continue.</p>
			<div class="control-group">
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-user"></i></span><input type="text" name="Login_User_ID" id="Login_User_ID" placeholder="UserID" />
					</div>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-lock"></i></span><input type="password" name="Login_User_PW" id="Login_User_PW" placeholder="Password" />
					</div>
				</div>
			</div>
			<div class="form-actions" style="padding-top:3px;padding-right:10px;">
				<!--span class="pull-left"><a href="#" class="flip-link" id="to-recover">Lost password?</a></span -->
				<span class="pull-right"><input type="submit" class="btn btn-inverse" value="Login" /></span>
			</div>
		</form>
	</div>
</div>