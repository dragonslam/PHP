
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
				<td><input type="text" name="USER_ID" id="cUSER_ID" value="" placeholder="아이디" validation="userid" /></td>
				<th>비밀번호</th>
				<td><input type="text" name="USER_PW" id="cUSER_PW" value="" placeholder="비밀번호" validation="password" /></td>
			</tr>
			<tr>
				<th>사용자 타입</th>
				<td>
					<select name="USER_TP_CD" id="cUSER_TP_CD">
						<option value="4">일반회원</option>
						<option value="5">관 리 자</option>
					</select>
				</td>
				<th>사용자 권한</th>
				<td>
					<select name="USER_LV_CD" id="cUSER_LV_CD">
						<option value="10">사용자</option>
						<option value="20">관리자</option>
						<option value="30">시스템관리자</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>이름</th>
				<td><input type="text" name="USER_NM" id="cUSER_NM" value="<?php echo $cUser_NM; ?>" placeholder="사용자 이름" validation="valid" /></td>
				<th>이메일</th>
				<td><input type="text" name="USER_Email" id="cUSER_Email" value="<?php echo $cUser_Mail; ?>" placeholder="사용자 이메일" validation="email" /></td>
			</tr>
			<tr>
				<th>전화</th>
				<td><input type="text" name="USER_Tel" id="cUSER_Tel" value="<?php echo $cUser_Phone; ?>" placeholder="전화번호" validation="phone" /></td>
				<th>모바일</th>
				<td><input type="text" name="USER_Mobile" id="cUSER_Mobile" value="<?php echo $cUser_Mobile; ?>" placeholder="핸드폰번호" validation="mobile" /></td>
			</tr>
			<tr id="row_CREATE_INFO" style="display:none;">
				<th>등록일</th>
				<td><span id="cCREATE_DT"></span></td>
				<th>등록자</th>
				<td><span id="cCREATE_NM"></span>(<span id="cCREATE_ID"></span>)</td>
			</tr>
			<tr id="row_UPDATE_INFO" style="display:none;">
				<th>수정일</th>
				<td><span id="cUPDATE_DT"></span></td>
				<th>수정자</th>
				<td><span id="cUPDATE_NM"></span>(<span id="cUPDATE_ID"></span>)</td>
			</tr>
			<tr id="row_LOGIN_INFO" style="display:none;">
				<th>최근접속 시간</th>
				<td><span id="cLOGIN_DT"></span></td>
				<th>최근접속 IP</th>
				<td><span id="cLOGIN_IP"></span></td>
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
				fnCommander("process_member", "setData", processSeq, "", false, "");
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
			fnCommander("member", "list");
		});

		if (processSeq != "") {
			fnCallAjax({
					 "processApp":"process_member"
					,"processCmd":"getData"
					,"processSeq":processSeq
				}, 
				function(data) {
					if (data != "") {
						var oData = $.parseJSON(data);
						if (oData == null && oData.length > 0) return;
						$(oData).each(function(e) {
							for (var oID in oData[e]) {
								SetValue("c"+ oID, oData[e][oID]);						            
					        }					        
						});
						$("#row_CREATE_INFO").show().fadeIn('fast'); 
						$("#row_UPDATE_INFO").show().fadeIn('fast');
						$("#row_LOGIN_INFO").show().fadeIn('fast');
					}
					else {
						fnModalOpen("Contents Management", "검색된 정보가 없습니다.");
					}
				}
			);
		}
	});
</script>