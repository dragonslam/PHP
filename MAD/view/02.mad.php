	<div class ="wrap">
		<header class="wrap_left">
			<section class="hs1">
				<h1><a <?php PS_PageLink(); ?>><?php PS_Image("txt_logo.png", "MAD")?></a></h1>
				<nav class="tnb">
					<ul>
						<li>
							<a href="#" class="btn_signin"><?php PS_Image("btn_signin.png", "SIGN IN")?></a>
							<a href="#" class="btn_logout" style='display:none;'><?php PS_Image("btn_logout.png", "LOGOUT")?></a>
						</li>
						<li>
							<a href="#" class="btn_register"><?php PS_Image("btn_register.png", "REGISTER")?></a>
							<a href="#" class="btn_changepw" style='display:none;'><?php PS_Image("btn_changepw.png", "CHANGE PW")?></a>
						</li>
					</ul>
				</nav>
				<p class="para_hs1"><span id="mad_login_msg_l">매드 고객님을 환영합니다.</span></p>
			</section>
			<section class="hs2">
			<?php
				if ($site_isLogin == true) {

					// 통계 메뉴 출력
					include "02.mad.menu.php";
				}
			?>			
				<nav class="gnb">
					<ul>
						<li<?php if ($page_id == "info") {echo(" class='on'");}?>><a <?php PS_PageLink("info"); ?>>MAD?</a></li>
						<li<?php if ($page_id == "faq") {echo(" class='on'");}?>><a <?php PS_PageLink("faq"); ?>>FAQ</a></li>
						<li><a href="http://uglyoz6.wix.com/m2block" target="_blank">Company</a></li>
						<li><a href="https://www.facebook.com/madnme?fref=ts" target="_blank"><?php PS_Image("blt_facebook.png", "")?> Facebook</a></li>
						<li<?php if ($page_id == "terms1") {echo(" class='on'");}?>><a <?php PS_PageLink("terms1"); ?>>이용약관</a></li>
						<li<?php if ($page_id == "terms2") {echo(" class='on'");}?>><a <?php PS_PageLink("terms2"); ?>>개인정보 취급방침</a></li>
					</ul>
				</nav>
			</section>
		</header>
		<div class="wrap_right">
			<span class="marker" style="top:<?php echo($page_marker)?>px;"></span>
			<div class="contents" id="contents">
			
				<?php 
					// Sub Page Contents include..
					include $page_name; 
				?>

			</div><!-- // contents -->
			<footer>
				<section class="fs1">
					<p><?php PS_Image("txt_logo_2.png", "M2Block")?></p>
				</section>
				<section class="fs2">
					<p>사업자등록번호 : 113-23-30599</p>
					<p>경기도 성남시 분당구 삼평동 629 대왕판교로 645번길 12 8층 R14 (판교 공공지원센터 경기문화창조 허브)</p>
					<p>Contact Us : macro0630@gmail.com</p>
					<p>Copyright (c) 2014 www.m2block.com All Rights Reserved.</p>
				</section>
			</footer>
		</div><!-- // wrap_right -->
	</div>
