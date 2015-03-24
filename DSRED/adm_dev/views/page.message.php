<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Message Page
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
?>	
	<div style="padding-top:150px;"></div>
	<div id="logo">
		<h1><span style="color:#ffffff;">Message</span></h1>
	</div>
	<div id="loginbox">            
			<div style="height:95px;padding:20px;">
				<b><?php echo $processMessage?></b>
			</div>
			
			<div class="form-actions" style="padding-top:3px;padding-right:10px;">
				<!--span class="pull-left"><a href="#" class="flip-link" id="to-recover">Lost password?</a></span -->
				<span class="pull-right"><input type="button" id="btn_goto" class="btn btn-inverse" value="Goto" /></span>					
			</div>
	</div>
	<div style="padding-top:100px;"></div>
	<script type="text/javascript">
	<!--
		var gotoUrl	= "<?php echo $processGotoUrl?>";
		var callBack= "<?php echo $processCallback?>";
		$(document).ready(function(){			
			window.setTimeout(function() {
				if (callBack != "") {
					eval(callBack);
				} 
				else {
					location.href = gotoUrl;
				}
			}, 3000);			

			$("#btn_goto").click(function() {
				if (callBack != "") {
					eval(callBack);
				} 
				else {
					location.href = gotoUrl;
				}
			});
		});
	//-->
	</script>
<form class="form-horizontal" name="mainForm" id="mainForm" method="post">
<input type="hidden" name="processApp" id="processApp" value="<?php echo $processApp?>" />
<input type="hidden" name="processCmd" id="processCmd" value="<?php echo $processCmd?>" />
<input type="hidden" name="processSeq" id="processSeq" value="<?php echo $processSeq?>" />
<input type="hidden" name="processCallback" id="processCallback" value="<?php echo $processCallback?>" />
</form>