				<div class="h2_wrap">
					<h2><?php PS_Image("txt_h2_timedata.png", "시간별 데이터")?> </h2>
				</div>
				<div class="box_info">
					<p class="mt_1">이번달은 <strong>화요일, 수요일</strong>이 방문자가 많습니다. 시간대 별로는 <strong>오후3시, 오후5시</strong>에 방문자가 가장 많습니다</p>
				</div>
				<section class="cs1 mt_1">
					<div class="h3_wrap">
						<h3>요일별 트래픽</h3>
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
					<div class="graphzone_wrap1">
						<ul>
							<li>
								<h4 class="t1">이번달 전체 트래픽</h4>
								<div class="graph_wrap1" id="graph_area_day_bar_1_a"></div>
							</li>
							<li>
								<h4 class="t1">최근 3달간 트래픽</h4>
								<div class="graph_exp">
									<span><?php PS_Image("blt_graph_1.png", "")?> 1달전</span>
									<span><?php PS_Image("blt_graph_2.png", "")?> 2달전</span>
									<span><?php PS_Image("blt_graph_3.png", "")?> 3달전</span>
								</div>
								<div class="graph_wrap1" id="graph_area_day_line_1_a"></div>
							</li>
							<li>
								<h4 class="t1">이번달 SNS 트래픽</h4>
								<div class="graph_wrap1" id="graph_area_day_bar_1_b"></div>
							</li>
							<li>
								<h4 class="t1">최근 3달간 SNS 트래픽</h4>
								<div class="graph_exp">
									<span><?php PS_Image("blt_graph_1.png", "")?> 1달전</span>
									<span><?php PS_Image("blt_graph_2.png", "")?> 2달전</span>
									<span><?php PS_Image("blt_graph_3.png", "")?> 3달전</span>
								</div>
								<div class="graph_wrap1" id="graph_area_day_line_1_b"></div>
							</li>
							<li>
								<h4 class="t1">이번달 일반유입 트래픽</h4>
								<div class="graph_wrap1" id="graph_area_day_bar_1_c"></div>
							</li>
							<li>
								<h4 class="t1">최근 3달간 일반유입 트래픽</h4>
								<div class="graph_exp">
									<span><?php PS_Image("blt_graph_1.png", "")?> 1달전</span>
									<span><?php PS_Image("blt_graph_2.png", "")?> 2달전</span>
									<span><?php PS_Image("blt_graph_3.png", "")?> 3달전</span>
								</div>
								<div class="graph_wrap1" id="graph_area_day_line_1_c"></div>
							</li>
						</ul>
					</div>
				</section>
				<section class="cs1 mt_1">
					<div class="h3_wrap">
						<h3>시간별 트래픽</h3>
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
					<div class="graphzone_wrap1">
						<ul>
							<li>
								<h4 class="t1">이번달 전체 트래픽</h4>
								<div class="graph_wrap1" id="graph_area_day_bar_2_a"></div>
							</li>
							<li>
								<h4 class="t1">최근 3달간 트래픽</h4>
								<div class="graph_exp">
									<span><?php PS_Image("blt_graph_1.png", "")?> 1달전</span>
									<span><?php PS_Image("blt_graph_2.png", "")?> 2달전</span>
									<span><?php PS_Image("blt_graph_3.png", "")?> 3달전</span>
								</div>
								<div class="graph_wrap1" id="graph_area_day_line_2_a"></div>
							</li>
							<li>
								<h4 class="t1">이번달 SNS 트래픽</h4>
								<div class="graph_wrap1" id="graph_area_day_bar_2_b"></div>
							</li>
							<li>
								<h4 class="t1">최근 3달간 SNS 트래픽</h4>
								<div class="graph_exp">
									<span><?php PS_Image("blt_graph_1.png", "")?> 1달전</span>
									<span><?php PS_Image("blt_graph_2.png", "")?> 2달전</span>
									<span><?php PS_Image("blt_graph_3.png", "")?> 3달전</span>
								</div>
								<div class="graph_wrap1" id="graph_area_day_line_2_b"></div>
							</li>
							<li>
								<h4 class="t1">이번달 일반유입 트래픽</h4>
								<div class="graph_wrap1" id="graph_area_day_bar_2_c"></div>
							</li>
							<li>
								<h4 class="t1">최근 3달간 일반유입 트래픽</h4>
								<div class="graph_exp">
									<span><?php PS_Image("blt_graph_1.png", "")?> 1달전</span>
									<span><?php PS_Image("blt_graph_2.png", "")?> 2달전</span>
									<span><?php PS_Image("blt_graph_3.png", "")?> 3달전</span>
								</div>
								<div class="graph_wrap1" id="graph_area_day_line_2_c"></div>
							</li>
						</ul>
					</div>
				</section>
<script type="text/javascript">
<!--
$(document).ready(function(){
	var oStatictis = new com.mad.api.statistics(window._DomainObj, window._DomainCaller);
	function getWeeklyBarChartData(data) {
		var now = new Date();
		var result = [];
		var total	 = 0;
		for (var w=0; w<7; w++) {
			total += String(data[w]).nvl('0').Int();
			result[w] = {};
			result[w]['key']	= now.addDay(-now.getDay()).addDay(w).toDateString(1); 			
			result[w]['value']	= String(data[w]).nvl('0').Int();
			result[w]['text']	= "Traffic("+ String(data[w]).nvl('0').money() +")";
		}
		if (total > 0) {		
			for (var w=0; w<7; w++) {
				result[w]['value'] = result[w]['value'] /total;
			}
		}
		return result;
	}
	function getWeeklyLineChartData(data) {
		var now = new Date();
		var result = [];
		for (var i=0; i < data.length; i++) {
			var d =data[i];
			for (var w=0; w<7; w++) {
				if (typeof result[w] != 'object'){
					result[w] = {};
					result[w]['date'] = now.addDay(-now.getDay()).addDay(w).toDateString(1); 
				}
				result[w][d.reg_date] = String(d.data[w]).nvl('0');
			}
		}
		return result;
	}

	function getHourBarChartData(data) {
		var now = new Date();
		var result = [];
		var total = 0;
		for (var h=0; h<24; h++) {
			total += String(data[h]).nvl('0').Int();
			result[h] = {};
			result[h]['key']		= now.toDateString(1) +" "+ String(h).padLeft(2, "0"); 
			result[h]['value']	= String(data[h]).nvl('0').Int();
			result[h]['text']	= "Traffic("+ String(data[h]).nvl('0').money() +")";
		}
		if (total > 0) {		
			for (var h=0; h<24; h++) {
				result[h]['value'] = result[h]['value'] / total;
			}
		}
		return result;
	}
	function getHourLineChartData(data) {
		var now = new Date();
		var result = [];
		for (var i=0; i < data.length; i++) {
			var d =data[i];
			for (var h=0; h<24; h++) {
				if (typeof result[h] != 'object'){
					result[h] = {};
					result[h]['date'] = now.toDateString(1) +" "+ String(h).padLeft(2, "0"); 
				}
				result[h][d.reg_date] = String(d.data[h]).nvl('0');
			}
		}
		return result;
	}

	// Bar Chart
	var GetBarChartSetting = function(c, s, f) {
		return {
			type : "bar",  // line, bar, pie, piePartition, band, radarChart
			width : 450,
			height: 260,
			colors : c ? c : ["#43aea8", "#6e84be", "#60b1cc"],
			styleCalss : s ? s : 'line',
			showLabels : false,
			margin : {left: 50, top: 5, right: 10, bottom: 30},
			format : d3.time.format((f ? f : "%Y-%m-%d")).parse
		};
	};
	var oBarChart_1_A = new com.mad.chart.handler("#graph_area_day_bar_1_a", GetBarChartSetting());
	var oBarChart_1_B = new com.mad.chart.handler("#graph_area_day_bar_1_b", GetBarChartSetting());
	var oBarChart_1_C = new com.mad.chart.handler("#graph_area_day_bar_1_c", GetBarChartSetting());
	var oBarChart_2_A = new com.mad.chart.handler("#graph_area_day_bar_2_a", GetBarChartSetting(false, "line2", "%Y-%m-%d %H"));
	var oBarChart_2_B = new com.mad.chart.handler("#graph_area_day_bar_2_b", GetBarChartSetting(false, "line2", "%Y-%m-%d %H"));
	var oBarChart_2_C = new com.mad.chart.handler("#graph_area_day_bar_2_c", GetBarChartSetting(false, "line2", "%Y-%m-%d %H"));

	// Line Chart
	var GetLineChartSetting = function(c, s, f) {
		return {
			type : "multiLine",  // line, bar, pie, piePartition, band, radarChart
			width : 440,
			height: 260,
			colors : c ? c : ["#43aea8", "#6e84be", "#60b1cc"],
			styleCalss : s ? s : 'line',
			showLabels : false,
			margin : {left: 60, top: 5, right: 10, bottom: 30},
			format : d3.time.format((f ? f : "%Y-%m-%d")).parse
		};
	};
	var oLineChart_1_A = new com.mad.chart.handler("#graph_area_day_line_1_a", GetLineChartSetting(false));
	var oLineChart_1_B = new com.mad.chart.handler("#graph_area_day_line_1_b", GetLineChartSetting(false));
	var oLineChart_1_C = new com.mad.chart.handler("#graph_area_day_line_1_c", GetLineChartSetting(false));
	var oLineChart_2_A = new com.mad.chart.handler("#graph_area_day_line_2_a", GetLineChartSetting(false, "line2", "%Y-%m-%d %H"));
	var oLineChart_2_B = new com.mad.chart.handler("#graph_area_day_line_2_b", GetLineChartSetting(false, "line2", "%Y-%m-%d %H"));
	var oLineChart_2_C = new com.mad.chart.handler("#graph_area_day_line_2_c", GetLineChartSetting(false, "line2", "%Y-%m-%d %H"));

	window._DomainCaller = function() 
	{
		// 요일별 데이터 
		oStatictis.getDay(function(r) {
			// 각 그래프의 데이터 생성
			if (r.day instanceof Object) {
				// Bar chart drawing
				var data_1 = getWeeklyBarChartData(r.day.total),
					 data_2 = getWeeklyBarChartData(r.day.sns), 
					 data_3 = getWeeklyBarChartData(r.day.normal);
				
				oBarChart_1_A.draw(data_1, {xAxis:{ticks:7, format:"%a"}, yAxis:{ticks:5}});
				oBarChart_1_B.draw(data_2, {xAxis:{ticks:7, format:"%a"}, yAxis:{ticks:5}});
				oBarChart_1_C.draw(data_3, {xAxis:{ticks:7, format:"%a"}, yAxis:{ticks:5}});
			}
			else {
				oBarChart_1_A.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
				oBarChart_1_B.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
				oBarChart_1_C.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
			}

			if (r.day_3 instanceof Object) {
				// Line chart drawing
				var data_1 = getWeeklyLineChartData(r.day_3.total),
					 data_2 = getWeeklyLineChartData(r.day_3.sns), 
					 data_3 = getWeeklyLineChartData(r.day_3.normal);
				
				oLineChart_1_A.draw(data_1, {point:{type:'circle', size:4, fill:true}, xAxis:{ticks:7, format:"%a"}, yAxis:{ticks:5}});
				oLineChart_1_B.draw(data_2, {point:{type:'circle', size:4, fill:true}, xAxis:{ticks:7, format:"%a"}, yAxis:{ticks:5}});
				oLineChart_1_C.draw(data_3, {point:{type:'circle', size:4, fill:true}, xAxis:{ticks:7, format:"%a"}, yAxis:{ticks:5}});
			}
			else {
				oLineChart_1_A.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
				oLineChart_1_B.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
				oLineChart_1_C.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
			}
		});


		// 시간별 데이터 
		oStatictis.getHour(function(r) {
			// 각 그래프의 데이터 생성
			if (r.hour instanceof Object) {
				// Bar chart drawing
				var data_1 = getHourBarChartData(r.hour.total),
					 data_2 = getHourBarChartData(r.hour.sns), 
					 data_3 = getHourBarChartData(r.hour.normal);
				
				oBarChart_2_A.draw(data_1, {xAxis:{ticks:7, format:"%H"}, yAxis:{ticks:5}});
				oBarChart_2_B.draw(data_2, {xAxis:{ticks:7, format:"%H"}, yAxis:{ticks:5}});
				oBarChart_2_C.draw(data_3, {xAxis:{ticks:7, format:"%H"}, yAxis:{ticks:5}});
			}
			else {
				oBarChart_2_A.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
				oBarChart_2_B.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
				oBarChart_2_C.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
			}

			if (r.hour_3 instanceof Object) {
				// Line chart drawing
				var data_1 = getHourLineChartData(r.hour_3.total),
					 data_2 = getHourLineChartData(r.hour_3.sns), 
					 data_3 = getHourLineChartData(r.hour_3.normal);
				
				oLineChart_2_A.draw(data_1, {point:{type:'circle', size:2, fill:true}, xAxis:{ticks:24, format:"%H"}, yAxis:{ticks:5}});
				oLineChart_2_B.draw(data_2, {point:{type:'circle', size:2, fill:true}, xAxis:{ticks:24, format:"%H"}, yAxis:{ticks:5}});
				oLineChart_2_C.draw(data_3, {point:{type:'circle', size:2, fill:true}, xAxis:{ticks:24, format:"%H"}, yAxis:{ticks:5}});
			}
			else {
				oLineChart_2_A.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
				oLineChart_2_B.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
				oLineChart_2_C.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
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