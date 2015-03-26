
						<div class="widget-box">
							<div class="widget-title">		
								<span class="icon"><i class="icon-file"></i></span><h5>Manager Authentication Form</h5>
								<div class="buttons">
									<a href="#" class="btn btn-mini" id="btn_ResetT"><i class="icon-repeat"></i> Reset</a>
								</div>
							</div>
							
							<input type="hidden" name="AUTH_TP_CD" id="cAUTH_TP_CD" value="" />
							<input type="hidden" name="USER_LV_CD" id="cUSER_LV_CD" value="" />
							<input type="hidden" name="USER_ID" id="cUSER_ID" value="" />
							<div class="widget-content nopadding">
								<table id="dataTable_Manager" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th rowspan="2">메뉴</th>
											<th colspan="7">권한</th>												
										</tr>
										<tr>											
											<th><input type="checkbox" id="title_AUTH_LIST_YN"/>목록</th>												
											<th><input type="checkbox" id="title_AUTH_VIEW_YN"/>읽기</th>
											<th><input type="checkbox" id="title_AUTH_INSERT_YN"/>등록</th>
											<th><input type="checkbox" id="title_AUTH_MODIFY_YN"/>수정</th>
											<th><input type="checkbox" id="title_AUTH_DELETE_YN"/>삭제</th>
											<th><input type="checkbox" id="title_AUTH_PRINT_YN"/>인쇄</th>
											<th><input type="checkbox" id="title_AUTH_EXPORT_YN"/>출력</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>사용자 관리</td>
											<td><input type="checkbox" name="AUTH_LIST_YN_1" id="cAUTH_LIST_YN_1" value="Y"/></td>
											<td><input type="checkbox" name="AUTH_VIEW_YN_1" id="cAUTH_VIEW_YN_1" value="Y"/></td>
											<td><input type="checkbox" name="AUTH_INSERT_YN_1" id="cAUTH_INSERT_YN_1" value="Y"/></td>
											<td><input type="checkbox" name="AUTH_MODIFY_YN_1" id="cAUTH_MODIFY_YN_1" value="Y"/></td>
											<td><input type="checkbox" name="AUTH_DELETE_YN_1" id="cAUTH_DELETE_YN_1" value="Y"/></td>
											<td><input type="checkbox" name="AUTH_PRINT_YN_1" id="cAUTH_PRINT_YN_1" value="Y"/></td>
											<td><input type="checkbox" name="AUTH_EXPORT_YN_1" id="cAUTH_EXPORT_YN_1" value="Y"/></td>											
										</tr>	
										<tr>
											<td>사용자 그룹관리</td>
											<td><input type="checkbox" name="AUTH_LIST_YN_1" id="cAUTH_LIST_YN_1" value="Y"/></td>
											<td><input type="checkbox" name="AUTH_VIEW_YN_1" id="cAUTH_VIEW_YN_1" value="Y"/></td>
											<td><input type="checkbox" name="AUTH_INSERT_YN_1" id="cAUTH_INSERT_YN_1" value="Y"/></td>
											<td><input type="checkbox" name="AUTH_MODIFY_YN_1" id="cAUTH_MODIFY_YN_1" value="Y"/></td>
											<td><input type="checkbox" name="AUTH_DELETE_YN_1" id="cAUTH_DELETE_YN_1" value="Y"/></td>
											<td><input type="checkbox" name="AUTH_PRINT_YN_1" id="cAUTH_PRINT_YN_1" value="Y"/></td>
											<td><input type="checkbox" name="AUTH_EXPORT_YN_1" id="cAUTH_EXPORT_YN_1" value="Y"/></td>											
										</tr>									
									</tbody>
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