	<div class="pop_wrap">
		<div class="blocker"></div>
		<?php 
			if ($site_isLogin == true) { 
		?>
		<div class="contents_pop" id="pop_changepw">
			<div class="logo"><?php PS_Image("txt_logo_1.png", "MAD")?></div>
			<div class="box_pop">
				<h2 class="t2"><?php PS_Image("txt_box_changepw.png", "CHANGE PW")?></h2>
				<div class="input_wrap">
					<p class="pw_3"><input type="password" name="pw_origin" placeholder="기존 비밀번호를 입력해 주세요"></p>
					<p class="pw_1"><input type="password" name="pw_new1" placeholder="변경하실 비밀번호를 입력해 주세요"></p>
					<p class="pw_2"><input type="password" name="pw_new2" placeholder="비밀번호를 다시 입력해 주세요"></p>
				</div>
				<div class="btn t2 mt_2"><a href="#changepw">변경하기</a></div>
				<div class="btn_close"><a href="#close_pop"><?php PS_Image("btn_box_close.png", "창닫기")?></a></div>
			</div>
		</div><!-- // 비번변경 -->
		
		<?php 
			}
			else {
		?>
		<div class="contents_pop" id="pop_signin">
			<div class="logo"><?php PS_Image("txt_logo_1.png", "MAD")?></div>
			<div class="box_pop">
				<h2 class="t1"><?php PS_Image("txt_box_signin.png", "SIGN IN")?></h2>
				<div class="input_wrap">
					<p class="email_1"><input type="email" placeholder="이메일을 입력하여 주세요" name="login_email" value="<?php if ($site_isDebug) {echo($site_test_id);}?>"></p>
					<p class="pw_1"><input type="password" placeholder="비밀번호를 입력하여 주세요" name="login_pwd"></p>
				</div>
				<nav class="link_wrap t1">
					<ul>
						<li><a href="#find_pw" class="btn_missingpw">비밀번호 찾기</a></li>
						<li><a href="#register" class="btn_register">회원가입</a></li>
					</ul>
				</nav>
				<div class="btn t1"><a href="#login">로그인</a></div>
				<div class="btn_close"><a href="#close_pop"><?php PS_Image("btn_box_close.png", "창닫기")?></a></div>
			</div>
		</div><!-- // 로그인 -->

		<div class="contents_pop" id="pop_missingpw">
			<div class="logo"><?php PS_Image("txt_logo_1.png", "MAD")?></div>
			<div class="box_pop">
				<h2 class="t2"><?php PS_Image("txt_box_missingpw.png", "MISSING PW")?></h2>
				<div class="txt_info">
					MAD 회원가입 시 등록하셨던 이메일을<br>입력하시고 접수해 주시면 임시 비밀번호를<br>등록하신 이메일 계정으로 보내드립니다
				</div>
				<div class="input_wrap">
					<p class="email_2"><input type="email" name='missing_email' placeholder="등록하신 이메일을 입력하여 주세요"></p>
				</div>
				<div class="btn t2 mt_1"><a href="#missingpw">접수하기</a></div>
				<div class="btn_close"><a href="#close_pop"><?php PS_Image("btn_box_close.png", "창닫기")?></a></div>
			</div>
		</div><!-- // 비번분실 -->

		<div class="contents_pop" id="pop_register">
			<div class="logo"><?php PS_Image("txt_logo_1.png", "MAD")?></div>
			<div class="box_pop">
				<h2 class="t3"><?php PS_Image("txt_box_register.png", "REGISTER")?></h2>
				<div class="input_wrap">
					<p class="email_1"><input type="email" name="regist_email" placeholder="이메일을 입력하세요"></p>
					<p class="pw_1"><input type="password" name="regist_pw1" placeholder="비밀번호를 입력하세요"></p>
					<p class="pw_2"><input type="password" name="regist_pw2" placeholder="비밀번호를 한번 더 입력하세요"></p>
				</div>
				<nav class="link_wrap t3">
					<ul>
						<li><a href="#terms1">이용약관</a></li>
						<li><a href="#terms2">개인정보보호정책</a></li>
					</ul>
				</nav>
				<div class="btn t3"><a href="#register">회원가입</a></div>
				<div class="btn_close"><a href="#close_pop"><?php PS_Image("btn_box_close.png", "창닫기")?></a></div>
			</div>
		</div><!-- // 회원가입 -->
	<?php 
		}
	?>	
	</div>