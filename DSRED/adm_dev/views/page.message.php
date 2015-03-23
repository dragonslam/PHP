	<div class ="wrap main">
		<header class="main">
			<section class="hs1">
				<h1><a <?php PS_PageLink(); ?>><?php PS_Image("txt_logo_1.png", "MAD")?></a></h1>
				<nav class="gnb">
					<ul>
						<li><a <?php PS_PageLink("info"); ?>>MAD?</a></li>
						<li><a <?php PS_PageLink("faq"); ?>>FAQ</a></li>
					</ul>
				</nav>
			</section>
			<section class="hs2">
				<p class="para_hs1"><span id="mad_login_msg">매드 고객님을 환영합니다.</span></p>
				<nav class="tnb">
					<ul>
						<li>
							<a href="#" class="btn_signin"><?php PS_Image("btn_signin.png", "SIGN IN")?></a>
							<a href="#" class="btn_logout" style='display:none;'><?php PS_Image("btn_logout.png", "LOGOUT")?></a>
						</li>
						<li>
							<a href="#" class="btn_register"><?php PS_Image("btn_register.png", "REGISTER")?></a>
							<a href="#" class="btn_changepw"  style='display:none;'><?php PS_Image("btn_changepw.png", "CHANGE PW")?></a>
						</li>
					</ul>
				</nav>
			</section>
		</header>

		<div class="contents main" id="contents">
			<div style="height:500px;">
				<div style="width:300px;height:300px;border:1px solid #3333;" align="center">
					<?php echo($site_message); ?>
				</div>
			</div>
			<script type="text/javascript">
			<!--
				$(document).ready(function(){
					alert("<?php echo($site_message); ?>");
					fn_PageLink("main");
				});
			//-->
			</script>
		</div>

		<footer class="main">
			<div class="fl">
				<nav class="fnb">
					<ul>
						<li><a href="http://uglyoz6.wix.com/m2block" target="_blank">Company</a></li>
						<li><a href="#facebook" target="_blank"><?php PS_Image("blt_facebook.png", "")?> Facebook</a></li>
						<li><a <?php PS_PageLink("terms1"); ?>>이용약관</a></li>
						<li><a <?php PS_PageLink("terms2"); ?>>개인정보 취급방침</a></li>
					</ul>
				</nav>
			</div>
			<div class="fr">
				<section class="fs1">
					<p><?php PS_Image("txt_logo_2.png", "M2Block")?></p>
				</section>
				<section class="fs2">
					<p>사업자등록번호 : 113-23-30599</p>
					<p>경기도 성남시 분당구 삼평동 629 대왕판교로 645번길 12 8층 R14 (판교 공공지원센터 경기문화창조 허브)</p>
					<p>Contact Us : macro0630@gmail.com</p>
					<p>Copyright (c) 2014 www.m2block.com All Rights Reserved.</p>
				</section>
			</div>
		</footer>
	</div>