				<div class="h2_wrap">
					<h2><?php PS_Image("txt_h2_eventtracking.png", "나의 트래킹 관리")?> </h2>
				</div>
				<section class="cs1 mt_1">
					<div class="h3_wrap">
						<h3>나의 이벤트 트래킹 리스트</h3>
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
					<div class="tbl_wrap">
						<table id="tracking_table_event" class="tbl_data t2">
							<caption>나의 이벤트 트래킹 리스트</caption>
							<colgroup>
								<col width="7%">
								<col width="10%">
								<col width="50%">
								<col width="10%">
								<col width="16%">
								<col width="7%">
							</colgroup>
							<thead>
								<tr>
									<th scope="row">번호</th>
									<th scope="row">주소보기</th>
									<th scope="row">내 등록 URL</th>
									<th scope="row">카테고리</th>
									<th scope="row">등록일</th>
									<th scope="row">삭제</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</section><!-- //  나의 이벤트 트래킹 리스트 -->
				<section class="cs1 mt_1">
					<div class="h3_wrap">
						<h3>나의 소셜 트래킹 리스트</h3>
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
					<div class="tbl_wrap">
						<table  id="tracking_table_social" class="tbl_data t3">
							<caption>나의 이벤트 트래킹 리스트</caption>
							<colgroup>
								<col width="7%">
								<col width="30%">
								<col width="10%">
								<col width="30%">
								<col width="16%">
								<col width="7%">
							</colgroup>
							<thead>
								<tr>
									<th scope="row">번호</th>
									<th scope="row">내가 입력한 도메인</th>
									<th scope="row">카테고리</th>
									<th scope="row">인증번호</th>
									<th scope="row">등록일</th>
									<th scope="row">삭제</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td class="ta_l">http://zone.co.kr</td>
									<td>서비스</td>
									<td>461ef1f18a91a84fcf3321abf644b1</td>
									<td>2014 - 08 -25   18:34</td>
									<td><a href="#none" class="btn_waste"><?php PS_Image("btn_waste.png", "삭제")?></a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</section><!-- //  나의 이벤트 트래킹 리스트2 -->
<script type="text/javascript">
<!--
function fn_GetTrackingEventList(o) {
	var oTrackTable	= $("#tracking_table_event tbody");
	
	o.getEvent('100', '0', function(r) {

		oTrackTable.empty();
		if (r.cnt > 0) {
			var row = new StringBuilder();
			for (var i = 0; i < r.ret.length; i++)
			{
				var item = r.ret[i];
				row.append("<tr class='qq'>");
				row.append("	<td>"+ (r.ret.length - i) +"</td>");
				row.append("	<td><a href='#folder' class='btn_folder' tracking_url='"+ item.tracking_url +"'>보기</a></td>");
				row.append("	<td class='ta_l'><a href='"+ item.url +"' target='_blank'>"+ item.url +"</a></td>");
				row.append("	<td>"+ o.getTrackingCartgoryName(item.category) +"</td>");
				row.append("	<td>"+ item.reg_date +"</td>");
				row.append("	<td><a href='#none' class='btn_waste' domain_id='"+ item.domain_id +"'><?php PS_Image('btn_waste.png', '삭제')?></a></td>");
				row.append("</tr>");
				row.append("<tr class='aa'><td colspan='6'></td></tr>");
			}
			oTrackTable.append(row.toString(''));
			oTrackTable.find(".btn_folder").click(function() {
				
				var t_url = $(this).attr("tracking_url");
				$(".btn_folder").removeClass("on");
				$(".aa td").hide().empty();
				if ($(this).attr("on") == "true") {					
					$(this).attr("on", ""); return;
				}
				$(this).attr("on", "true")
				$(this).addClass("on");				
				
				var cell	= $(this).parent().parent().next().find("td");
				cell.css("display", "table-cell").html($("#tracking_event_url_list").html());
				cell.find("span[name='facebook']").empty().text(t_url+"&t=fb");
				cell.find("span[name='twitter']").empty().text(t_url+"&t=tw");
				cell.find("span[name='google']").empty().text(t_url+"&t=gp");
				cell.find("span[name='kakaotalk']").empty().text(t_url+"&t=kt");
				cell.find("span[name='kakaostory']").empty().text(t_url+"&t=ks");
				cell.find("span[name='line']").empty().text(t_url+"&t=ln");
				cell.find("span[name='other']").empty().text(t_url);
				cell.parent().find("dd").each(function() {
					$(this).css("cursor", "pointer").click(function() {
						fn_CopyText($(this));
					});
				});
			});
			oTrackTable.find(".btn_waste").click(function() {				
				var target	= $(this).parent().parent();
				if (confirm(fn_GetMessage("SYS_DELETE_CONFIRM"))) {					
					o.delEvent($(this).attr("domain_id"), 
					function(r) {
						fn_CallMessage("SYS_DELETE_SUCCESS");
						target.next().remove();						
						target.hide('slow', function(){ target.remove(); });
					}, 
					function(r) {
						fn_CallMessage("SYS_DELETE_ERROR");
					});
				}
			});
		}
		else {
			oTrackTable.append("<tr><td colspan='6'>해당되는 내용이 없습니다.</td></tr>");
		}
	});
}
function fn_fn_GetTrackingSocialList(o) {
var oTrackTable	= $("#tracking_table_social tbody");
	
	o.getSocial('100', '0', function(r) {

		oTrackTable.empty();
		if (r.cnt > 0) {
			var row = new StringBuilder();
			for (var i = 0; i < r.ret.length; i++)
			{
				var item = r.ret[i];
				row.append("<tr class='qq'>");
				row.append("	<td>"+ (r.ret.length - i) +"</td>");
				row.append("	<td class='ta_l'><a href='"+ item.domain +"' target='_blank'>"+ item.domain +"</a></td>");
				row.append("	<td>"+ o.getTrackingCartgoryName(item.category) +"</td>");
				row.append("	<td>"+ item.auth +"</td>");
				row.append("	<td>"+ item.reg_date +"</td>");
				row.append("	<td><a href='#none' class='btn_waste' domain_id='"+ item.domain_id +"'><?php PS_Image('btn_waste.png', '삭제')?></a></td>");
				row.append("</tr>");
			}
			oTrackTable.append(row.toString(''));
			oTrackTable.find(".btn_waste").click(function() {				
				var target	= $(this).parent().parent();
				if (confirm(fn_GetMessage("SYS_DELETE_CONFIRM"))) {
					o.delSocial($(this).attr("domain_id"), 
					function(r) {
						fn_CallMessage("SYS_DELETE_SUCCESS");
						target.hide('slow', function(){ target.remove(); });
					},
					function(r) {
						fn_CallMessage("SYS_DELETE_ERROR");
					});
				}
			});
		}
		else {
			oTrackTable.append("<tr><td colspan='6'>해당되는 내용이 없습니다.</td></tr>");
		}
	});
}


$(document).ready(function(){
	var oTrackHandler	= new com.mad.api.tracking();

	fn_GetTrackingEventList(oTrackHandler);
	fn_fn_GetTrackingSocialList(oTrackHandler);
});

//-->
</script>

<div id="tracking_event_url_list" style="display:none;">
	<div class="box_url mb_space">
		<ul>
			<li>
				<dl>
					<dt><?php PS_Image("txt_eventtracking_facebook.png", "facebook")?></dt>
					<dd><span name="facebook"></span></dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt><?php PS_Image("txt_eventtracking_twitter.png", "twitter")?></dt>
					<dd><span name="twitter"></span></dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt><?php PS_Image("txt_eventtracking_google.png", "google+")?></dt>
					<dd><span name="google"></span></dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt><?php PS_Image("txt_eventtracking_kakaotalk.png", "kakaotalk")?></dt>
					<dd><span name="kakaotalk"></span></dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt><?php PS_Image("txt_eventtracking_kakaostory.png", "kakaostory")?></dt>
					<dd><span name="kakaostory"></span></dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt><?php PS_Image("txt_eventtracking_line.png", "line")?></dt>
					<dd><span name="line"></span></dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt><?php PS_Image("txt_eventtracking_other.png", "other")?></dt>
					<dd><span name="other"></span></dd>
				</dl>
			</li>
		</ul>
	</div>
</div>