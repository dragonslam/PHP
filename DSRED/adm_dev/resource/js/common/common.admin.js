/*--------------------------------------------------------------------------------*\
* Admin Site Common
\*--------------------------------------------------------------------------------*/

var processApp, processCmd, processSeq;

$(document).ready(function(){

	processApp	= $("#processApp").val();
	processCmd	= $("#processCmd").val();
	processSeq	= $("#processSeq").val();


	$("#btnLogout").click(function() {
		fnCommander("member", "logout");
	});

	$("#public-modal-dialog").dialog({
		autoOpen: false,
		modal: true,
		buttons: {
			Ok: function () {
				$(this).dialog("close");
			}
		}
	});


	$.datepicker.regional['ko'] = {
		closeText: '닫기',
		prevText: '이전달',
		nextText: '다음달',
		currentText: '오늘',
		monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
		monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
		dayNames: ['일','월','화','수','목','금','토'],
		dayNamesShort: ['일','월','화','수','목','금','토'],
		dayNamesMin: ['일','월','화','수','목','금','토'],
		weekHeader: 'Wk',
		dateFormat: 'yy-mm-dd',
		firstDay: 0,
		isRTL: false,
		duration:200,
		showAnim:'show',
		showMonthAfterYear: true,
		yearSuffix: '년'
	};
	$.datepicker.setDefaults($.datepicker.regional['ko']);
    $('.datepicker').datepicker({
		showOn: "both", // 버튼과 텍스트 필드 모두 캘린더를 보여준다.
		//buttonImage: "/application/db/jquery/images/calendar.gif", // 버튼 이미지
		//buttonImageOnly: true, // 버튼에 있는 이미지만 표시한다.
		//changeMonth: true, // 월을 바꿀수 있는 셀렉트 박스를 표시한다.
		//changeYear: true, // 년을 바꿀 수 있는 셀렉트 박스를 표시한다.
		minDate: '-0d', // 현재날짜로부터 100년이전까지 년을 표시한다.
		numberOfMonths: [1,1], // 한번에 얼마나 많은 월을 표시할것인가. [2,3] 일 경우, 2(행) x 3(열) = 6개의 월을 표시한다.
		//stepMonths: 3, // next, prev 버튼을 클릭했을때 얼마나 많은 월을 이동하여 표시하는가. 
		yearRange: 'c-0:c+1', // 년도 선택 셀렉트박스를 현재 년도에서 이전, 이후로 얼마의 범위를 표시할것인가.
		showButtonPanel: true, // 캘린더 하단에 버튼 패널을 표시한다. 
		currentText: '오늘 날짜' , // 오늘 날짜로 이동하는 버튼 패널
		closeText: '닫기', // 닫기 버튼 패널
	});

	//$('select').select2();
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();	
    //$('.colorpicker').colorpicker();
});

function fnCommander(app, cmd, identity, callback, isDelete, target, action) {
	app			= typeof(app) == "string" ? app : "";
	cmd			= typeof(cmd) == "string" ? cmd : "";
	callback		= typeof(callback) == "string" ? callback : "";
	action		= typeof(action) == "string" ? action : "";
	identity		= identity ? identity : "0";	
	if (cmd == "")	
		return;

	if (typeof(isDelete) == "boolean" && isDelete) {
		if (!confirm("정보를 삭제합니다.\n\n - 정말로 삭제 하시겠습니까?"))
			return;
	}

	var oForm = document.getElementById("mainForm");	
	if (!action.isEmpty())	 oForm.action = action;
	oForm.processApp.value		= app;	
	oForm.processCmd.value		= cmd;	
	oForm.processSeq.value		= identity;	
	oForm.processCallback.value	= callback;	
	oForm.submit();
}

var _Cartgory_Root		= "-1";
function fnGetCartgory(pid, callback) {
	fnCallAjax({
			 "processApp":"category"
			,"processCmd":"get"
			,"processSeq":"-1"
		}, 
		function(data) {
			if (typeof callback == "function") {
				if (data != "") {
					callback($.parseJSON(data));
				}
				else {
					callback(null);
				}
			}
		}
	);
}
function fnSetCartgoryTree(tree, pid, callback, expandLevel, activateKey, selectKey) {
	_Cartgory_Root = pid;

	var selectKeys	= "";
	expandLevel	= typeof expandLevel == "number" ? expandLevel : 3;
	activateKey		= typeof activateKey == "string" && !activateKey.isEmpty() ? activateKey : "";
	selectKeys		= typeof selectKey == "string" && !selectKey.isEmpty() ? selectKey.split(",") : "";

	fnGetCartgory(pid, function(data) {
		if (data == null && data.length > 0) return;
		
		var oNode;
		$(data).each(function(e) {
			oNode = $("#"+tree).dynatree("getTree").getNodeByKey(String(data[e].CART_P_SEQ));
			if (oNode && typeof oNode.addChild == "function") {
				var isSelect = false;
				if (selectKeys && typeof selectKeys == "object" && selectKeys.length > 0) {
					for (i=0; i < selectKeys.length; i++) {
						isSelect = (selectKeys[i] == String(data[e].CART_SEQ));
						if (isSelect) break;
					}
				}
				oNode.addChild({
					  key: data[e].CART_SEQ
					, sort: data[e].CART_SORT
					, title: data[e].CART_TITLE
					, activate: (activateKey == String(data[e].CART_SEQ))
					, select: isSelect
					, expand: (oNode.getLevel() < expandLevel)
					, title: data[e].CART_TITLE
				    , cUse: data[e].CART_USE
					, cType: data[e].CART_TYPE
					, cValue: data[e].CART_VALUE
				});
				oNode.data.isFolder = true;
			}
		});
	});

	if (typeof callback == "function") {	
		callback();
	}
}
function fnSetCartgorySelects(tree, nodeKeys, callback) {
	if (String(nodeKeys).isEmpty()) return;

	var keys = nodeKeys.split(",");
	for (i = 0; i < keys.length ; i++) {
		if (!String(keys[i]).isEmpty()) {
			$("#"+tree).dynatree("getTree").selectKey(String(keys[i]));
		}
	}
}
function fnResetCartgoryTree(tree, pid, callback, expandLevel, activateKey, selectKeys) {
	$("#"+tree).dynatree("getTree").selectKey(pid).removeChildren();
	fnSetCartgoryTree(tree, pid, callback, expandLevel, activateKey, selectKeys);
}

function fnImagePreviewSetEvent() {
	$("button[name='btn_ImagePreview']").each(function() {
		$(this).unbind("click").bind("click", function() {
			var frm = $(this)[0].form;
			if (frm && frm.FiledataTarget) {
				var img = $("#"+ frm.FiledataTarget.value).val();
				fnImagePreview(img);
			}
		});
	});
}
function fnImagePreview(filepath) {
	if (filepath && filepath != "") {	
		var imgWin = window.open("","imgWin","width=840,height=600");
		var img = new Image();
		img.src = filepath;
		
		if (imgWin) {
			imgWin.document.write("<img src='"+ filepath +"' onload='window.resizeTo(this.width+45, this.height+90);' onclick='self.close();' />");
		}
	}
}


function fnModalOpen(title, message) {
	$("#public-modal-dialog").attr("title", title)
		.html(message)
		.dialog("open");
	return false;
}

function fnStyleSwitcher(style) {
	$('.skin-color').attr('href','resources/bootstrap/css/unicorn.'+style+'.css');
	$(this).siblings('a').css({'border-color':'transparent'});
	$(this).css({'border-color':'#aaaaaa'});
}

function fnFileUploader(oForm) {	
	oForm = oForm ? oForm : null;
	if (oForm == null) return;
	
	oForm.enctype = "multipart/form-data";
	oForm.method = "post";
	oForm.target = "frameProcess";
	oForm.action = "fileUploader.asp";
	oForm.submit();
} 

function fnViewDataRefine(data) {
	data = String(data);
	if (data.isEmpty() || data == "null")
		return "";
	else {
		if (data.trim().toLower() == "true") {
			return "<span style='color:blue;'>"+data.trim()+"</span>";
		}
		else if (data.trim().toLower() == "false") {
			return "<span style='color:red;'>"+data.trim()+"</span>";
		}
		else {
			return data.trim();
		}
	}			
}