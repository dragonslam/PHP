				<div class="h2_wrap">
					<h2><?php PS_Image("txt_h2_userlist.png", "유입자 리스트")?> </h2>
				</div>
				<nav class="tab_1">
					<ul>
						<li class="on"><a <?php PS_PageLink("statistics9")?>>최근 한달 유입자 리스트</a></li>
						<li><a <?php PS_PageLink("statistics9a")?>>지난달 유입자 리스트</a></li>
					</ul>
				</nav>
				<section class="cs1">
					<div class="h3_wrap">
						<h3>최근 한달 유입자 리스트</h3>
						<p class="para_help"><a href="#help"><?php PS_Image("btn_help.png", "help")?></a></p>
						<div class="box_help">
							<div>
								<span></span>
								<ul>
									<li>도움말입니다.</li>
									<li>도움말입니다.</li>
									<li>도움말입니다.</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="sheader_wrap">
						<div class="fl">
							<a href="#refresh"><?php PS_Image("btn_refresh.png", "refresh")?></a>
							<a href="#prev"><?php PS_Image("btn_arrow_l.png", "prev")?></a>
							<p><span id="list_page_cnt">0</span> ~ <span id="list_total_cnt">0</span> 데이터</p>
							<a href="#next"><?php PS_Image("btn_arrow_r.png", "next")?></a>
						</div>
						<div class="fr">
							<nav class="tab_2">
								<ul>
									<li class="on"><a href="#sort1">최근순</a></li>
									<li><a href="#sort2">재방문순</a></li>
									<li><a href="#sort3">회원가입순</a></li>
									<li><a href="#sort4">구매수순</a></li>
									<li><a href="#excel"><?php PS_Image("blt_excel.png", "")?> 현제페이지 엑셀로 저장</a></li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="tbl_wrap">
						<table class="tbl_data t1">
							<caption>최근 한달 유입자 리스트 내용</caption>
							<colgroup>
								<col width="7%">
								<col width="15%">
								<col width="15%">
								<col width="15%">
								<col width="15%">
								<col width="15%">
								<col width="*">
							</colgroup>
							<tbody>
							</tbody>
						</table>
					</div>
					<div id="excel_export" style="display:none;">
						<table class="tbl_data t1">
							<caption>최근 한달 유입자 리스트 내용</caption>
							<colgroup>
								<col width="7%">
								<col width="15%">
								<col width="15%">
								<col width="15%">
								<col width="15%">
								<col width="*">
							</colgroup>
							<tbody></tbody>
						</table>
					</div>
				</section>
<script type="text/javascript">
<!--
$(document).ready(function(){
	var oStatictis = new com.mad.api.statistics(window._DomainObj, window._DomainCaller);
	
	var oListTable = $(".tbl_wrap table tbody"), 
		 p_rowcnt = 15, 
		 p_pagecnt = 0,
		 p_sort_type = 0,
		 p_total_cnt = 0,
		 p_data = null,
		 p_data = null,
		 p_excel_out = false;

	// 최근 한달 공유된 콘텐츠 
	function getData(rowcnt, pagecnt, sort_type) {		
		 p_rowcnt = rowcnt ? rowcnt : 5, 
		 p_pagecnt = pagecnt ? pagecnt : 0,
		 p_sort_type = sort_type ? sort_type : 0;

		oStatictis.getCurrentView(p_rowcnt, p_pagecnt, p_sort_type, function(r) {		
			if (r.err == 0 && r.cnt > 0) {
				p_total_cnt = r.cnt;		
				p_data = r.ret;
				$("#list_total_cnt").text(String(p_rowcnt * p_pagecnt + r.cnt).money());
				$("#list_page_cnt").text(String(p_rowcnt * p_pagecnt + 1).money());
				drawList(oListTable, r.ret, (p_rowcnt * p_pagecnt));
			}
			else {
				p_total_cnt = 0;
				p_data = null;
				drawList(oListTable, null, (p_rowcnt * p_pagecnt));
				$("#list_total_cnt").text(String(p_rowcnt * p_pagecnt).money());
				$("#list_page_cnt").text(0);
			}
		});
	}
	function exportExcel(oAnchor) {
		var oExcelTable = $("#excel_export table");
		var row_cnt = (p_rowcnt * p_pagecnt) + p_total_cnt;
			 row_cnt = (resource_max < row_cnt) ? row_cnt : row_cnt;
		oStatictis.getCurrentView(row_cnt, 0, p_sort_type, function(r) {		
			if (r.err == 0 && r.cnt > 0) {
				drawList(oExcelTable.find("tbody"), r.ret, 0);
			}
			p_excel_out = true;
			ExcellentExport.excel(oAnchor, oExcelTable[0],"Share", "export_excel.xls");
			oAnchor.click();
		});
	}
	function drawList(obj, data, cnt, callback) {
		obj.empty();
		if (typeof data == 'object' && data != null) {
			var row = new StringBuilder();
			for (var i = 0; i < data.length; i++) {
				var item = data[i];

				row.append("<tr>");
				row.append("	<th scope='row'>번호</th>");
				row.append("	<th scope='row' colspan='2'>유입자</th>");
				row.append("	<th scope='row' colspan='2'>콘텐츠 제목</th>");
				row.append("	<th scope='row'>IP</th>");
				row.append("	<th scope='row'>국가</th>");
				row.append("</tr>");
				row.append("<tr>");
				row.append("	<td rowspan='3'>"+ (cnt + i + 1) +"</td>");
				row.append("	<td colspan='2'>"+ item.device_user +"</td>");
				row.append("	<td colspan='2'>"+ (String(item.title).isEmpty() ? '' : item.title) +"</td>");
				row.append("	<td>"+ item.ip +"</td>");
				row.append("	<td>"+ item.locale +"</td>");
				row.append("</tr>");
				row.append("<tr>");
				row.append("	<th scope='row'>재방문 수</th>");
				row.append("	<th scope='row'>유입채널</th>");
				row.append("	<th scope='row'>회원가입 여부</th>");
				row.append("	<th scope='row'>구매여부</th>");
				row.append("	<th scope='row' colspan='2'>유입일</th>");
				row.append("</tr>");
				row.append("<tr>");
				row.append("	<td class='fc_1'>"+ item.view_cnt +"회</td>");
				row.append("	<td class='fc_1'>"+ getShareTypeImg(item.share_type) +"</td>");
				row.append("	<td class='fc_1'>"+ (item.reg_cnt > 0 ? '회원가입' : '') +"</td>");
				row.append("	<td class='fc_2'>"+ (item.buy_cnt > 0 ? "구매("+ item.buy_cnt +")" : '') +"</td>");
				row.append("	<td colspan='2'>"+ String(item.reg_date).toDate().toDateTimeString(11) +"</td>");
				row.append("</tr>");
				row.append("<tr>");
				row.append("	<td colspan='7' style='border-left:0px;border-right:0px;height:5px;'></td>");
				row.append("</tr>");
			}
			obj.append(row.toString(''));
		}
		else {
			obj.append("<tr><td colspan='7'>해당되는 내용이 없습니다.</td></tr>");
		}
	}
	function sortList(type) {
		type = type ? type : 0;
		$(".sheader_wrap").find("a[href='#sort1']").parent().removeClass('on');
		$(".sheader_wrap").find("a[href='#sort2']").parent().removeClass('on');
		$(".sheader_wrap").find("a[href='#sort3']").parent().removeClass('on');
		$(".sheader_wrap").find("a[href='#sort"+ (type+1) +"']").parent().addClass('on');
		getData(0, 0, type);
	}
	function getShareTypeImg(type) {
		var img = '';
		switch (type) {
			case "fb" : img = "<?php PS_Image('txt_eventtracking_facebook.png', 'Faceboof')?>"; break;
			case "tw" : img = "<?php PS_Image('txt_eventtracking_twitter.png', 'Twitter')?>"; break;
			case "gp" : img = "<?php PS_Image('txt_eventtracking_google.png', 'Google+')?>"; break;
			case "kt" : img = "<?php PS_Image('txt_eventtracking_kakaotalk.png', 'Kakao Talk')?>"; break;
			case "ks" : img = "<?php PS_Image('txt_eventtracking_kakaostory.png', 'Kakao Story')?>"; break;
			case "ln" : img = "<?php PS_Image('txt_eventtracking_line.png', 'Line')?>"; break;
			case "ot" : img = "<?php PS_Image('txt_eventtracking_other.png', 'Other')?>"; break;
		}
		return img;
	}
	
	$(".sheader_wrap").find("a[href='#refresh']").click(function() {
		getData(p_rowcnt, p_pagecnt, p_sort_type);
	});
	$(".sheader_wrap").find("a[href='#prev']").click(function() {
		if (p_pagecnt > 0) {
			getData(p_rowcnt, p_pagecnt-1, p_sort_type);
		}
	});
	$(".sheader_wrap").find("a[href='#next']").click(function() {
		//if (p_total_cnt > (p_rowcnt * (p_pagecnt+1))) {
		if (p_total_cnt >= p_rowcnt) {
			getData(p_rowcnt, p_pagecnt+1, p_sort_type);
		}
	});
	$(".sheader_wrap").find("a[href='#excel']").click(function() {
		ExcellentExport.excel(this, $(".tbl_wrap table")[0],"Share", "export_excel.xls");
		/*
		if (p_excel_out) 
			p_excel_out = false; return true;
		else 
			exportExcel(this); return false;
		*/
	});
	$(".sheader_wrap").find("a[href='#sort1']").click(function() { sortList(0); });
	$(".sheader_wrap").find("a[href='#sort2']").click(function() { sortList(1); });
	$(".sheader_wrap").find("a[href='#sort3']").click(function() { sortList(2); });
	$(".sheader_wrap").find("a[href='#sort4']").click(function() { sortList(3); });

	window._DomainCaller = function()  {		
		getData(0, 0, 0);

		if (_DomainDelay > 1) {
			window.setTimeout(function(){if (typeof _DomainCaller == 'function') _DomainCaller();}, _DomainDelay * 1000);	
		}
	};
	window.setTimeout(function() {
		window._DomainCaller();
	}, 100);
	
});
//-->
</script>