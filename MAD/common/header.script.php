<?php 
/**
	JS Include Manage.
	- 페이지 별로 필요한 JS를 추가하도록 한다. 

**/		
		if ($site_isDebug) {
			// 개발용 버전
			echo("<script src='//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js'></script>\n");
			PS_Script("jquery.bxslider.js", "jquery_bxslider", true);
			PS_Script("placeholder.js", "placeholder", true);
			PS_Script("dev/common.js", "jCommon", true);
			PS_Script("dev/common.function.js", "jFunction", true);
			PS_Script("dev/common.string.js", "jString", true);
			PS_Script("dev/common.date.js", "jDate", true);
			PS_Script("dev/common.message.js", "jMessage", true);
			PS_Script("dev/common.api.js", "jApi", false);
		}
		else {
			// 서비스용 릴리즈 버전
			// JS를 컴파일하여 서비스 하도록 한다. 
			// Compiler Document : https://developers.google.com/closure/
			// Closure Compiler : http://closure-compiler.appspot.com/home
			echo("<script src='//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'></script>\n");
			PS_Script("jquery.bxslider.min.js", "jquery_bxslider", true);
			PS_Script("placeholder.js", "placeholder", true);
			PS_Script("release/common.js", "jCommon", true);
			PS_Script("release/common.function.js", "jFunction", true);
			PS_Script("release/common.string.js", "jString", true);
			PS_Script("release/common.date.js", "jDate", true);
			PS_Script("release/common.message.js", "jMessage", true);
			PS_Script("release/common.api.js", "jApi", true);
		}

		if (startWith($page_id, "tracking")) {
			PS_Script("plugin.zclip/jquery.zclip.min.js", true);
		}

		if (startWith($page_id, "statistics1") || startWith($page_id, "statistics2") || startWith($page_id, "statistics3") ||
			startWith($page_id, "statistics4") || startWith($page_id, "statistics5") || startWith($page_id, "statistics6")
		) {
			if ($site_isDebug) {
				//echo("<script src='http://d3js.org/d3.v3.js'></script>\n"); <-- 원본 수정을 해서 사용 못함. 
				PS_Script("plugin.d3/d3.js");
				PS_Script("dev/d3.chart.setting.js", "d3_chart_setting", false);
				PS_Script("dev/d3.chart.common.js", "d3_chart_common", false);
			}
			else {
				//echo("<script src='http://d3js.org/d3.v3.min.js'></script>\n");
				PS_Script("plugin.d3/d3.min.js");
				PS_Script("release/d3.chart.setting.js", "d3_chart_setting", true);
				PS_Script("release/d3.chart.common.js", "d3_chart_common", true);
			}
		}
		if (startWith($page_id, "statistics2")) {
			if ($site_isDebug) {
				PS_Script("dev/d3.chart.RadarChart.js", "d3_chart_RadarChart", true);
			}
			else {
				PS_Script("release/d3.chart.RadarChart.js", "d3_chart_RadarChart", true);
			}
		}
		if (startWith($page_id, "statistics7") || startWith($page_id, "statistics8") || startWith($page_id, "statistics9")) {
			if ($site_isDebug) {
				PS_Script("plugin.ExcellentExport/ExcellentExport.js");
			}
			else {
				PS_Script("plugin.ExcellentExport/ExcellentExport.min.js");
			}
		}
?>
<script type="text/javascript">
<!--
	var isLogin_page	= ("<?php echo($page_auth)?>" === "true") ? true : false;
	var resource_root	= "<?php echo("$site_root$site_resource")?>";
	var resource_max	= "<?php echo("$site_excel_max_cnt")?>";
	var _DomainType	= "<?php echo("$t_domain_type"); ?>";
	var _DomainID		= "<?php echo("$t_domain_id"); ?>";
	var _DomainObj	= null;
	var _DomainCaller	= {};
	var _DomainDelay	= 0;		// 초단위 설정
	var _Query			= new Query();
//-->
</script>