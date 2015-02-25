				<div class="h2_wrap">
					<h2><?php PS_Image("txt_h2_daydata.png", "일별 데이터")?> </h2>
				</div>
				<div class="box_info">
					<p class="mt_2">순방문자 대비 <strong>클릭수가 100</strong>으로 <strong>방문자의 활동이 미비</strong> 합니다. <strong>SNS의 방문자가 80</strong>으로 <strong>SNS부분에 마케팅을 집중</strong>하세요.<br>
					유입경로는 <strong>SNS를 강화</strong>하셔야 하며, <strong>신규방문자가 더 많으므로 인지도는 올라가고</strong> 있습니다.</p>
				</div>
				<nav class="tab_1">
					<ul>
						<li class="on"><a <?php PS_PageLink("statistics5")?>>전체분석</a></li>
						<li><a <?php PS_PageLink("statistics5a")?>>SNS 분석</a></li>
					</ul>
				</nav>
				<section class="cs1">
					<div class="h3_wrap">
						<h3>순방문자 / 트래픽</h3>
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
					<div class="graphzone_wrap2">
						<ul>
							<li>
								<div class="graph_wrap2">
									<div class="fl">
										<ul>
											<li>
												<p class="tit">순방문자</p>
												<p class="fc_2" id="visitor_daily_traffic_max">0</p>
											</li>
											<li>
												<p class="tit">&nbsp;</p>
												<p class="fc_1" id="visitor_daily_traffic_all">&nbsp;</p>
											</li>
										</ul>
									</div>
									<div class="fr" id="graph_area_visitor_1_a"></div>
								</div>
							</li>
						</ul>
					</div>
				</section><!-- // 순방문자 / 트래픽 -->
				<section class="cs1 mt_1">
					<div class="h3_wrap">
						<h3>SNS 트레픽 / NotSNS 트레픽</h3>
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
					<div class="graphzone_wrap2">
						<ul>
							<li>
								<div class="graph_wrap2">
									<div class="fl">
										<ul>
											<li>
												<p class="tit">SNS 트레픽</p>
												<p class="fc_3" id="visitor_daily_sns_max">0</p>
											</li>
											<li>
												<p class="tit">NotSNS 트레픽</p>
												<p class="fc_2" id="visitor_daily_normal_max">2541</p>
											</li>
										</ul>
									</div>
									<div class="fr" id="graph_area_visitor_1_b"></div>
								</div>
							</li>
						</ul>
					</div>
				</section><!-- // SNS / 일반 순방문자 -->
				<section class="cs1 mt_1">
					<div class="h3_wrap">
						<h3>모바일 트레픽 / PC 트레픽</h3>
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
					<div class="graphzone_wrap2">
						<ul>
							<li>
								<div class="graph_wrap2">
									<div class="fl">
										<ul>
											<li>
												<p class="tit">모바일 트레픽</p>
												<p class="fc_4" id="visitor_daily_mobile_max">0</p>
											</li>
											<li>
												<p class="tit">PC 트레픽</p>
												<p class="fc_5" id="visitor_daily_pc_max">0</p>
											</li>
										</ul>
									</div>
									<div class="fr" id="graph_area_visitor_1_c"></div>
								</div>
							</li>
						</ul>
					</div>
				</section><!-- // 모바일 / PC 순방문자 -->				
<script type="text/javascript">
<!--
$(document).ready(function(){
	var oStatictis = new com.mad.api.statistics(window._DomainObj, window._DomainCaller);

	// VISITOR Line Chart
	var GetLineChartSetting = function(c) {
		return {
			type : "multiLine",  // line, bar, pie, piePartition, band, radarChart
			width : 770,
			height: 300,
			colors : c ? c : ["#43aea8", "#6e84be", "#60b1cc"],
			styleCalss : 'line',
			showLabels : true,
			margin : {left: 40, top: 20, right: 80, bottom: 30},
			format : d3.time.format("%Y-%m-%d").parse
		};
	};
	var oLineChart_1_A = new com.mad.chart.handler("#graph_area_visitor_1_a", GetLineChartSetting(["#6e84be", "#5eb1d1", "#60b1cc"]));
	var oLineChart_1_B = new com.mad.chart.handler("#graph_area_visitor_1_b", GetLineChartSetting(["#43aea8", "#6e84be", "#60b1cc"]));
	var oLineChart_1_C = new com.mad.chart.handler("#graph_area_visitor_1_c", GetLineChartSetting(["#688217", "#f7941d", "#60b1cc"]));

	window._DomainCaller = function() 
	{
		// 일별데이터 - 전체 분석
		oStatictis.getVisitorDaily(function(r) {	

			// 페이지 Element에 값 적용.			
			oStatictis.bindResult("visitor_daily", r.max, "");
						
			// 각 그래프의 데이터 생성
			if (r.ret.list instanceof Array) {

				var data_1 = [],data_2 = [], data_3 = [];

				for (var i=0; i < r.ret.list.length; i++) {
					var d = r.ret.list[i];
					data_1[data_1.length] = {date:d.reg_date, "Traffic":String(d.pv_click_cnt).nvl('0')};
					data_2[data_2.length] = {date:d.reg_date, "SNS":String(d.sns).nvl('0'), "NotSNS":String(d.normal).nvl('0')};
					data_3[data_3.length] = {date:d.reg_date, "Mobile":String(d.mobile).nvl('0'), "PC":String(d.pc).nvl('0')};
				}
				
				oLineChart_1_A.draw(data_1, {point:{type:'rect', size:8}, xAxis:{ticks:r.ret.list.length, format:"%d"}, yAxis:{ticks:5}});
				oLineChart_1_B.draw(data_2, {point:{type:'rect', size:8}, xAxis:{ticks:r.ret.list.length, format:"%d"}, yAxis:{ticks:5}});
				oLineChart_1_C.draw(data_3, {point:{type:'rect', size:8}, xAxis:{ticks:r.ret.list.length, format:"%d"}, yAxis:{ticks:5}});
			}
			else {
				oLineChart_1_A.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
				oLineChart_1_B.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
				oLineChart_1_C.message(fn_GetHtmlMessage("SYS_EMPTY_DATA"));
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