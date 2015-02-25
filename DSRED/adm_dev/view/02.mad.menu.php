				<div class="hs2_tracking">
					<dl>
						<dt>
							<span class="tit">My MAD Tracking</span>
							<span class="blt_1">Social</span>
							<span class="blt_2">Event</span>
						</dt>
						<dd>
							<div class="select_wrap w_1">
								<span class="select_label"></span>
								<select id="TrackingDomainID"></select>
							</div>
						</dd>
					</dl>
				</div>
				<nav class="statics">
					<ul>
						<li<?php if (startWith($page_id, "tracking2")) {echo(" class='on'");}?>><a <?php PS_PageLink("tracking2"); ?>>이벤트 트래킹 등록<span></span></a></li>
						<li<?php if (startWith($page_id, "tracking3")) {echo(" class='on'");}?>><a <?php PS_PageLink("tracking3"); ?>>소셜 트래킹 등록<span></span></a></li>
						<li<?php if (startWith($page_id, "tracking1")) {echo(" class='on'");}?>><a <?php PS_PageLink("tracking1"); ?>>나의 트래킹 관리<span></span></a></li>
						<li<?php if (startWith($page_id, "statistics1")) {echo(" class='on'");}?>><a <?php PS_PageLink("statistics1"); ?>>충성 / 관심고객 관리<span></span></a></li>
						<li<?php if (startWith($page_id, "statistics2")) {echo(" class='on'");}?>><a <?php PS_PageLink("statistics2"); ?>>최근  SNS 트래킹 분석<span></span></a></li>
						<li<?php if (startWith($page_id, "statistics3")) {echo(" class='on'");}?>><a <?php PS_PageLink("statistics3"); ?>>최근 SNS 유입분석<span></span></a></li>
						<li<?php if (startWith($page_id, "statistics4")) {echo(" class='on'");}?>><a <?php PS_PageLink("statistics4"); ?>>월별데이터<span></span></a></li>
						<li<?php if (startWith($page_id, "statistics5")) {echo(" class='on'");}?>><a <?php PS_PageLink("statistics5"); ?>>일별데이터<span></span></a></li>
						<li<?php if (startWith($page_id, "statistics6")) {echo(" class='on'");}?>><a <?php PS_PageLink("statistics6"); ?>>시간별데이터<span></span></a></li>
						<li<?php if (startWith($page_id, "statistics7")) {echo(" class='on'");}?>><a <?php PS_PageLink("statistics7"); ?>>SNS 콘텐츠 리스트<span></span></a></li>
						<li<?php if (startWith($page_id, "statistics8")) {echo(" class='on'");}?>><a <?php PS_PageLink("statistics8"); ?>>SNS 공유 리스트<span></span></a></li>
						<li<?php if (startWith($page_id, "statistics9")) {echo(" class='on'");}?>><a <?php PS_PageLink("statistics9"); ?>>SNS 유입자 리스트<span></span></a></li>
					</ul>
				</nav>