/* common.api.js - MAD Interface common.
 	writ by yi seung-yong(dragonslam@nate.com)
 	date, 2014/09/23
*/
if (typeof com == 'undefined') var com = {};
if (typeof com.mad == 'undefined') com.mad = {};
if (typeof com.mad.api == 'undefined') com.mad.api = {};

/** ****************************************************************************
	API Common
**/
com.mad.api.API_ROOT	= document.location.protocol + "//"+ document.location.hostname +"/api/mad";
com.mad.api.common	= function() {
	this.msg = new com.mad.message.hendler("API");
};
com.mad.api.common.prototype = {
	logging : function(msg) {
		$debug("com.mad.api.common : "+ msg);
	},
	validation : function(type, o, mid) {
		if (typeof o[0] != 'object') {
			this.logging("Validation Object not found.");
			return false;
		}
		if (type == 'EMPTY') {
			if (String(o.val()).isEmpty()) {
				if (typeof mid == 'string' && mid != ''){
					this.msg.call(mid);
				}				
				o.val('').focus(); 
				return false;
			}
		}
		else if (type == 'EMAIL') {
			if (String(o.val()).isEmpty()) {
				this.msg.call("LOGIN_EMPTY_EMAIL");
				o.val('').focus();
				return false;
			}
			if (!String(o.val()).isEmail()) {
				this.msg.call("LOGIN_NONE_VALID_EMAIL");
				o.val('').focus();
				return false;
			}
		}
		else if (type == "PASSWORD") {			
			if (String(o.val()).isEmpty()) {
				this.msg.call("LOGIN_EMPTY_PASSWORD");
				o.val('').focus();
				return false;
			}
			if (String(o.val()).length < 6) {
				this.msg.call("LOGIN_NONE_VALID_PWD");
				o.val('').focus();
				return false;
			}
		}
		else if (type == "URL") {			
			if (String(o.val()).isEmpty()) {
				this.msg.call("SYS_EMPTY_URL");
				o.val('http://').focus();
				return false;
			}
			if (!String(o.val()).isUrl() || String(o.val()).length < 10) {
				this.msg.call("SYS_NVALID_URL");
				o.focus();
				return false;
			}
		}

		return true;
	},
	getDomain : function(url) {
		return url.match(/http[s]*:\/\/([a-zA-Z0-9\-\.]*)/)[0];
	},
	getUserID : function() {
		return Cookie().get('usr_num');
	},
	chkLogin : function() {
		if (Cookie().get('isLogin') != 'true' || Cookie().get('usr_num').isEmpty()) {
			this.msg.call("SYS_LOGIN_SERVICE");
			return false;
		}
		return true;
	},
	send : function(url, params, callback, isCache) {
		var This = this;
		This.logging("send('"+ url +"');");
		if (String(url).isEmpty()) {
			This.logging("url argument exception.");
			throw new Error("url argument exception.");
		}
		
		var _isCache		= (typeof isCache == 'boolean' && isCache == true);
		var _cacheObj		= null;
		var _cacheKey		= '';
		var _cacheData	= '';
		if (_isCache) {
			_cacheObj	= Cache('cache');
			_cacheKey	= String(url).replaceAll("/", "").replaceAll(".php", "") + "@" + JSONtoString(params);
			_cacheData	=_cacheObj.get(_cacheKey);
		}
		if (_cacheData != '') {
			if (typeof callback == 'function') {
				callback($.parseJSON(_cacheData));
			}
		} 
		else {
			$.ajax({
				  type : "post"
				, url : com.mad.api.API_ROOT + url
				, async : true			
				, dataType : (_isCache ? "text" : "json") 			
				, timeout : 2000
				, cache : false
				, data : (typeof params == 'object' ? params : {q:""})
				, contentType: "application/x-www-form-urlencoded; charset=UTF-8"
				, error : function(request, status, error) {
					This.logging("Ajax Error code : " + request.status + "\r\nmessage : " + request.reponseText);
					throw new Error(request.reponseText);				
				}
				, success : function(response, status, request) {
					This.logging("Ajax Success code : " + request.status + "\r\nmessage : " + request.statusText);
					
					if (_isCache) {
						_cacheObj.set(_cacheKey, response);
						if (typeof callback == 'function') {
							callback($.parseJSON(response));
						}
					}
					else {
						if (typeof callback == 'function') {
							callback(response);
						}
					}
				}			
			});
		}		
	}
};



/** ****************************************************************************
	Member API 
**/
com.mad.api.member		= function() {
	this.common	= new com.mad.api.common();
	this.msg			= new com.mad.message.hendler("MEMBER");
};
com.mad.api.member.API_Login			= "/login.php";
com.mad.api.member.API_Register		= "/register.php";
com.mad.api.member.API_Find_PW		= "/forgot_passwd.php";
com.mad.api.member.API_Change_PW	= "/change_passwd.php";
com.mad.api.member.prototype = {
	logging : function(msg) {
		$debug("com.mad.api.member : "+ msg);
	},
	register : function(oMail, oPW1, oPW2, callback) {
		var This = this;
		This.logging("register();");		
		if (typeof oMail[0] != 'object' || typeof oPW1[0] != 'object' || typeof oPW2[0] != 'object') {
			this.logging("Regist Object not found.");
			return;
		}

		if (!This.common.validation("EMAIL", oMail))	return;
		if (!This.common.validation("PASSWORD", oPW1))		return;
		if (oPW1.val() != oPW2.val()) {
			this.msg.call("LOGIN_NONE_COMP_PWD");
			return;
		}

		This.common.send(com.mad.api.member.API_Register
			, {email:oMail.val(),passwd:oPW1.val(),locale:'KR'}
			, function(r) {
				if (String(r.err).equals('0') && !String(r.ret).isEmpty()) {
					This.logging("regist complate.");					
					if (typeof callback == 'function') {
						callback();
					}
				}
				else {
					This.logging("regist error - "+String(r.err));
				}				
			}
		);
	},
	login : function(oMail, oPW, success, error) {
		var This = this;
		This.logging("login();");		
		if (typeof oMail[0] != 'object' || typeof oPW[0] != 'object') {
			this.logging("Login Object not found.");
			return;
		}

		if (!This.common.validation("EMAIL", oMail))	return;
		if (!This.common.validation("PASSWORD", oPW))		return;
		
		This.common.send(com.mad.api.member.API_Login
			, {email:oMail.val(),passwd:oPW.val()}
			, function(r) {
				if (String(r.err).equals('0') && !String(r.ret).isEmpty()) {
					This.logging("login complate.");
					This.loginComplate(String(oMail.val()), String(r.ret));
					if (typeof success == 'function') {
						success();
					}
				}
				else {
					This.logging("login error - "+String(r.err));
					if (typeof error == 'function') {
						error(String(r.err));
					}
				}				
			}
		);
	},
	loginComplate : function(mail, srz) {
		Cookie(1).set("isLogin", "true").set("user_mail", mail).set("usr_num",srz);
	},
	logout : function(callback) {
		Cookie(0).remove("isLogin", "").remove("user_mail").remove("usr_num");
		if (typeof callback == 'function') {
			callback();
		}
	},	
	change_password : function(oPW, oPW1, oPW2, callback) {		
		var This = this;
		This.logging("change password();");		
		if (typeof oPW[0] != 'object' || typeof oPW1[0] != 'object' || typeof oPW2[0] != 'object') {
			this.logging("Regist Object not found.");
			return;
		}

		if (!This.common.chkLogin())	return;
		if (!This.common.validation("PASSWORD", oPW))	return;
		if (!This.common.validation("PASSWORD", oPW1))	return;
		if (oPW1.val() != oPW2.val()) {
			alert("변경하려는 비밀번호가 일치하지 않습니다.");
			return;
		}

		This.common.send(com.mad.api.member.API_Change_PW
			, {user_id:This.common.getUserID(),passwd:oPW.val(),new_passwd1:oPW1.val(),new_passwd2:oPW2.val()}
			, function(r) {
				if (String(r.err).equals('0') && !String(r.ret).isEmpty()) {
					This.logging("change password complate.");					
					if (typeof callback == 'function') {
						callback();
					}
				}
				else {
					This.logging("regist error - "+String(r.err));
				}				
			}
		);
	},
	missing_password : function(oMail, callback) {
		var This = this;
		This.logging("missing password();");		
		if (typeof oMail[0] != 'object') {
			this.logging("Email Object not found.");
			return;
		}

		if (!This.common.validation("EMAIL", oMail))	return;

		This.common.send(com.mad.api.member.API_Find_PW
			, {email:oMail.val()}
			, function(r) {
				if (String(r.err).equals('0') && !String(r.ret).isEmpty()) {
					This.logging("email regist complate.");					
					if (typeof callback == 'function') {
						callback();
					}
				}
				else {
					This.logging("regist error - "+String(r.err));
				}				
			}
		);
	}
};



/** ****************************************************************************
	Tracking API 
**/
com.mad.api.tracking	= function(objSelect) {
	this.common	= new com.mad.api.common();
	this.msg			= new com.mad.message.hendler("TRACKING");

	this.oSelect		= (typeof objSelect == 'object') ? objSelect : '';
};
com.mad.api.tracking.API_GET_LIST		= "/get_tracking_list.php";		// 등록된 도메인 리스트 가져오기
com.mad.api.tracking.API_GET_EVENT		= "/get_tracking_event.php";
com.mad.api.tracking.API_GET_SOCIAL		= "/get_tracking_social.php";
com.mad.api.tracking.API_SET_EVENT		= "/set_tracking_event.php";
com.mad.api.tracking.API_SET_SOCIAL		= "/set_tracking_social.php";
com.mad.api.tracking.API_DEL_EVENT		= "/delete_tracking_event.php";
com.mad.api.tracking.API_DEL_SOCIAL		= "/delete_tracking_social.php";
com.mad.api.tracking.Category				= {0:'패션', 1:'뷰티', 2:'쇼핑', 3:'뉴스', 4:'음식/외식', 5:'스포츠', 6:'취미/레져', 7:'엔터테인먼트', 8:'게임', 9:'여행', 10:'교육', 11:'비즈니스', 12:'음악', 13:'애견'};
com.mad.api.tracking.prototype = {
	logging : function(msg) {
		$debug("com.mad.api.tracking : "+ msg);
	},
	getList : function() {
		//	API_GET_LIST
	},
	getEvent : function(rowCnt, lastDate, callback) {
		// API_GET_EVENT
		var This = this;
		This.logging("getEvent();");

		rowCnt	= String(rowCnt).isEmpty() ? "30" : rowCnt;
		lastDate	= String(lastDate).isEmpty() ? "0" : lastDate;

		This.common.send(com.mad.api.tracking.API_GET_EVENT
			, {user_id:This.common.getUserID() , row_cnt:rowCnt, last_date:lastDate}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getEvent complate. size of "+String(r.cnt));					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getEvent - "+String(r.err));
				}				
			}
			, true
		);
	},
	setEvent : function(oUrl, callback) {
		// API_SET_EVENT
		var This = this;
		This.logging("setEvent();");

		if (typeof oUrl[0] != 'object') {
			this.logging("Event URL Object not found.");
			return;
		}
		
		var url = String(oUrl.val());
		if (!url.startWith('http://') && !url.startWith('https://')) {
			oUrl.val('http://'+ url);
		}

		if (!This.common.validation("URL", oUrl))	return;
		if (!This.common.validation("EMPTY", This.oSelect, "SYS_EMPTY_EVENT_CART"))	return;

		This.common.send(com.mad.api.tracking.API_SET_EVENT
			, {user_id:This.common.getUserID() , domain:This.common.getDomain(oUrl.val()), url:oUrl.val(), category:This.oSelect.val()}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("setEvent complate. ");				
					if (typeof callback == 'function') {
						callback(r);
					}
					Cache('cache').clear();
				}
				else {
					This.logging("setEvent - "+String(r.err));
				}				
			}
		);
	},
	delEvent : function(key, success, error) {
		// API_DEL_EVENT
		var This = this;
		This.logging("delEvent();");

		if (typeof key != 'string' || String(key).isEmpty()) {
			this.logging("Event Domain ID not found.");
			return;
		}

		This.common.send(com.mad.api.tracking.API_DEL_EVENT
			, {user_id:This.common.getUserID() , domain_id:key}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("delEvent complate. ");				
					if (typeof success == 'function') {
						success(r);
					}
					Cache('cache').clear();
				}
				else {
					This.logging("delEvent - "+String(r.err));
					if (typeof error == 'function') {
						error(r);
					}
				}				
			}
		);
	},

	getSocial : function(rowCnt, lastDate, callback) {
		// API_GET_SOCIAL
		var This = this;
		This.logging("getSocial();");

		rowCnt	= String(rowCnt).isEmpty() ? "30" : rowCnt;
		lastDate	= String(lastDate).isEmpty() ? "0" : lastDate;

		This.common.send(com.mad.api.tracking.API_GET_SOCIAL
			, {user_id:This.common.getUserID() , row_cnt:rowCnt, last_date:lastDate}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getSocial complate. size of "+String(r.cnt));					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getSocial - "+String(r.err));
				}				
			}
			, true			
		);
	},
	setSocial : function(oUrl, callback) {
		// API_SET_SOCIAL
		var This = this;
		This.logging("setEvent();");

		if (typeof oUrl[0] != 'object') {
			this.logging("Event URL Object not found.");
			return;
		}

		var url = String(oUrl.val());
		if (!url.startWith('http://') && !url.startWith('https://')) {
			oUrl.val('http://'+ url);
		}

		if (!This.common.validation("URL", oUrl))	return;
		if (!This.common.validation("EMPTY", This.oSelect, "SYS_EMPTY_EVENT_CART"))	return;

		This.common.send(com.mad.api.tracking.API_SET_SOCIAL
			, {user_id:This.common.getUserID() , domain:This.common.getDomain(oUrl.val()), url:oUrl.val(), category:This.oSelect.val()}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("setEvent complate. ");
					if (typeof callback == 'function') {
						callback(r);
					}
					Cache('cache').clear();
				}
				else {
					This.logging("setEvent - "+String(r.err));
				}				
			}			
		);
	},
	delSocial : function(key, success, error) {
		// API_DEL_SOCIAL
		var This = this;
		This.logging("delSocial();");

		if (typeof key != 'string' || String(key).isEmpty()) {
			this.logging("Social Domain ID not found.");
			return;
		}

		This.common.send(com.mad.api.tracking.API_DEL_SOCIAL
			, {user_id:This.common.getUserID() , domain_id:key}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("delSocial complate. ");				
					if (typeof success == 'function') {
						success(r);
					}
					Cache('cache').clear();
				}
				else {
					This.logging("delSocial - "+String(r.err));
					if (typeof error == 'function') {
						error(r);
					}
				}				
			}
		);
	},	

	getTrackingCartgoryName : function(key) {
		var obj = com.mad.api.tracking.Category;
		if (obj && obj[key]) {
			return obj[key];
		}
		else {
			return '';
		}
	},
	bindTrackingCategory : function(callback) {
		var This = this;
		This.logging("bindTrackingCategory();");

		if ((typeof This.oSelect == 'object')) {
			This.oSelect.empty();
			
			var obj = com.mad.api.tracking.Category;
			for (var attr in obj) {
				if (obj.hasOwnProperty(attr)) 
					This.oSelect.append("<option value='"+ attr +"'>"+ obj[attr] +"</option>");
			}

			if (typeof callback == 'function') {
				callback();
			}
		}
	},
	bindEventTracking : function(callback) {		
		var This = this;
		This.logging("bindEventTracking();");

		if ((typeof This.oSelect == 'object')) {
			This.getEvent('', '', function(list) {
				This.oSelect.empty();
				if (list.cnt > 0) {
					for (var i = 0; i < list.ret.length; i++)
					{
						var item = list.ret[i];
						This.oSelect.append("<option value='"+ item.domain_id +"'>"+ item.url +"</option>");
					}
				}
				else {
					This.oSelect.append("<option value=''>"+ This.msg.get("TRACK_EMPTY_DATA") +"</option>");
				}
				if (typeof callback == 'function') {
					callback();
				}
			});
		}		
	},
	bindSocialTracking : function(callback) {		
		var This = this;
		This.logging("bindSocialTracking();");

		if ((typeof This.oSelect == 'object')) {
			This.getSocial('', '', function(list) {
				This.oSelect.empty();
				if (list.cnt > 0) {
					for (var i = 0; i < list.ret.length; i++)
					{
						var item = list.ret[i];
						This.oSelect.append("<option value='"+ item.domain_id +"'>"+ item.domain +"</option>");
					}
				}
				else {
					This.oSelect.append("<option value=''>"+ This.msg.get("TRACK_EMPTY_DATA") +"</option>");
				}
				if (typeof callback == 'function') {
					callback();
				}
			});
		}		
	}
};



/** ****************************************************************************
	Statistics API 
**/
com.mad.api.statistics	= function(oDomain, oDelegate) {
	this.common	= new com.mad.api.common();
	this.domain		= (typeof oDomain == 'object' && oDomain != null) ? oDomain : null;
	this.delegate	= oDelegate;
};
com.mad.api.statistics.API_GET_ITEM_URL					= "/get_item_url.php";						// item_id 값으로 URL 값 가져오는 API
com.mad.api.statistics.API_GET_HOUR							= "/get_statistics_hour.php";				// 시간별 데이터
com.mad.api.statistics.API_GET_DAY							= "/get_statistics_day.php";				// 요일별 데이터
com.mad.api.statistics.API_GET_DAILY							= "/get_statistics_daily.php";				// 일마다 통계 보여주는 그래프 정보
com.mad.api.statistics.API_GET_MONTH						= "/get_statistics_month.php";			// 달마다 통계 보여주는 그래프 정보
com.mad.api.statistics.API_GET_VISITOR						= "/get_statistics_visitor.php";			// 월별 방문자 데이터
com.mad.api.statistics.API_GET_VISITOR_DAILY			= "/get_statistics_visitor_daily.php";	// 월별 방문자 데이터. 일별
com.mad.api.statistics.API_GET_PATH							= "/get_statistics_path.php";				// 유입경로 분석 데이터
com.mad.api.statistics.API_GET_CURRENT						= "/get_statistics_current.php";							// 최근 한달간 통계 데이터 
com.mad.api.statistics.API_GET_CURRENT_SOCIAL			= "/get_statistics_current_social.php";					// 최근 한달간 소셜미디어 데이터
com.mad.api.statistics.API_GET_CURRENT_ITEM				= "/get_statistics_current_item.php";					// 항목별 상세 리스트 - 콘텐츠 리스트
com.mad.api.statistics.API_GET_CURRENT_SHARE			= "/get_statistics_current_share.php";					// 항목별 상세 리스트 - 공유 리스트
com.mad.api.statistics.API_GET_CURRENT_VIEW			= "/get_statistics_current_view.php";					// 항목별 상세 리스트 - 유입 리스트
com.mad.api.statistics.API_GET_CURRENT_VIEW_D			= "/get_statistics_current_view_by_like.php";		// 공유 상세 리스트 에서 유입자 수 선택하면 나오는 유입자리스트
com.mad.api.statistics.API_GET_CURRENT_TRAFFIC		= "/get_statistics_current_traffic.php";				// 최근 한달간 공유, 유입, SNS 결과
com.mad.api.statistics.API_GET_LAST_MONTH_SHARE		= "/get_statistics_last_month_share.php";			// 전달 상세 전파 데이터 리스트
com.mad.api.statistics.API_GET_LAST_MONTH_VIEW		= "/get_statistics_last_month_view.php";				// 전달 상세 유입 데이터 리스트
com.mad.api.statistics.API_GET_LAST_MONTH_VIEW_D	= "/get_statistics_last_month_view_by_like.php";	// 전파에 해당하는 각 유입 데이터 리스트
com.mad.api.statistics.prototype = {
	logging : function(msg) {
		$debug("com.mad.api.statistics : "+ msg);
	},
	getDomainID : function() {
		return this.domain.val();
	},
	getMaxValue : function(obj) {
		if (obj instanceof Object) {
			var result = 0;
			for (var attr in obj) {
				if (obj.hasOwnProperty(attr)) {
					if (String(obj[attr]).isNumber() && obj[attr] > result) {
						result = obj[attr];
					}
				}
			}
			return result;
		}
		return 0;
	},
	getItemUrl : function(callback) {
		// API_GET_ITEM_URL	
	},
	getHour : function(callback) {
		// API_GET_HOUR
		var This = this;
		This.logging("getHour();");
		This.common.send(com.mad.api.statistics.API_GET_HOUR
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID()}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getHour complate. ");					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getHour - "+String(r.err));
				}				
			}
			, true			
		);
	},
	getDaily : function(callback) {
		// API_GET_DAILY	
		var This = this;
		This.logging("getDaily();");
		This.common.send(com.mad.api.statistics.API_GET_DAILY
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID()}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getDaily complate. ");					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getDaily - "+String(r.err));
				}				
			}
			, true			
		);
	},
	getMonth : function(callback) {
		// API_GET_MONTH	
		var This = this;
		This.logging("getMonth();");
		This.common.send(com.mad.api.statistics.API_GET_MONTH
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID()}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getMonth complate. ");					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getMonth - "+String(r.err));
				}				
			}
			, true			
		);
	},	
	getDay : function(callback) {
		// API_GET_DAY	
		var This = this;
		This.logging("getDay();");
		This.common.send(com.mad.api.statistics.API_GET_DAY
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID()}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getDay complate. ");					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getDay - "+String(r.err));
				}				
			}
			, true			
		);
	},
	getCurrent : function(callback) {
		// API_GET_CURRENT
		var This = this;
		This.logging("getCurrent();");
		This.common.send(com.mad.api.statistics.API_GET_CURRENT
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID()}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getCurrent complate. ");					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getCurrent - "+String(r.err));
				}				
			}
			, true			
		);
	},
	getCurrentSocial : function(callback) {
		// API_GET_CURRENT_SOCIAL	
		var This = this;
		This.logging("getCurrentSocial();");
		This.common.send(com.mad.api.statistics.API_GET_CURRENT_SOCIAL
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID()}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getCurrentSocial complate. ");					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getCurrentSocial - "+String(r.err));
				}				
			}
			, true			
		);
	},
	getCurrentItem : function(rowcnt, offset, sort, callback) {
		// API_GET_CURRENT_ITEM
		var This = this;
		rowcnt= rowcnt ? rowcnt : 20;
		offset	 = offset ? offset : 0;
		sort	 = sort ? sort : 0;

		This.logging("getCurrentItem("+rowcnt+","+offset +","+ sort +");");
		This.common.send(com.mad.api.statistics.API_GET_CURRENT_ITEM
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID(), row_cnt:rowcnt ,offset:(rowcnt*offset) ,sort_type:sort}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getCurrentItem complate. ");					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getCurrentItem - "+String(r.err));
				}				
			}
			, true			
		);
	},
	getCurrentShare : function(rowcnt, offset, sort, callback) {
		// API_GET_CURRENT_SHARE
		var This = this;
		rowcnt= rowcnt ? rowcnt : 10;
		offset	 = offset ? offset : 0;
		sort	 = sort ? sort : 0;

		This.logging("getCurrentShare("+rowcnt+","+offset +","+ sort +");");
		This.common.send(com.mad.api.statistics.API_GET_CURRENT_SHARE
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID(), row_cnt:rowcnt ,offset:(rowcnt*offset) ,sort_type:sort}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getCurrentShare complate. ");					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getCurrentShare - "+String(r.err));
				}				
			}
			, true			
		);
	},
	getCurrentView : function(rowcnt, offset, sort, callback) {
		// API_GET_CURRENT_VIEW
		var This = this;
		rowcnt= rowcnt ? rowcnt : 10;
		offset	 = offset ? offset : 0;
		sort	 = sort ? sort : 0;

		This.logging("getCurrentView("+rowcnt+","+offset +","+ sort +");");
		This.common.send(com.mad.api.statistics.API_GET_CURRENT_VIEW
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID(), row_cnt:rowcnt ,offset:(rowcnt*offset) ,sort_type:sort}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getCurrentView complate. ");					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getCurrentView - "+String(r.err));
				}				
			}
			, true			
		);
	},
	getCurrentViewDetail : function(callback) {
		// API_GET_CURRENT_VIEW_D	
	},
	getCurrentTraffic : function(callback) {
		// API_GET_CURRENT_TRAFFIC	
		var This = this;
		This.logging("getCurrentTraffic();");
		This.common.send(com.mad.api.statistics.API_GET_CURRENT_TRAFFIC
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID()}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getCurrentTraffic complate. ");					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getCurrentTraffic - "+String(r.err));
				}				
			}
			, true			
		);
	},
	getLastMonthShare : function(rowcnt, offset, sort, callback) {
		// API_GET_LAST_MONTH_SHARE	
		var This = this;
		rowcnt= rowcnt ? rowcnt : 10;
		offset	 = offset ? offset : 0;
		sort	 = sort ? sort : 0;

		This.logging("getLastMonthShare("+rowcnt+","+offset +","+ sort +");");
		This.common.send(com.mad.api.statistics.API_GET_LAST_MONTH_SHARE
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID(), row_cnt:rowcnt ,offset:(rowcnt*offset) ,sort_type:sort}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getLastMonthShare complate. ");					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getLastMonthShare - "+String(r.err));
				}				
			}
			, true			
		);
	},
	getLastMonthView : function(rowcnt, offset, sort, callback) {
		// API_GET_LAST_MONTH_VIEW	
		var This = this;
		rowcnt= rowcnt ? rowcnt : 10;
		offset	 = offset ? offset : 0;
		sort	 = sort ? sort : 0;

		This.logging("getLastMonthView("+rowcnt+","+offset +","+ sort +");");
		This.common.send(com.mad.api.statistics.API_GET_LAST_MONTH_VIEW
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID(), row_cnt:rowcnt ,offset:(rowcnt*offset) ,sort_type:sort}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getLastMonthView complate. ");					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getLastMonthView - "+String(r.err));
				}				
			}
			, true			
		);
	},
	getLastMonthViewDetail : function(rowcnt, offset, sort, callback) {
		// API_GET_LAST_MONTH_VIEW_D	
		var This = this;
		rowcnt= rowcnt ? rowcnt : 10;
		offset	 = offset ? offset : 0;
		sort	 = sort ? sort : 0;

		This.logging("getLastMonthViewDetail("+rowcnt+","+offset +","+ sort +");");
		This.common.send(com.mad.api.statistics.API_GET_LAST_MONTH_VIEW_D
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID(), row_cnt:rowcnt ,offset:(rowcnt*offset) ,sort_type:sort}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getLastMonthViewDetail complate. ");					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getLastMonthViewDetail - "+String(r.err));
				}				
			}
			, true			
		);
	},
	getVisitor : function(callback) {
		// API_GET_VISITOR
		var This = this;
		This.logging("getVisitor();");
		This.common.send(com.mad.api.statistics.API_GET_VISITOR
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID()}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getVisitor complate. ");					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getVisitor - "+String(r.err));
				}				
			}
			, true			
		);
	},
	getVisitorDaily : function(callback) {
		// API_GET_VISITOR_DAILY
		var This = this;
		This.logging("getVisitorDaily();");
		This.common.send(com.mad.api.statistics.API_GET_VISITOR_DAILY
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID()}
			, function(r) {
				if (String(r.err).equals('0')) {
					This.logging("getVisitorDaily complate. ");					
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getVisitorDaily - "+String(r.err));
				}				
			}
			, true			
		);
	},
	getPath : function(callback) {
		// API_GET_PATH
		var This = this;
		This.logging("getPath();");
		This.common.send(com.mad.api.statistics.API_GET_PATH
			, {user_id:This.common.getUserID() , domain_id:This.getDomainID()}
			, function(r) {
				if (String(r.ret.err).equals('0')) {
					This.logging("getPath complate. ");			
					if (typeof callback == 'function') {
						callback(r);
					}
				}
				else {
					This.logging("getPath - "+String(r.ret.err));
				}				
			}
			, true			
		);
	},
	
		

	bindResult : function(prefix, ret, fix) {
		if (typeof prefix != 'string' || prefix == '') return;
		if (typeof ret != 'object') return;
		
		function $O(s) {
			return document.getElementById(s);
		}

		for(var prop in ret) {
			if (typeof ret[prop] != 'function') {
				var id = prefix + "_" + prop;

				if (typeof $("#"+id)[0] == 'object')
				{
					this.logging("bind data - "+ id);

					$("#"+id).hide('fast');
					if (String(ret[prop]).isFinite()) {
						$("#"+id).text(String(ret[prop]).money() + (fix ? fix : ''));
					}
					else {
						$("#"+id).text(ret[prop] + (fix ? fix : ''));
					}
					$("#"+id).show('slow');
				}
			}
		}
	}
};
