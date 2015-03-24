			
<script type="text/javascript">
	$(document).ready(function(){
		fnRanderDataTable_Contents("dataTable_LoginLog", "getLoginLog", function() {
			$("#dataTable_LoginLog").dataTable({
				"bJQueryUI": true,
				"bPaginate": true,
				"bLengthChange": true,
				"bFilter": false,
				"bSort": true,
				"bInfo": false,
				"bAutoWidth": true,
				"iDisplayLength" : 20,
				"aaSorting": [[ 0, "desc" ]],
				"sPaginationType": "full_numbers",
				"sDom": '<""l>t<"F"fp>'
			});
		});
	});

	function fnRanderDataTable_Contents(dataTable, pCmd, callback) {
		if (typeof document.getElementById(dataTable) != "object") {
			fnModalOpen("Contents Management", "목록을 출력할 수 없습니다.");
			return false;
		}

		fnCallAjax({
				 "processApp":"manager"
				,"processCmd":pCmd
				,"processSeq":"-1"
			}, 
			function(data) {
				if (data != "") {
					var oData = $.parseJSON(data);
					if (oData == null && oData.length > 0) return;

					$(oData).each(function(e) {
						if (pCmd == "getLoginLog")
							$("#"+dataTable+" tbody").append(fnRanderDataLogRow(oData[e]));						
						else 
							$("#"+dataTable+" tbody").append(fnRanderDataRow(oData[e]));						
					});
				} 
				else {
					fnModalOpen("Contents Management", "검색된 정보가 없습니다.");
				}

				if (typeof callback == "function"){
					callback(data);
				}
			}
		);
	}

	function fnRanderDataLogRow(oRowData) {
		if (typeof oRowData != "object") return "";
		
		var row = new StringBuilder();		
		row.append("<tr>");
		row.append("	<td>"+ oRowData.LOGIN_DT +"</td>");
		row.append("	<td>"+ oRowData.LOGOUT_DT +"</td>");
		row.append("	<td>"+ oRowData.USER_ID +"</td>");
		row.append("	<td><a href='http://whois.urajil.com/whois.php?kind=ip&q="+ oRowData.LOGIN_IP +"' target='_blank'>"+ oRowData.LOGIN_IP +"</a></td>");
		row.append("</tr>");
		return row.toString();
	}
	function fnViewDataRefine(data) {
		data = String(data);
		if (data.isEmpty() || data == "null")
			return "";
		else
			return data.trim();
	}
	function fnGetUserType(data) {
		data = String(data);
		if (data.isEmpty() || data == "null")
			return "";
		else
			return (data.trim() == "1") ? "회원" : "관리자";
	}
	function fnGetUserLevel(data) {
		data = String(data);
		if (data.isEmpty() || data == "null")
			return "";
		else {
			switch (data.int()) {
				case 10 : return "user";
				case 20 : return "manager";
				case 25 : return "supervisor";
			}
		}		
	}
	function fnGotoForm(memberSeq) {
		fnCommander("ADMIN_MANAG", "form", memberSeq, "", false, "", "?admin=<%=templateCartegory%>&view=ADMIN_MANAG" );
	}
</script>
			<?php _template_print_Contents_Header(); ?>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span8">


					</div>

				<div class="span4">
					<div class="widget-box">

						<div class="widget-title">		
							<span class="icon"><i class="icon-th-list"></i></span><h5>Connect Log</h5>
						</div>

						<div class="widget-content nopadding">
							<table id="dataTable_LoginLog" class="table table-bordered table-striped table-hover data-table">
							<thead>
								<tr>
									<th>로그인</th>
									<th>로그아웃</th>
									<th>관리자 ID</th>
									<th>접속 IP</th>	
								</tr>
							</thead>
							<tbody>
							</tbody>
							</table>  
						</div>

					</div>
				</div>
			</div>
		</div>