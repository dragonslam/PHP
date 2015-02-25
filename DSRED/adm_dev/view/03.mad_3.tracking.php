				<div class="h2_wrap">
					<h2><?php PS_Image("txt_h2_socialtracking.png", "소셜 트래킹 등록")?> </h2>
				</div>
				<section class="cs1 mt_1">
					<div class="h3_wrap">
						<h3>소셜 트래킹 URL 등록</h3>
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
					<p class="para_num mt_1"><span>1</span> 아래 입력란에 트래킹할 홈페이지 URL 및 분야를 선택하고 URL 생성버튼을 클릭하세요</p>
					<div class="box_input1">
						<div class="fl">
							<dl>
								<dt class="bc_1">홈페이지 도메인 입력</dt>
								<dd><input type="text" id="tracking_url" name="tracking_url" value="http://"></dd>
							</dl>
							<dl>
								<dt class="bc_2">홈페이지 분야 선택</dt>
								<dd>
									<div class="select_wrap t2">
										<span class="select_label">홈페이지 분야를 선택하여 주세요</span>
										<select id="tracking_category" name="tracking_category"></select>
									</div>
								</dd>
							</dl>
						</div>
						<div class="fr"><a href="#url" id="tracking_btn"><span>URL 생성</span></a></div>
					</div>
				</section><!-- // 소셜 트래킹 URL 등록 -->
				<section class="cs1 mt_1" id="tracking_result_panel" style="display:none;">
					<span class="icon_next"><?php PS_Image("blt_arrow_d3.png", "다음")?></span>
					<div class="para_wrap">
						<p class="para_num"><span class="p2">2</span> 아래에 생성된 정보 중 일반 웹페이지 트래킹을 원하시는 경우 일반 웹페이지 Plug - In을 이용하시고, <br>
						워드프레스 페이지 트래킹을 원하시면 워드프레스용 Plug - In 이용방법을 참고하시면 트래킹 이용이 가능합니다</p>
					</div>
					<h4 class="h4_tracking t1">일반 웹페이지 Plug - In</h4>
					<div class="box_gray1">
						<p>트래킹을 이용할 홈페이지에 아래의 코드를 카피하여 삽입하세요</p>
<xmp id="tracking_script">
<head> .... .... <!-- 아래 코드를 카피하여, </head> 태그 안에 넣으세요. --> 
<script type="text/java-script"> 
	var _m2block = {}; _m2block.auth = '{MAD_AUTH_KEY}'; 
	(function() { 
	  var _m2block_a = document.createElement('script'); 
	  _m2block_a.type = 'text/java-script'; _m2block_a.async = true; 
	  _m2block_a.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'mad.m2block.com/js/madengine_new.js'; 
	  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(_m2block_a, s); }
	)(); 
</script> 
</head>
</xmp>
						<p class="mt_1">그리고 아래와 같은 코드를 카피하여, 소셜공유버튼을 <body> 태그 안에, 원하는 위치에 넣어줍니다. <br>
						원하는 모양으로 만드시려면, 원하는 class 값을 추가로 설정하여 CSS를 적용하여 마음대로 모양을 만드셔도 됩니다.</p>
<xmp>
<body> ... ... <!-- 아래 코드를 카피하여, 원하는 위치에 넣으세요. --> 
<div>	
	<a class="mad_fb" > <img class='m2bshare' src="http://mad.m2block.com/img/facebook.png"> </a> 
	<a class="mad_tw" > <img class='m2bshare' src="http://mad.m2block.com/img/twitter.png"> </a> 
	<a class="mad_gp" > <img class='m2bshare' src="http://mad.m2block.com/img/google.png"> </a> 
	<a class="mad_KS"><img class='m2bshare' src="http://mad.m2block.com/img/bt_icon_L.png" ></a> 
	<a class="mad_KT"><img class='m2bshare' src="http://mad.m2block.com/img/btn_small_01_ios.png" ></a> 
	<a class="mad_LI" > <img class='m2bshare' src="http://mad.m2block.com/img/linebutton.png" > </a> 
</div> ... ... </body>
</xmp>
					</div>
					<h4 class="h4_tracking t2">워드프레스용 Plug - In 설치방법</h4>
					<div class="box_gray1">
						<ol class="olist_1">
							<li><span>1</span> 워드프레스 관리자 모드에서, 왼쪽의 <strong>"플러그인 추가하기"</strong> 메뉴를 클릭<li>
							<li><span>2</span> <strong>"m2block mad"</strong> 로 검색하여, <strong>"지금 설치하기"</strong> 클릭<li>
							<li><span>3</span> 설치된 플러그인 클릭한 후, <strong>M2Block MAD Share 의 "편집"</strong>을 클릭<li>
							<li><span>4</span> <strong>$_mad_auth 의 값에 아래에 나오는 MAD 인증아이디를 복사</strong>하여 붙여넣고, <strong>"파일 업데이트"</strong> 클릭<li>
							<li><span>5</span> 마지막으로 플러그인을 <strong>"활성화"</strong> 한다.<li>
						</ol>
						<dl class="dl_id">
							<dt>웹트래킹 인증아이디</dt>
							<dd><span id="tracking_auth_key"></span></dd>
						</dl>
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
			$("#tracking_result_panel").css('display', 'none');

			oTrackHandler.setSocial($("#tracking_url"), function(r) {
				$("#tracking_script").text(String($("#tracking_script").text()).replaceAll("{MAD_AUTH_KEY}", r.ret.auth));
				$("#tracking_auth_key").text(r.ret.auth);
				$("#tracking_result_panel").css('display', '');
			});
		});
	});
});
//-->
</script>
