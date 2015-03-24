<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Common Header
//
//	Edit history
// 
// ========================================================
//	Date     Editer     Description
// ------------------------------------------------------------------------
//'
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta property="og:image" content="">
<meta property="og:title" content="<?php echo $page_title; ?>">
<meta property="og:url" content="">
<meta property="og:description" content="">
<title>::<?php echo("$site_name"); ?> - <?php echo("$page_title"); ?></title>
<!--[if lt IE 9]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->
<?php 
/**
	CSS Include.
**/
	PS_Style("/bootstrap/css/bootstrap.min.css");
	PS_Style("/bootstrap/css/bootstrap-responsive.min.css");	
	PS_Style("/bootstrap/css/jquery-ui.css");
	PS_Style("/bootstrap/css/jquery.gritter.css");
	PS_Style("/bootstrap/css/fullcalendar.css");	
	PS_Style("/bootstrap/css/select2.css");		
	PS_Style("/bootstrap/css/uniform.css");	
	PS_Style("/bootstrap/css/unicorn.main.css");	
	PS_Style("/bootstrap/css/unicorn.grey.css", true, "skin-color");
 
	
/**
	JS Include Manage.
	- 페이지 별로 필요한 JS를 추가하도록 한다. 

**/		
if ($site_isDebug) {
	// 개발용 버전
	//echo("<script src='//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js'></script>\n");	
	PS_Script("/bootstrap/js/excanvas.min.js", "excanvas", true);	
	PS_Script("/bootstrap/js/jquery.min.js", "jquery", true);
	PS_Script("/bootstrap/js/jquery-ui.custom.min.js", "jquery-ui", true);	
	PS_Script("/bootstrap/js/jquery.peity.min.js", "jquery-peity", true);
	PS_Script("/bootstrap/js/jquery.gritter.min.js", "jquery-gritter", true);
	PS_Script("/bootstrap/js/jquery.validate.js", "jquery-validate", true);
	
	PS_Script("/bootstrap/js/bootstrap.min.js", "bootstrap", true);
	PS_Script("/bootstrap/js/jquery.uniform.js", "jquery-uniform", true);
	PS_Script("/bootstrap/js/jquery.dataTables.js", "jquery-dataTables", true);
	PS_Script("/bootstrap/js/fullcalendar.min.js", "jquery-fullcalendar", true);
	PS_Script("/bootstrap/js/select2.min.js", "jquery-select2", true);
	PS_Script("/bootstrap/js/unicorn.js", "bootstrap-unicorn", true);	
	
	PS_Script("/js/common/common.js", "common", true);	
	PS_Script("/js/common/common.date.js", "common.Date", true);
	PS_Script("/js/common/common.string.js", "common.String", true);
	PS_Script("/js/common/common.function.js", "common.String", true);
	PS_Script("/js/common/common.admin.js", "common.Admin", true);
	PS_Script("/js/jquery.easing.1.3.js", "jquery-easing", true);
	PS_Script("/js/jquery.cookie.js", "jquery-cookie", true);
		
}
else {
	// 서비스용 릴리즈 버전
	// JS를 컴파일하여 서비스 하도록 한다. 
	// Compiler Document : https://developers.google.com/closure/
	// Closure Compiler : http://closure-compiler.appspot.com/home
	//echo("<script src='//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'></script>\n");
	PS_Script("/bootstrap/js/excanvas.min.js", "excanvas", true);	
	PS_Script("/bootstrap/js/jquery.min.js", "jquery", true);
	PS_Script("/bootstrap/js/jquery-ui.custom.min.js", "jquery-ui", true);	
	PS_Script("/bootstrap/js/jquery.peity.min.js", "jquery-peity", true);
	PS_Script("/bootstrap/js/jquery.gritter.min.js", "jquery-gritter", true);
	PS_Script("/bootstrap/js/jquery.validate.js", "jquery-validate", true);
	
	PS_Script("/bootstrap/js/bootstrap.min.js", "bootstrap", true);
	PS_Script("/bootstrap/js/jquery.uniform.js", "jquery-uniform", true);
	PS_Script("/bootstrap/js/jquery.dataTables.js", "jquery-dataTables", true);
	PS_Script("/bootstrap/js/fullcalendar.min.js", "jquery-fullcalendar", true);
	PS_Script("/bootstrap/js/select2.min.js", "jquery-select2", true);
	PS_Script("/bootstrap/js/unicorn.js", "bootstrap-unicorn", true);	
	
	PS_Script("/js/common.js", "common", true);	
	PS_Script("/js/common.Date.js", "common.Date", true);
	PS_Script("/js/common.String.js", "common.String", true);
	PS_Script("/js/common.Admin.js", "common.Admin", true);
	PS_Script("/js/jquery/jquery.easing.1.3.js", "jquery-easing", true);
	PS_Script("/js/jquery/jquery.cookie.js", "jquery-cookie", true);
}

	//PS_Script("plugin.zclip/jquery.zclip.min.js", true);
	//PS_Script("plugin.d3/d3.min.js");
	//PS_Script("plugin.d3/d3.chart.setting.js", "d3_chart_setting", true);
	//PS_Script("plugin.d3/d3.chart.common.js", "d3_chart_common", true);
	//PS_Script("plugin.d3/d3.chart.RadarChart.js", "d3_chart_RadarChart", true);
	//PS_Script("plugin.ExcellentExport/ExcellentExport.js");
	//PS_Script("plugin.ExcellentExport/ExcellentExport.min.js");		
		
?>
<script type="text/javascript">
<!--	
	var resource_root	= "<?php echo("$site_root$site_resource")?>";
	var resource_max	= "<?php echo("$site_excel_max_cnt")?>";
	var _DomainType		= "<?php echo("$t_domain_type"); ?>";
	var _DomainID		= "<?php echo("$t_domain_id"); ?>";
	var _DomainObj		= null;
	var _DomainCaller	= {};
	var _DomainDelay	= 0;		// 초단위 설정
	var _Query			= new Query();
//-->
</script>
</head>