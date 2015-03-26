<div class="widget-box">
	<div class="widget-title">		
		<span class="icon"><i class="icon-folder-close"></i></span><h5>Address Search</h5>
		<div class="buttons">
			<a href="#" class="btn btn-mini" id="btn_Search"><i class="icon-search"></i> 검색</a>
		</div>
	</div>

	<div class="widget-content nopadding">
		<table id="dataTable_Manager" class="table table-bordered table-striped table-hover data-table">									
			<tr>
				<th>우편번호</th>
				<td><input type="text" name="code_ID" id="cCode_ID" value="" placeholder="우편번호" validation="userid" /></td>										
				<th>주소검색</th>
				<td><input type="text" name="code_NM" id="cCode_NM" value="" placeholder="주소검색" validation="valid" /></td>
			</tr>
		</table>	
		
	</div>
</div>	
<div class="widget-box">
	<div class="widget-title">		
		<span class="icon"><i class="icon-th-list"></i></span><h5>Address List</h5>
	</div>	
	<div class="widget-content nopadding">
		<table id="dataTable_Address" class="table table-bordered table-striped table-hover data-table">
			<thead>
				<tr>
					<th>우편번호</th>
					<th>시/도</th>
					<th>군/구</th>
					<th>도/동</th>					
					<th>상세</th>
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
		fnRanderDataTable_Contents("dataTable_Address", "process_sys_adress", "getList", "-1", fnRanderDataRow, function() {
			$("#dataTable_Address").dataTable({
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
		row.append("	<td><a onclick='fnGotoForm(\""+ oRowData.CODE_SEQ +"\");'>"+ fnViewDataRefine(oRowData.CODE_VALUE) +"</a></td>");						
		row.append("	<td class='center'>"+ fnViewDataRefine(oRowData.CREATE_NM) +"</td>");
		row.append("	<td class='center'>"+ fnViewDataRefine(oRowData.CREATE_DT) +"</td>");
		row.append("	<td class='center'>"+ fnViewDataRefine(oRowData.UPDATE_NM) +"</td>");
		row.append("	<td class='center'>"+ fnViewDataRefine(oRowData.UPDATE_DT) +"</td>");
		row.append("</tr>");
		return row.toString();
	}	
</script>						