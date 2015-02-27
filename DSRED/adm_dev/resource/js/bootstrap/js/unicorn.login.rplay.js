/**
 * Unicorn Admin Template
 * Diablo9983 -> diablo9983@gmail.com
**/
$(document).ready(function(){

	var login = $('#loginform');
	var recover = $('#recoverform');
	var speed = 400;

	$('#to-recover').click(function(){
		login.fadeTo(speed,0.01).css('z-index','100');
		recover.fadeTo(speed,1).css('z-index','200');
	});

	$('#to-login').click(function(){
		recover.fadeTo(speed,0.01).css('z-index','100');
		login.fadeTo(speed,1).css('z-index','200');
	});
    
    if($.browser.msie == true && $.browser.version.slice(0,3) < 10) {
        $('input[placeholder]').each(function(){ 
       
			var input = $(this);  
			
			$(input).val(input.attr('placeholder'));
				   
			$(input).focus(function(){
				 if (input.val() == input.attr('placeholder')) {
					 input.val('');
				 }
			});
		   
			$(input).blur(function(){
				if (input.val() == '' || input.val() == input.attr('placeholder')) {
					input.val(input.attr('placeholder'));
				}
			});
		});
    }

	login.submit(function(o) {
		
		if ($("#Login_User_ID").val().isEmpty() || $("#Login_User_ID").val() == $("#Login_User_ID").attr('placeholder')) {
			alert("사용자 ID를 등록해 주세요.");
			return false;
		}
		if ($("#Login_User_PW").val().isEmpty() || $("#Login_User_PW").val() == $("#Login_User_PW").attr('placeholder')) {
			alert("사용자 비밀번호를 등록해 주세요.");
			return false;
		}
		login.attr("method", "post");
		login.attr("auction", "?admin");
		return true;
	});
});