
						<div class="widget-box">
							<div class="widget-title">		
								<span class="icon"><i class="icon-file"></i></span><h5>Manager Group Form</h5>
								<div class="buttons">
									<a href="#" class="btn btn-mini" id="btn_ResetT"><i class="icon-repeat"></i> Reset</a>
								</div>
							</div>
							
							<input type="hidden" name="code_Group" id="cCode_Group" value="" />
							<div class="widget-content nopadding">
								<table id="dataTable_Manager" class="table table-bordered table-striped table-hover data-table">									
									<tr>
										<th>그룹 ID</th>
										<td><input type="text" name="code_ID" id="cCode_ID" value="<?php echo $cCODE_ID; ?>" placeholder="그룹 ID" validation="userid" /></td>										
									</tr>
									<tr>
										<th>그룹 이름</th>
										<td><input type="text" name="code_NM" id="cCode_NM" value="<?php echo $cCODE_NM; ?>" placeholder="그룹 이름" validation="valid" /></td>
									</tr>
									<tr>
										<th>그룹 코드</th>
										<td><input type="text" name="code_Value" id="cCode_Value" value="<?php echo $cCODE_Value; ?>" placeholder="그룹 코드" validation="valid" /></td>
									</tr>
									<?php if ($processSeq != "" && $processSeq != "0") { ?>
									<tr>
										<th>등록일</th>
										<td><?php echo $cUser_Phone; ?></td>
										<th>등록자</th>
										<td><?php echo $cUser_Mobile; ?></td>
									</tr>
									<tr>
										<th>수정일</th>
										<td><?php echo $cUser_Phone; ?></td>
										<th>수정자</th>
										<td><?php echo $cUser_Mobile; ?></td>
									</tr>																		
									<?php } ?>
								</table>  
							</div>
							<div class="buttons">										
								<button id="btn_Save" value="Save" class="btn btn-success"><i class="icon-check icon-white"></i> 저장</button>
								<button id="btn_Reset" value="Reset" class="btn btn-danger"><i class="icon-repeat icon-white"></i> 리셋</button>
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