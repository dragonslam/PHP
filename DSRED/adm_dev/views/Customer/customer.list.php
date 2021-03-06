<div class="widget-box">
	<div class="widget-title">		
		<span class="icon"><i class="icon-th-list"></i></span><h5>Customer List</h5>
	</div>

	<div class="widget-content nopadding">
		<table id="dataTable_Customer" class="table table-bordered table-striped table-hover data-table">
			<thead>
				<tr>
					<th>No</th>
					<th>이름</th>
					<th>전화</th>
					<th>모바일</th>
					<th>이메일</th>
					<th>작성자</th>
					<th>작성일</th>	
					<th>수정자</th>
					<th>수정일</th>	
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>  
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		fnRanderDataTable_Contents("dataTable_Customer", "process_member", "getList", "-1", fnRanderDataRow, function() {
			$("#dataTable_Customer").dataTable({
				"bJQueryUI": true,
				"bPaginate": true,
				"bLengthChange": true,
				"bFilter": true,
				"bSort": true,
				"bInfo": false,
				"bAutoWidth": true,
				"iDisplayLength" : 20,
				"aaSorting": [[ 6, "desc" ]],
				"sPaginationType": "full_numbers",
				"sDom": '<""l>t<"F"fp>'
			});
		});

		$("#btn_Insert").click(function() { fnGotoForm(); });
	});
	function fnRanderDataRow(oRowData) {
		if (typeof oRowData != "object") return "";
		
		var row = new StringBuilder();		
		row.append("<tr>");
		row.append("	<td>"+ oRowData.USER_SEQ +"</td>");
		row.append("	<td>"+ oRowData.USER_ID +"</td>");
		row.append("	<td><a onclick='fnGotoForm(\""+ oRowData.USER_SEQ +"\");'>"+ fnViewDataRefine(oRowData.USER_NM) +"</a></td>");
		row.append("	<td class='center'>"+ fnGetUserType(oRowData.USER_Type) +"</td>");
		row.append("	<td class='center'>"+ fnGetUserLevel(oRowData.USER_Level) +"</td>");
		row.append("	<td class='center'>"+ fnViewDataRefine(oRowData.LOGIN_CNT) +"</td>");
		row.append("	<td class='center'>"+ fnViewDataRefine(oRowData.LOGIN_DT) +"</td>");
		row.append("	<td class='center'>"+ fnViewDataRefine(oRowData.CREATE_NM) +"</td>");
		row.append("	<td class='center'>"+ fnViewDataRefine(oRowData.CREATE_DT) +"</td>");
		row.append("	<td class='center'>"+ fnViewDataRefine(oRowData.UPDATE_NM) +"</td>");
		row.append("	<td class='center'>"+ fnViewDataRefine(oRowData.UPDATE_DT) +"</td>");
		row.append("</tr>");
		return row.toString();
	}
	function fnGotoForm(memberSeq) {
		fnCommander("member", "form", memberSeq, "", false, "", _Query.getQuery());
	}
</script>						