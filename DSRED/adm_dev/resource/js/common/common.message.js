/* common.message.js - Message common.
 	writ by yi seung-yong(dragonslam@nate.com)
 	date, 2015/03/20
*/
if (typeof com == 'undefined') var com = {};
if (typeof com.ds == 'undefined') com.ds = {};
if (typeof com.ds.message == 'undefined') com.ds.message = {};

/** ****************************************************************************
	Message Data
**/
com.ds.message.DATA	= {};
com.ds.message.DATA["SYS_TITLE"]				= {text : "대성"};
com.ds.message.DATA["SYS_WELCOME"]				= {text : "고객님 환영합니다."};
com.ds.message.DATA["SYS_LOGIN_SERVICE"]		= {text : "회원 로그인이 필요한 서비스입니다."};
com.ds.message.DATA["SYS_LOGIN_COMPLATE"]		= {text : "감사합니다.\n\n로그인이 완료 되었습니다."};
com.ds.message.DATA["SYS_LOGIN_ERROR"]			= {text : "로그인을 진행 할 수 없습니다.\n\n다시 시도해 주세요."};
com.ds.message.DATA["SYS_LOGIN_ERROR_PW"]		= {text : "로그인 E-Mail 또는 비밀번호가 일치하지 않습니다."};
com.ds.message.DATA["SYS_LOGOUT_COMPLATE"]		= {text : "감사합니다.\n\n로그아웃 되었습니다."};
com.ds.message.DATA["SYS_MEMBER_REG_SUCCESS"]	= {text : "감사합니다.\n\nMAD 회원 등록이 완료 되었습니다."};
com.ds.message.DATA["SYS_MEMBER_PWC_SUCCESS"]	= {text : "비밀번호 변경이 완료 되었습니다."};
com.ds.message.DATA["SYS_MEMBER_PWC_FIND"]		= {text : "비밀번호 재설정이 완료 되었습니다.\n\n이메일을 확인해 주세요."};

com.ds.message.DATA["SYS_CLIPBOARD_COPY"]		= {text : "클립보드에 정보를 복사하였습니다."};
com.ds.message.DATA["SYS_EMPTY_DATA"]			= {text : "정보가 없습니다."};
com.ds.message.DATA["SYS_EMPTY_URL"]			= {text : "URL 정보가 없습니다."};
com.ds.message.DATA["SYS_NVALID_URL"]			= {text : "URL 형식이 올바르지 않습니다."};
com.ds.message.DATA["SYS_EMPTY_EVENT_CART"]	= {text : "이벤트 카테고리를 선택해 주세요."};
com.ds.message.DATA["SYS_DELETE_CONFIRM"]		= {text : "정말로 삭제하시겠습니까?"};
com.ds.message.DATA["SYS_DELETE_SUCCESS"]		= {text : "삭제가 완료되었습니다."};
com.ds.message.DATA["SYS_DELETE_ERROR"]		= {text : "삭제 실패!\n다시 시도하거나 관리자에게 문의해 주세요. E1007"};

com.ds.message.DATA["LOGIN_EMPTY_EMAIL"]		= {text : "로그인 E-Mail 주소를 등록해 주세요."};
com.ds.message.DATA["LOGIN_EMPTY_PASSWORD"]	= {text : "로그인 비밀번호를 등록해 주세요."};
com.ds.message.DATA["LOGIN_NONE_VALID_EMAIL"]	= {text : "로그인 E-Mail 주소가 올바르지 않습니다."};
com.ds.message.DATA["LOGIN_NONE_VALID_PWD"]	= {text : "로그인 비밀번호는 6자리 이상입니다."};
com.ds.message.DATA["LOGIN_NONE_COMP_PWD"]		= {text : "비밀번호가 일치하지 않습니다."};

com.ds.message.DATA["TRACK_EMPTY_DATA"]		= {text : "등록된 데이터가 없습니다."};

com.ds.message.hendler	= function(type) {
	this.TYPE	= (typeof type == 'string') ? type : 'SYSTEM';
	if (this.TYPE.equals('SYSTEM') && window.$Message instanceof com.ds.message.hendler) {
			return window.$Message;
	}
};
com.ds.message.hendler.prototype = {
	call : function(msgID, type) {
		if (typeof msgID != 'string'  || msgID.isEmpty()) {
			return;
		}

		var t = com.ds.message.DATA[msgID].text;
		if (typeof t == 'string'  && !t.isEmpty()) { 
			alert(t);
		}		
	},
	get : function(msgID, type) {
		if (typeof msgID != 'string'  || msgID.isEmpty()) {
			return '';
		}

		return String(com.ds.message.DATA[msgID].text);
	}
};

window.$Message = new com.ds.message.hendler("SYSTEM");