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
				fnCommander("admin-manager", "SaveProcess", processSeq, "", false, "", "?admin=172&view=admin-manager" );
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
	
	function fnResetForm() {
		$("input:text").each(function(o) {
			$(this).val(String($(this).attr("placeholder")).isEmpty() ? "" : String($(this).attr("placeholder")));			
		});
	}

</script>
<%

If IsE(processSeq) = False And processSeq <> "0" Then 
	
	SQL = ""
	SQL = SQL & "SELECT USER_SEQ,USER_ID,USER_PW,USER_NM "
	SQL = SQL & "	,USER_Level,USER_Type,USER_Email,USER_Tel,USER_Mobile "
	SQL = SQL & "FROM TBL_MEMBER "
	If IsNumeric(processSeq) Then 
		SQL = SQL & "WHERE USER_SEQ = '"& processSeq &"' "
	Else 
		SQL = SQL & "WHERE USER_ID = '"& processSeq &"' "
	End If 
	oRS.Open SQL,oDbCon,1,1
	If not oRs.eof Then
		cUser_ID			= oRs("USER_ID")
		cUser_PW		= oRs("USER_PW")
		cUser_TYPE		= oRs("USER_Type")
		cUser_LEVEL	= oRs("USER_Level")
		cUser_NM		= oRs("USER_NM")
		cUser_Mail		= oRs("USER_Email")
		cUser_Phone	= oRs("USER_Tel")
		cUser_Mobile	= oRs("USER_Mobile")		
	End If 
	oRs.Close()
End If 
%>

						<div class="widget-box">
							<div class="widget-title">		
								<span class="icon"><i class="icon-file"></i></span><h5>Manager Form</h5>
								<div class="buttons">
									<a href="#" class="btn btn-mini" id="btn_ResetT"><i class="icon-repeat"></i> Reset</a>
								</div>
							</div>

							<div class="widget-content nopadding">
								<table id="dataTable_Manager" class="table table-bordered table-striped table-hover data-table">									
									<tr>
										<th>아이디</th>
										<td><input type="text" name="user_ID" id="cUser_ID" value="<%=cUser_ID%>" placeholder="아이디" validation="userid" /></td>
										<th>비밀번호</th>
										<td><input type="text" name="user_PW" id="cUser_PW" value="<%=cUser_PW%>" placeholder="비밀번호" validation="password" /></td>
									</tr>
									<tr>
										<th>사용자 타입</th>
										<td>
											<select name="user_TYPE" id="cUser_TYPE">
												<option value="1"<% If cUser_TYPE = "1" Then Response.write(" selected") %>>일반회원</option>
												<option value="2"<% If cUser_TYPE = "2" Then Response.write(" selected") %>>관 리 자</option>
											</select>
										</td>
										<th>사용자 권한</th>
										<td>
											<select name="user_LEVEL" id="cUser_LEVEL">
												<option value="10"<% If cUser_LEVEL = "10" Then Response.write(" selected") %>>사용자</option>
												<option value="20"<% If cUser_LEVEL = "20" Then Response.write(" selected") %>>관리자</option>
												<option value="25"<% If cUser_LEVEL = "25" Then Response.write(" selected") %>>시스템관리자</option>
											</select>
										</td>
									</tr>
									<tr>
										<th>이름</th>
										<td><input type="text" name="user_NM" id="cUser_NM" value="<%=cUser_NM%>" placeholder="사용자 이름" validation="valid" /></td>
										<th>이메일</th>
										<td><input type="text" name="user_EMail" id="cUser_Mail" value="<%=cUser_Mail%>" placeholder="사용자 이메일" validation="email" /></td>
									</tr>
									<tr>
										<th>전화</th>
										<td><input type="text" name="user_Phone" id="cUser_Phone" value="<%=cUser_Phone%>" placeholder="전화번호" validation="phone" /></td>
										<th>모바일</th>
										<td><input type="text" name="user_Mobile" id="cUser_Mobile" value="<%=cUser_Mobile%>" placeholder="핸드폰번호" validation="mobile" /></td>
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