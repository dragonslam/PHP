// selectbox
function fn_SelectLabel() {
	$(".select_wrap select").change(function() {		
        $(this).prev(".select_label").html($(this).find("option:selected").text());
    });
}
function fn_SignUp() {
	if (typeof $("#pop_register")[0] == 'object' && $("#pop_register")[0] != null) {
		var wrapHeight = $(".wrap").css("height");
		$(".blocker").css("height", wrapHeight);
		$(".pop_wrap").show();
		$(".contents_pop").hide();
		$("#pop_register").show();
	}
}
function fn_FindPw() {
	if (typeof $("#pop_missingpw")[0] == 'object' && $("#pop_missingpw")[0] != null) {
		var wrapHeight = $(".wrap").css("height");
		$(".blocker").css("height", wrapHeight);
		$(".pop_wrap").show();
		$(".contents_pop").hide();
		$("#pop_missingpw").show();
	}
}
function fn_MemberPop(){
	$(".btn_signin").click(function() {
		var wrapHeight = $(".wrap").css("height");
		$(".blocker").css("height", wrapHeight);
		$(".pop_wrap").show();
		$(".contents_pop").hide();
		$("#pop_signin").show();
		$("#pop_signin").find("input[name='login_email']").focus();
	});
	$(".btn_logout").click(function() {
		var m = new com.mad.api.member();
		m.logout(function() {
			fn_CallMessage("SYS_LOGOUT_COMPLATE");
			fn_PageLink('');
		});		
	});	
	$(".btn_register").click(function() {
		fn_SignUp();
	});
	$(".btn_changepw").click(function() {
		var wrapHeight = $(".wrap").css("height");
		$(".blocker").css("height", wrapHeight);
		$(".pop_wrap").show();
		$(".contents_pop").hide();
		$("#pop_changepw").show();
	});
	$(".btn_missingpw").click(function() {
		fn_FindPw();		
	});
	$(".btn_close a").click(function() {
		$(this).parent().parent().parent().hide();
		$(".pop_wrap").hide();
	});
	if (typeof ($("#pop_signin")[0]) == 'object') 
	{
		$("#pop_signin").find("a[href='#login']").click(function(e) {
			var m = new com.mad.api.member();
			m.login(
				  $("#pop_signin").find("input[name='login_email']")
				, $("#pop_signin").find("input[name='login_pwd']")
				, function() {
					fn_CallMessage("SYS_LOGIN_COMPLATE");
					//$(".btn_close a").click();
					//fn_LoginViewHandler();
					//$("#pop_signin").find("input[name='login_email']").val('');
					//$("#pop_signin").find("input[name='login_pwd']").val('');

					fn_PageLink('tracking1');	// 나의 트레킹 페이지로 이동
				}
				, function(err) {
					if (!String(err).isEmpty()) {
						if (err.equals('3'))  {
							fn_CallMessage("SYS_LOGIN_ERROR_PW");
						}
						else {
							fn_CallMessage("SYS_LOGIN_ERROR");
						}
					}
				}
			);
		});
		$("#pop_signin").find("input[name='login_email']").keydown(function(e) {
			e = e ? e : event;
			if (e.keyCode == 13 && String($(this).val()).isEmail()) {
				$("#pop_signin").find("input[name='login_pwd']").focus();
			}
		});
		$("#pop_signin").find("input[name='login_pwd']").keydown(function(e) {
			e = e ? e : event;
			if (e.keyCode == 13) {
				$("#pop_signin").find("a[href='#login']").click(); return;
			}
		});
		$("#pop_signin").find("a[href='#find_pw']").click(function(e) {
			fn_FindPw(); return;
		});
		$("#pop_signin").find("a[href='#register']").click(function(e) {
			fn_SignUp();
		});
	}
	if (typeof ($("#pop_register")[0]) == 'object') 
	{
		$("#pop_register").find("a[href='#register']").click(function() {
			var m = new com.mad.api.member();
			m.register(
				  $("#pop_register").find("input[name='regist_email']")
				, $("#pop_register").find("input[name='regist_pw1']")
				, $("#pop_register").find("input[name='regist_pw2']")
				, function() {
					fn_CallMessage("SYS_MEMBER_REG_SUCCESS");					
					fn_LoginViewHandler();
					$("#pop_register").find("input[name='regist_email']").val('');
					$("#pop_register").find("input[name='regist_pw1']").val('');
					$("#pop_register").find("input[name='regist_pw2']").val('');
					$(".btn_close a").click();
				}
			);
		});
		$("#pop_register").find("a[href='#terms1']").bind('click', function() {
			fn_PageLink('terms1');
		});
		$("#pop_register").find("a[href='#terms2']").bind('click', function() {
			fn_PageLink('terms2');
		});
	}
	if (typeof ($("#pop_changepw")[0]) == 'object') 
	{
		$("#pop_changepw").find("a[href='#changepw']").bind('click', function() {
			var m = new com.mad.api.member();
			m.change_password(
				  $("#pop_changepw").find("input[name='pw_origin']")
				, $("#pop_changepw").find("input[name='pw_new1']")
				, $("#pop_changepw").find("input[name='pw_new2']")
				, function() {
					fn_CallMessage("SYS_MEMBER_PWC_SUCCESS");					
					fn_LoginViewHandler();
					$("#pop_changepw").find("input[name='pw_origin']").val('');
					$("#pop_changepw").find("input[name='pw_new1']").val('');
					$("#pop_changepw").find("input[name='pw_new2']").val('');
					$(".btn_close a").click();
				}
			);
		});
	}
	if (typeof ($("#pop_missingpw")[0]) == 'object') 
	{
		$("#pop_missingpw").find("a[href='#missingpw']").click(function() {
			var m = new com.mad.api.member();
			m.missing_password(
				  $("#pop_missingpw").find("input[name='missing_email']")
				, function() {
					fn_CallMessage("SYS_MEMBER_PWC_FIND");					
					fn_LoginViewHandler();
					$("#pop_missingpw").find("input[name='missing_email']").val('');
					$(".btn_close a").click();
				}
			);
		});
	}
}

function fn_LoginViewHandler() {
	if (Cookie().get('isLogin') == 'true') {
		$(".btn_signin").hide();
		$(".btn_register").hide();
		$(".btn_logout").show();
		$(".btn_changepw").show();
		$("#mad_login_msg").html("["+ Cookie().get('user_mail') +"] "+ fn_GetMessage("SYS_WELCOME"));
		$("#mad_login_msg_l").html("["+ Cookie().get('user_mail') +"]<br>"+ fn_GetMessage("SYS_WELCOME"));
	}
	else {
		$(".btn_logout").hide();
		$(".btn_changepw").hide();
		$(".btn_signin").show();
		$(".btn_register").show();
		$("#mad_login_msg").html(fn_GetMessage("SYS_TITLE") +" "+ fn_GetMessage("SYS_WELCOME"));
		$("#mad_login_msg_l").html(fn_GetMessage("SYS_TITLE") +" "+ fn_GetMessage("SYS_WELCOME"));
	}
}
function fn_PageLink(q) {
	var L	= document.location;
	var Q = q ? q : (_Query.q ? _Query.q : '');
	if (String(window._DomainType).isEmpty() || String(window._DomainID).isEmpty())
		document.location.replace(L.protocol +"//" + L.host + L.pathname +"?q="+Q);
	else
		document.location.replace(L.protocol +"//" + L.host + L.pathname +"?q="+Q+"&t="+ _DomainType +"&d="+ _DomainID);
}
function fn_CallMessage(id, tp) {
	if (window.$Message instanceof com.mad.message.hendler) {		
		return window.$Message.call((String(id).isEmpty() ? '' : id), (String(tp).isEmpty() ? '' : tp));
	}
}
function fn_GetMessage(id, tp) {
	if (window.$Message instanceof com.mad.message.hendler) {		
		return window.$Message.get((String(id).isEmpty() ? '' : id), (String(tp).isEmpty() ? '' : tp));
	}
	return '';
}
function fn_GetHtmlMessage(id) {
	return "<div style='padding:20px;color:#6e84be;'>"+fn_GetMessage(id)+"</div>";
}
function fn_CopyText(o) {
	if (typeof o[0] != 'object') return;
	if (window.clipboardData) {		
		window.clipboardData.setData('Text',o.text());
		fn_CallMessage("SYS_CLIPBOARD_COPY");
	} 
	else {
		o.zclip({
			path:resource_root+'/js/plugin.zclip/ZeroClipboard.swf',
			copy:function(){
				return o.text();
			}
		});	
	}
}

$(document).ready(function(){
	fn_LoginViewHandler();		
	fn_MemberPop();	
	fn_SelectLabel();	

	var oTrackingwrap	= $(".hs2_tracking").find(".select_wrap");
	var oTrackingLable	= $(".hs2_tracking").find(".select_label");
	var oTrackingSelect	= $(".hs2_tracking").find("select");

	if (typeof (oTrackingSelect[0]) == 'object') 
	{
		var oTracking = new com.mad.api.tracking(oTrackingSelect);
		
		window._DomainObj		= oTrackingSelect;
		window._DomainID		= (String(_DomainID).isEmpty() ? _DomainObj.val() : _DomainID);
		window._DomainType	= (String(_DomainType).isEmpty() ? 's' : _DomainType);
		window._DomainObj.change(function() {
			_DomainID = $(this).val();
			
			// 현재 페이지 재 호출
			fn_PageLink();
			/*
			// Tracking ID를 변경하면은 페이지를 갱신한다.
			if (typeof _DomainCaller == 'function') {
				_DomainCaller(_DomainID);
			}
			*/
		});

		$(".hs2_tracking").find(".blt_1").click(function() {
			oTracking.bindSocialTracking(function() { 
				if (window._DomainType === 's') {
					window._DomainObj.val(window._DomainID);
				}
				oTrackingLable.html(oTrackingSelect.find("option:selected").text());
				oTrackingwrap.removeClass("social").removeClass("event").addClass("social");

				window._DomainType= "s";
				window._DomainID	= window._DomainObj.val();
			});
		}).css('cursor', 'pointer');

		$(".hs2_tracking").find(".blt_2").click(function() {
			oTracking.bindEventTracking(function() { 
				if (window._DomainType === 'e') {
					window._DomainObj.val(window._DomainID);
				}

				oTrackingLable.html(oTrackingSelect.find("option:selected").text());
				oTrackingwrap.removeClass("social").removeClass("event").addClass("event");

				window._DomainType= "e";
				window._DomainID	= window._DomainObj.val();
			});
		}).css('cursor', 'pointer');

		if (window._DomainType === 's') {
			$(".hs2_tracking").find(".blt_1").click(); return;
		} else {
			$(".hs2_tracking").find(".blt_2").click(); return;
		}
	}
});