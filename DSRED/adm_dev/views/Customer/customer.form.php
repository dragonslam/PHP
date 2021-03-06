
<div class="widget-box">
	<div class="widget-title">		
		<span class="icon"><i class="icon-file"></i></span><h5>Customer Form</h5>
		<div class="buttons">
			<a href="#" class="btn btn-mini" id="btn_ResetT"><i class="icon-repeat"></i> Reset</a>
		</div>
	</div>

	<div class="widget-content nopadding">
		<table id="dataTable_Manager" class="table table-bordered table-striped table-hover data-table">									
			<tr>
				<th>아이디</th>
				<td><input type="text" name="user_ID" id="cUser_ID" value="<?php echo $cUser_ID; ?>" placeholder="아이디" validation="userid" /></td>
			</tr>
			<tr>
				<th>이름</th>
				<td><input type="text" name="user_NM" id="cUser_NM" value="<?php echo $cUser_NM; ?>" placeholder="사용자 이름" validation="valid" /></td>
			</tr>			
			<tr>
				<th>전화</th>
				<td><input type="text" name="user_Phone" id="cUser_Phone" value="<?php echo $cUser_Phone; ?>" placeholder="전화번호" validation="phone" /></td>
			</tr>
			<tr>
				<th>모바일</th>
				<td><input type="text" name="user_Mobile" id="cUser_Mobile" value="<?php echo $cUser_Mobile; ?>" placeholder="핸드폰번호" validation="mobile" /></td>
			</tr>
			<tr>
				<th>이메일</th>
				<td><input type="text" name="user_EMail" id="cUser_Mail" value="<?php echo $cUser_Mail; ?>" placeholder="사용자 이메일" validation="email" /></td>
			</tr>			
		</table>  
	</div>
	<div class="buttons">										
		<button id="btn_Save" value="Save" class="btn btn-success"><i class="icon-check icon-white"></i> 저장</button>
		<button id="btn_Reset" value="Reset" class="btn btn-danger"><i class="icon-repeat icon-white"></i> 리셋</button>
		|
		<button id="btn_List" value="List" class="btn btn-primary"><i class="icon-share icon-white"></i> 목록</button>
	</div>
</div>
<script type="text/javascript">

	$(document).ready(function(){
		$("#btn_Save").click(function() { 
			
			var isValid		= true;
			var validMsg	= "";
			var placeholder, validation, value;
			$("input:text").each(function(o) {
				if (isValid)
				{				
					placeholder	= String($(this).attr("placeholder"));
					validation	= String($(this).attr("validation"));
					value			= String($(this).val());
					validMsg		= "";
					isValid		= true;
					
					switch (validation) {
						case "valid" : 
							isValid	= (value.isEmpty() == false && value != placeholder);
							validMsg	= placeholder + "를 등록해 주세요.";
							break;
						
						case "userid" : 
							isValid	= (value.isEmpty() == false && value != placeholder && value.isAlphaNum());
							validMsg	= "올바른 사용자 아이디를 등록해 주세요.<br/><br/>- 영문, 숫자";
							break;

						case "password" : 
							isValid	= (value.isEmpty() == false && value != placeholder && value.isAlphaNum());
							validMsg	= "올바른 비밀번호를 등록해 주세요.<br/><br/>- 영문, 숫자";
							break;

						case "email" : 
							if (!value.isEmpty() && value != placeholder) {
								isValid	= value.isEmail();
								validMsg	= "올바른 이메일 주소를 등록해 주세요.<br/><br/>- userid@domain.xx.xx";
							}						
							break;

						case "phone" : 
							if (!value.isEmpty() && value != placeholder) {
								isValid	= value.isPhone("-");
								validMsg	= "올바른 전화 번호를 등록해 주세요.<br/><br/>- 012-3456-7890";
							}						
							break;

						case "mobile" : 
							if (!value.isEmpty() && value != placeholder) {
								isValid	= value.isMobile("-");
								validMsg	= "올바른 핸드폰 번호를 등록해 주세요.<br/><br/>- 012-3456-7890";
							}						
							break;
					}
					
					if (!isValid) {					
						$(this).focus();
						fnModalOpen("Member Management", validMsg);	
					}
				}
			});

			//return;
			if (isValid) {
				fnCommander("member", "SaveProcess", processSeq, "", false, "");
			}
			return;
		});
		$("#btn_Reset").click(function() { 
			fnResetForm(); 
		});
		$("#btn_ResetT").click(function() { 
			fnResetForm(); 
		});
		$("#btn_List").click(function() { 
			fnCommander("admin-manager", "list");
		});
	});
</script>