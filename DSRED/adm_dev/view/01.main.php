	<div class ="wrap main">
		<header class="main">
			<section class="hs1">
				<h1><a <?php PS_PageLink(); ?>><?php PS_Image("txt_logo_1.png", "MAD")?></a></h1>
				<nav class="gnb">
					<ul>
						<li><a <?php PS_PageLink("info"); ?>>MAD?</a></li>
						<li><a <?php PS_PageLink("faq"); ?>>FAQ</a></li>
						<?php if ($site_isLogin) { ?>
						<li><a <?php PS_PageLink("tracking1"); ?>>나의 트레킹관리</a></li>
						<?php } ?>
					</ul>
				</nav>
			</section>
			<section class="hs2">
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
				<p class="para_hs1"><span id="mad_login_msg">매드 고객님을 환영합니다.</span></p>
			</section>
		</header>

		<div class="contents main" id="contents">
			<section class="ms1">
				<ul class="slider">
					<li><img src='/mad_new/resource/images/vis_main_1.png' alt='' usemap="#mainMap_1"/></li>
					<li><img src='/mad_new/resource/images/vis_main_2.png' alt='' usemap="#mainMap_2"/></li>
					<li><img src='/mad_new/resource/images/vis_main_3.png' alt='' usemap="#mainMap_3"/></li>
				</ul>
				<map name="mainMap_1">
					<area shape="rect" coords="580,300,750,370" href="javascript:fn_SignUp();" alt="Sign Up">
				</map>
				<map name="mainMap_2">
					<area shape="rect" coords="580,300,750,370" href="javascript:fn_SignUp();" alt="Sign Up">
				</map>
				<map name="mainMap_3">
					<area shape="rect" coords="580,300,750,370" href="javascript:fn_SignUp();" alt="Sign Up">
				</map>
			</section>
			<section class="ms2">
				<ul class="ulist_m1">
					<li>
						<div>
							<p><?php PS_Image("blt_main_1.png", "")?></p>
							<p class="tit">사람과 사람을 이어주는 내 연결고리의 끝은?</p>
							<p class="exp">누가 내 콘텐츠를 보았는지, 그리고 누구에게 전달했는지 <br>알 수 있습니다. 연결고리 길이와 그 끝은 SNS 마케팅 <br>전략수립에 Inspiration을 제공해 줍니다.</p>
							<p class="btn"><a href="index.php?q=info#mad_point1">More Info</a></p>
						</div>
					</li>
					<li>
						<div>
							<p><?php PS_Image("blt_main_2.png", "")?></p>
							<p class="tit">누가 이렇게 많이 소개했을까? 고맙다는 인사라도!</p>
							<p class="exp">내 콘텐츠를 다수에게 전달한 Key person을<br>찾아낼 수 있습니다. Key person에게 감사를 표시하고<br>친밀한 관계를 유지할 수 있습니다.</p>
							<p class="btn"><a href="index.php?q=info#mad_point2">More Info</a></p>
						</div>
					</li>
					<li>
						<div>
							<p><?php PS_Image("blt_main_3.png", "")?></p>
							<p class="tit">나는 Social 마케팅을 잘하고 있겠지?</p>
							<p class="exp">내가 이용하는 Social Channel별 전달효과를<br>비교해 살펴볼 수 있습니다. Channel 별 콘텐츠의 영향력과<br>Key person의 역할을 분석해서 평가해 볼 수 있습니다.</p>
							<p class="btn"><a href="index.php?q=info#mad_point4">More Info</a></p>
						</div>
					</li>
				</ul>
			</section>
		</div>

		<footer class="main">
			<div class="fl">
				<nav class="fnb">
					<ul>
						<li><a href="http://uglyoz6.wix.com/m2block" target="_blank">Company</a></li>
						<li><a href="https://www.facebook.com/madnme?fref=ts" target="_blank"><?php PS_Image("blt_facebook.png", "")?> Facebook</a></li>
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