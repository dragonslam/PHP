				<div class="h2_wrap">
					<h2><?php PS_Image("txt_h2_snslately.png", "최근 SNS 유입분석")?> </h2>
				</div>
				<div class="box_info">
					<p class="mt_2">최근 한달간 전체 트래킹을 분석한 결과 <strong>공유수는 85%</strong>로 나타나며, 그로 인한 <strong>유입자가 20%</strong>로 나타납니다.<br>
					SNS활동은 <strong>페이스북 80%</strong>에 비해 <strong>구글플러스의 활동이 미비</strong>하게 진행되고 있는 상황입니다. <strong>구글플러스 활동을 넓히시기</strong> 바랍니다.</p>
				</div>
				<section class="cs1 mt_1">
					<div class="h3_wrap">
						<h3>방문자 수치</h3>
						<p class="para_help"><a href="#help"><?php PS_Image("btn_help.png", "help")?></a></p>
						<div class="box_help">
							<div>
								<span></span>
								<ul>
									<li>도움말입니다.</li>
									<li>도움말입니다.</li>
									<li>도움말입니다.</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="graphzone_wrap3">
						<ul>
							<li>
								<h4 class="t1">이번달 순 방문자 수</h4>
								<div class="graph_wrap3">
									<div id="graph_area_visitor_1_a"></div>
									<div id="graph_area_visitor_1_b"></div>
									<div id="graph_area_visitor_1_c"></div>									
								</div>
							</li>
							<li>
								<h4 class="t1">이전달 순 방문자 수</h4>
								<div class="graph_wrap3">
									<div id="graph_area_visitor_2_a"></div>
									<div id="graph_area_visitor_2_b"></div>
									<div id="graph_area_visitor_2_c"></div>									
								</div>
							</li>
						</ul>
					</div>
				</section><!-- // 방문자 수치 -->
				<section class="cs1 mt_1">
					<div class="h3_wrap">
						<h3>SNS 유입경로분석</h3>
						<p class="para_help"><a href="#help"><?php PS_Image("btn_help.png", "help")?></a></p>
						<div class="box_help">
							<div>
								<span></span>
								<ul>
									<li>도움말입니다.</li>
									<li>도움말입니다.</li>
									<li>도움말입니다.</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="graphzone_wrap3_1">
						<ul>
							<li>
								<h4 class="t1_1">이번달 유입경로</h4>
								<div class="graph_wrap3_1" id="graph_area_path_barChart_1_a"></div>
							</li>
							<li>
								<h4 class="t1_1">이전달 유입경로</h4>
								<div class="graph_wrap3_1" id="graph_area_path_barChart_1_b"></div>
							</li>
						</ul>
					</div>
				</section><!-- // SNS 유입경로분석 -->
				<section class="cs1 mt_1">
					<div class="h3_wrap">
						<h3>일반 유입경로분석</h3>
						<p class="para_help"><a href="#help"><?php PS_Image("btn_help.png", "help")?></a></p>
						<div class="box_help">
							<div>
								<span></span>
								<ul>
									<li>도움말입니다.</li>
									<li>도움말입니다.</li>
									<li>도움말입니다.</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="graphzone_wrap3_1">
						<ul>
							<li>
								<h4 class="t1_1">이번달 유입경로</h4>
								<div class="graph_wrap3_1" id="graph_area_path_barChart_2_a"></div>
							</li>
							<li>
								<h4 class="t1_1">이전달 유입경로</h4>
								<div class="graph_wrap3_1" id="graph_area_path_barChart_2_b"></div>
							</li>
						</ul>
					</div>
				</section>
<script type="text/javascript">
<!--
$(document).ready(function(){
	var oStatictis = new com.mad.api.statistics(window._DomainObj, window._DomainCaller);

	// VISITOR Chart
	var GetPieChartSetting = function(t, c) {
		return {
			type : "pie",  // line, bar, pie, piePartition, band, radarChart
			width : 190,
			height: 190,
			colors : c,
			arcOuter : 0,
			arcInner : 35,
			styleCalss : 'arc',
			showLabels : false,
			lines	: [{x1:-50, y1:15, x2:50, y2:15}],
			lables	: [{x:0, y:40, styleCalss:'lable', fill:'', text:t}]
		};
	};
	var oPieChart_1_A = new com.mad.chart.handler("#graph_area_visitor_1_a", GetPieChartSetting("전체 방문자", ["#60b1cc", "#b7b7b7"]));
	var oPieChart_1_B = new com.mad.chart.handler("#graph_area_visitor_1_b", GetPieChartSetting("SNS 방문자", ["#bac3d2", "#6e84be", "#b7b7b7"]));
	var oPieChart_1_C = new com.mad.chart.handler("#graph_area_visitor_1_c", GetPieChartSetting("일반 방문자", ["#60b1cc", "#bac3d2", "#b7b7b7"]));
	var oPieChart_2_A = new com.mad.chart.handler("#graph_area_visitor_2_a", GetPieChartSetting("전체 방문자", ["#60b1cc", "#b7b7b7"]));
	var oPieChart_2_B = new com.mad.chart.handler("#graph_area_visitor_2_b", GetPieChartSetting("SNS 방문자", ["#bac3d2", "#6e84be", "#b7b7b7"]));
	var oPieChart_2_C = new com.mad.chart.handler("#graph_area_visitor_2_c", GetPieChartSetting("일반 방문자", ["#60b1cc", "#bac3d2", "#b7b7b7"]));

	// PATH Chart 
	var GetBarChartSetting = function(h) {
		return {
			type : "band2",  // line, bar, pie, piePartition, band, radarChart
			width : 1000,
			height: ((h) ? h : 7) * 55,
			margin : {left: 5, top: 0, right: 600, bottom: 0},
			colors : ["#43aea8", "#6e84be", "#60b1cc", "#bac3d2"],
			styleCalss : 'top',
			showLabels : true
		};
	};
	var oPathBandBarChart_1_A = new com.mad.chart.handler("#graph_area_path_barChart_1_a", GetBarChartSetting(7));
	var oPathBandBarChart_1_B = new com.mad.chart.handler("#graph_area_path_barChart_1_b", GetBarChartSetting(7));

	window._DomainCaller = function() 
	{
		// 방분자 수 데이터
		oStatictis.getVisitor(function(r) {	

			// 이번달 순 방문자 수
			var value = 0;
			value = (r.ret.this_month.visit_total > 1000) ? String((r.ret.this_month.visit_total/1000).toFixed(1)) + "K" : String(r.ret.this_month.visit_total);
			oPieChart_1_A.draw([
				{name:'All',value:r.ret.this_month.visit_total},
				{name:'Blank',value:(r.ret.this_month.visit_total == 0) ? 1 : 0}
			], {lables:[
				{x:-(value.length * 4), y:0, styleCalss:'lableCount', fill:'#6e84be', text:value},
				{x:30, y:0, styleCalss:'lableClick', fill:'#6e84be', text:"명	"}
			]});
			
			value = r.ret.this_month.visit_total - r.ret.this_month.visit_normal;
			value = (value > 1000) ? String((value/1000).toFixed(1)) + "K" : String(value);
			oPieChart_1_B.draw([
				{name:'Normal',value:r.ret.this_month.visit_normal},
				{name:'SNS',value:r.ret.this_month.visit_total - r.ret.this_month.visit_normal},
				{name:'Blank',value:(r.ret.this_month.visit_normal == 0 && (r.ret.this_month.visit_total - r.ret.this_month.visit_normal) == 0) ? 1 : 0}
			], {lables:[
				{x:-(value.length * 4), y:0, styleCalss:'lableCount', fill:'#60b1cc', text:value},
				{x:30, y:0, styleCalss:'lableClick', fill:'#60b1cc', text:"명	"}
			]});

			value = (r.ret.this_month.visit_normal > 1000) ? String((r.ret.this_month.visit_normal/1000).toFixed(1)) + "K" : String(r.ret.this_month.visit_normal);
			oPieChart_1_C.draw([
				{name:'Normal',value:r.ret.this_month.visit_normal},
				{name:'SNS',value:r.ret.this_month.visit_total - r.ret.this_month.visit_normal},
				{name:'Blank',value:(r.ret.this_month.visit_normal == 0 && (r.ret.this_month.visit_total - r.ret.this_month.visit_normal) == 0) ? 1 : 0}
			], {lables:[
				{x:-(value.length * 4), y:0, styleCalss:'lableCount', fill:'#43aea8', text:value},
				{x:30, y:0, styleCalss:'lableClick', fill:'#43aea8', text:"명	"}
			]});
		
			// 지난달 순 방문자 수
			value = r.ret.last_month.visit_total;
			value = (value > 1000) ? String((value/1000).toFixed(1)) + "K" : String(value);
			oPieChart_2_A.draw([
				{name:'All',value:r.ret.last_month.visit_total},
				{name:'Blank',value:(r.ret.last_month.visit_total == 0) ? 1 : 0}
			], {lables:[
				{x:-(value.length * 4), y:0, styleCalss:'lableCount', fill:'#6e84be', text:value},
				{x:30, y:0, styleCalss:'lableClick', fill:'#6e84be', text:"명	"}
			]});

			value = r.ret.last_month.visit_total - r.ret.last_month.visit_normal;
			value = (value > 1000) ? String((value/1000).toFixed(1)) + "K" : String(value);
			oPieChart_2_B.draw([
				{name:'Normal',value:r.ret.last_month.visit_normal},
				{name:'SNS',value:r.ret.last_month.visit_total - r.ret.last_month.visit_normal},
				{name:'Blank',value:(r.ret.last_month.visit_normal == 0 && (r.ret.last_month.visit_total - r.ret.last_month.visit_normal) == 0) ? 1 : 0}
			], {lables:[
				{x:-(value.length * 4), y:0, styleCalss:'lableCount', fill:'#6e84be', text:value},
				{x:30, y:0, styleCalss:'lableClick', fill:'#60b1cc', text:"명	"}
			]});
			
			value = r.ret.last_month.visit_normal;
			value = (value > 1000) ? String((value/1000).toFixed(1)) + "K" : String(value);
			oPieChart_2_C.draw([
				{name:'Normal',value:r.ret.last_month.visit_normal},
				{name:'SNS',value:r.ret.last_month.visit_total - r.ret.last_month.visit_normal},
				{name:'Blank',value:(r.ret.last_month.visit_normal == 0 && (r.ret.last_month.visit_total - r.ret.last_month.visit_normal) == 0) ? 1 : 0}
			], {lables:[
				{x:-(value.length * 4), y:0, styleCalss:'lableCount', fill:'#43aea8', text:value},
				{x:30, y:0, styleCalss:'lableClick', fill:'#43aea8', text:"명	"}
			]});
		});

		// 유입경로 데이터
		oStatictis.getPath(function(r) {
			
			if (!r.ret) return;
			r = r.ret;

			// SNS 유입경로분석
			if (r.this_sns && String(r.this_sns.err) == '0' && typeof r.this_sns.data == 'object' && r.this_sns.data != null) {
				var d = r.this_sns.data;
				var m = oStatictis.getMaxValue(d);
				oPathBandBarChart_1_A.draw([
					{name:'Facebook'		, value:String(d.fb).nvl('0').Int()	/ m, text:"Facebook(" + String(d.fb).nvl('0') +")"},
					{name:'Twitter'		, value:String(d.tw).nvl('0').Int()	/ m, text:"Twitter(" + String(d.tw).nvl('0') +")"},
					{name:'Google+'		, value:String(d.gp).nvl('0').Int()	/ m, text:"Google+(" + String(d.gp).nvl('0') +")"},
					{name:'Kakao Talk'	, value:String(d.kt).nvl('0').Int()	/ m, text:"Kakao Talk(" + String(d.kt).nvl('0') +")"},
					{name:'Kakao Story'	, value:String(d.ks).nvl('0').Int()	/ m, text:"Kakao Story(" + String(d.ks).nvl('0') +")"},
					{name:'Line'			, value:String(d.ln).nvl('0').Int()	/ m, text:"Line(" + String(d.ln).nvl('0') +")"},
					{name:'Other'			, value:String(d.ot).nvl('0').Int()	/ m, text:"Other(" + String(d.ot).nvl('0') +")"}
				]);
			}
			else {
				oPathBandBarChart_1_A.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
			}
			if (r.last_sns && String(r.last_sns.err) == '0' && typeof r.last_sns.data == 'object' && r.last_sns.data != null) {
				var d = r.last_sns.data;
				var m = oStatictis.getMaxValue(d);
				oPathBandBarChart_1_B.draw([
					{name:'Facebook'		, value:String(d.fb).nvl('0').Int()	/ m, text:"Facebook(" + String(d.fb).nvl('0') +")"},
					{name:'Twitter'		, value:String(d.tw).nvl('0').Int()	/ m, text:"Twitter(" + String(d.tw).nvl('0') +")"},
					{name:'Google+'		, value:String(d.gp).nvl('0').Int()	/ m, text:"Google+(" + String(d.gp).nvl('0') +")"},
					{name:'Kakao Talk'	, value:String(d.kt).nvl('0').Int()	/ m, text:"Kakao Talk(" + String(d.kt).nvl('0') +")"},
					{name:'Kakao Story'	, value:String(d.ks).nvl('0').Int()	/ m, text:"Kakao Story(" + String(d.ks).nvl('0') +")"},
					{name:'Line'			, value:String(d.ln).nvl('0').Int()	/ m, text:"Line(" + String(d.ln).nvl('0') +")"},
					{name:'Other'			, value:String(d.ot).nvl('0').Int()	/ m, text:"Other(" + String(d.ot).nvl('0') +")"}
				]);
			}
			else {
				oPathBandBarChart_1_B.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
			}

			// 일반 유입경로분석
			if (r.this_search && String(r.this_search.err) == '0' && typeof r.this_search.data == 'object' && r.this_search.data != null) {
				var chartData = [], valueData = {}, item = null;
				var chart = new com.mad.chart.handler("#graph_area_path_barChart_2_a", GetBarChartSetting(r.this_search.data.length));
				for (var i = 0; i < r.this_search.data.length; i++) {
					item	= r.this_search.data[i];	
					valueData[item.key] = item.value;
				}
				var m = oStatictis.getMaxValue(valueData);
				for (var i = 0; i < r.this_search.data.length; i++) {
					item	= r.this_search.data[i];					
					chartData[chartData.length] = {name:item.key, value:item.value / m, text:""+ item.key +"(" + item.value +")"};					
				}
				chart.draw(chartData);
			}
			else {
				$("#graph_area_path_barChart_2_a").empty().append(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
			}
			if (r.last_search && String(r.last_search.err) == '0' && typeof r.last_search.data == 'object' && r.last_search.data != null) {
				var chartData = [], valueData = {}, item = null;
				var chart = new com.mad.chart.handler("#graph_area_path_barChart_2_b", GetBarChartSetting(r.last_search.data.length));
				for (var i = 0; i < r.this_search.data.length; i++) {
					item	= r.last_search.data[i];	
					valueData[item.key] = item.value;
				}
				var m = oStatictis.getMaxValue(valueData);
				for (var i = 0; i < r.last_search.data.length; i++) {
					item = r.last_search.data[i];
					chartData[chartData.length] = {name:item.key, value:item.value / m, text:""+ item.key +"(" + item.value +")"};					
				}
				chart.draw(chartData);
			}
			else {
				$("#graph_area_path_barChart_2_b").empty().append(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
			}

		});


		if (_DomainDelay > 1) {
			window.setTimeout(function(){if (typeof _DomainCaller == 'function') _DomainCaller();}, _DomainDelay * 1000);	
		}
	};
	window.setTimeout(function() {
		window._DomainCaller();
	}, 100);
	
});
//-->
</script>
