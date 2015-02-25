				<div class="h2_wrap">
					<h2><?php PS_Image("txt_h2_eventtracking.png", "이벤트 트래킹 등록")?> </h2>
				</div>
				<section class="cs1 mt_1">
					<div class="h3_wrap">
						<h3>이벤트 트래킹 URL 생성 및 등록</h3>
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
					<p class="para_num mt_1"><span>1</span> 아래 입력란에 현재 진행중인 이벤트 URL 및 이벤트분야를 선택하고 URL 생성버튼을 클릭하세요</p>
					<div class="box_input1">
						<div class="fl">
							<dl>
								<dt class="bc_1">현재 진행 이벤트 URL 입력</dt>
								<dd><input type="text" id="tracking_url" name="tracking_url" value="http://"></dd>
							</dl>
							<dl>
								<dt class="bc_2">이벤트 분야 선택</dt>
								<dd>
									<div class="select_wrap t2">
										<span class="select_label">이벤트 분야를 선택하여 주세요</span>
										<select id="tracking_category" name="tracking_category"></select>
									</div>
								</dd>
							</dl>
						</div>
						<div class="fr"><a href="#url" id="tracking_btn"><span>URL 생성</span></a></div>
					</div>
				</section><!-- // 이벤트 트래킹 URL 생성 및 등록 -->
				<section class="cs1 mt_1">
					<span class="icon_next"><?php PS_Image("blt_arrow_d3.png", "다음")?></span>
					<div class="para_wrap">
						<p class="para_num"><span>2</span> 아래 공란에 각 SNS에 이벤트를 트래킹 할 수 있는 URL이 자동으로 나타납니다</p>
					</div>
					<div class="box_url">
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
					<div class="para_wrap2">
						<p class="para_num"><span>3</span> 새롭게 생성된 각 SNS URL을 복사하여 온라인(SNS, WEB, MOBILE)에서 홍보하시면 이벤트에 대한 트래킹데이터를 보실 수 있습니다 </p>
					</div>

				</section><!-- //  -->
<script type="text/javascript">
<!--
$(document).ready(function(){
	var oTrackCartgory	= $("#tracking_category");
	var oTrackHandler	= new com.mad.api.tracking(oTrackCartgory);
	oTrackHandler.bindTrackingCategory(function() {
		
		oTrackCartgory.prev(".select_label").html(oTrackCartgory.find("option:selected").text());

		$("#tracking_btn").click(function() {
			oTrackHandler.setEvent($("#tracking_url"), function(r) {
				$(".box_url").find("span[name='facebook']").empty().text(r.ret.tracking_url+"&t=fb");
				$(".box_url").find("span[name='twitter']").empty().text(r.ret.tracking_url+"&t=tw");
				$(".box_url").find("span[name='google']").empty().text(r.ret.tracking_url+"&t=gp");
				$(".box_url").find("span[name='kakaotalk']").empty().text(r.ret.tracking_url+"&t=kt");
				$(".box_url").find("span[name='kakaostory']").empty().text(r.ret.tracking_url+"&t=ks");
				$(".box_url").find("span[name='line']").empty().text(r.ret.tracking_url+"&t=ln");
				$(".box_url").find("span[name='other']").empty().text(r.ret.tracking_url);
			});
		});
	});

	$(".box_url").find("dd").each(function() {
		$(this).css("cursor", "pointer").click(function() {
			fn_CopyText($(this));
		});
	});
});
//-->
</script>
