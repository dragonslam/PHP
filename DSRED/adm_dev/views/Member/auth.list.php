<div class="widget-box">
	<div class="widget-title">		
		<span class="icon"><i class="icon-th-list"></i></span><h5>Manager Group List</h5>
	</div>

	<div class="widget-content nopadding">
		<table id="dataTable_ManagerAuth" class="table table-bordered table-striped table-hover data-table">
			<thead>
				<tr>
					<th>No</th>
					<th>그룹 ID</th>
					<th>그룹 이름</th>										
					<th>작성자</th>
					<th>작성일</th>	
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>  
	</div>	
</div>
<script type="text/javascript">
	$(document).ready(function(){
		fnRanderDataTable_Contents("dataTable_ManagerAuth", "process_group", "getList", "-1", fnRanderDataRow, function() {
			$("#dataTable_ManagerAuth").dataTable({
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
	});
	function fnRanderDataRow(oRowData) {
		if (typeof oRowData != "object") return "";
		
		var row = new StringBuilder();		
		row.append("<tr>");
		row.append("	<td>"+ oRowData.CODE_SEQ +"</td>");
		row.append("	<td><a onclick='fnGotoForm(\""+ oRowData.CODE_SEQ +"\");'>"+ fnViewDataRefine(oRowData.CODE_ID) +"</a></td>");
		row.append("	<td><a onclick='fnGotoForm(\""+ oRowData.CODE_SEQ +"\");'>"+ fnViewDataRefine(oRowData.CODE_NM) +"</a></td>");								
		row.append("	<td class='center'>"+ fnViewDataRefine(oRowData.CREATE_NM) +"</td>");
		row.append("	<td class='center'>"+ fnViewDataRefine(oRowData.CREATE_DT) +"</td>");		
		row.append("</tr>");
		return row.toString();
	}	
</script>						