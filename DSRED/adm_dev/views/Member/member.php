<?php _template_print_Contents_Header(); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span8">					
		
		<?php
		$processApp = ($processApp == "") ? "member" : $processApp;
		$processCmd = ($processCmd == "") ? "list" : $processCmd;
				
		@include "/common/process/member.inc";		
		
		echo "<br/>Member Process - ". $processApp ."/". $processCmd ."/". empty($memberDao);
		
		@include $processApp.".".$processCmd.".php";				
		?>
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
<script type="text/javascript">
	$(document).ready(function(){
		fnRanderDataTable_Contents("dataTable_LoginLog", "member", "getLoginLog", "-1", fnRanderDataLogRow, function() {
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
</script>		