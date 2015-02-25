				<div class="h2_wrap">
					<h2><?php PS_Image("txt_h2_faq.png", "FAQ")?> </h2>
				</div>
				<section class="cs1 mt_1" id="mad_point1">
					<div class="h3_wrap">
						<h3>MAD의 궁금한 점을 모아봤습니다</h3>
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
					<div class="search_wrap">
						<input type="text"> <?php PS_Image("btn_search.png", "search")?>
					</div>
					<div class="tbl_wrap">
						<table class="tbl_faq">
							<caption>FAQ</caption>
							<colgroup>
								<col width="7%">
								<col width="*">
								<col width="10%">
							</colgroup>
							<thead>
								<tr>
									<th scope="row">번호</th>
									<th scope="row">질문 및 답변</th>
									<th scope="row">조회수</th>
								</tr>
							</thead>
							<tbody>
								<tr class="faq_q">
									<td>1</td>
									<td class="txt">질문과 답변 목록은 무엇으로 마크업 해야 하나요?</td>
									<td>123</td>
								</tr>
								<tr class="faq_a">
									<td></td>
									<td class="txt">비 순차 목록, 순차 목록, 정의 목록으로 마크업 할 수 있습니다. 더 나아가 각각의 항목 안에서 '질문'과 '답변'을 무엇으로 마크업할 것 인지에 대하여는 많은 고민이 필요합니다.</td>
									<td></td>
								</tr>
								<tr class="faq_q">
									<td>2</td>
									<td class="txt">질문과 답변 목록은 무엇으로 마크업 해야 하나요?</td>
									<td>123</td>
								</tr>
								<tr class="faq_a">
									<td></td>
									<td class="txt">비 순차 목록, 순차 목록, 정의 목록으로 마크업 할 수 있습니다. 더 나아가 각각의 항목 안에서 '질문'과 '답변'을 무엇으로 마크업할 것 인지에 대하여는 많은 고민이 필요합니다.</td>
									<td></td>
								</tr>
								<tr class="faq_q">
									<td>3</td>
									<td class="txt">질문과 답변 목록은 무엇으로 마크업 해야 하나요?</td>
									<td>123</td>
								</tr>
								<tr class="faq_a">
									<td></td>
									<td class="txt">비 순차 목록, 순차 목록, 정의 목록으로 마크업 할 수 있습니다. 더 나아가 각각의 항목 안에서 '질문'과 '답변'을 무엇으로 마크업할 것 인지에 대하여는 많은 고민이 필요합니다.</td>
									<td></td>
								</tr>
								<!--tr>
									<td colspan="3">해당되는 내용이 없습니다.</td>
								</tr-->
							</tbody>
						</table>
					</div>
					<!--div class="faq_wrap">
						<p class="faq_tit">
							<span>번호</span>
							<span>질문 및 답변</span>
							<span>조회수</span>
						</p>
						<ul class="ulist faq">
							<li>
								<dl>
									<dt>
										<span>10</span>
										<span>질문과 답변 목록은 무엇으로 마크업 해야 하나요?</span>
										<span>123</span>
									</dt>
									<dd>
										<span>비 순차 목록, 순차 목록, 정의 목록으로 마크업 할 수 있습니다. 더 나아가 각각의 항목 안에서 '질문'과 '답변'을 무엇으로 마크업할 것 인지에 대하여는 많은 고민이 필요합니다.</span>
									</dd>
								</dl>
							</li>
							<li>
								<dl>
									<dt>
										<span>9</span>
										<span>질문과 답변 목록은 무엇으로 마크업 해야 하나요?</span>
										<span>123</span>
									</dt>
									<dd>
										<span>비 순차 목록, 순차 목록, 정의 목록으로 마크업 할 수 있습니다. 더 나아가 각각의 항목 안에서 '질문'과 '답변'을 무엇으로 마크업할 것 인지에 대하여는 많은 고민이 필요합니다.</span>
									</dd>
								</dl>
							</li>
						</ul>
					</div-->
				</section>
				<script type="text/javascript">
				<!--
					// FAQ
					function faq() {
						$(".faq_q").bind("click",function() {
							$(".faq_a td").hide();
							$(this).next().find("td").css("display", "table-cell");
						});
						$(".faq_a").bind("click",function() {
							$(".faq_a td").hide();
						});
					}
					$(document).ready(function(){
						faq();
					});
				//-->
				</script>