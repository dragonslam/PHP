<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Admin Menu
//
//	Edit history
// 
// ========================================================
//	Date     Editer     Description
// ------------------------------------------------------------------------
//'
?>
<SCRIPT type="text/javascript">
<!--
	$(document).ready(function(){
		if (_Query['view'] && _Query['view'] != "") {
			if (document.getElementById("submenu_"+_Query['view'])) {
				document.getElementById("submenu_"+_Query['view']).click();
			}
		}
	});
//-->
</SCRIPT>
		<div id="sidebar" style="height:700px;">
			<a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard (<?php echo($page_id);?>)</a>
			<ul>
				<li<?php echo(($page_id == "Main") ? " class='active'" : ""); ?>><a href="?view=Main"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>
				
				<li class="submenu"<?php echo(($page_id == "Customer") ? " class='active'" : ""); ?>>
					<a href="#" id="submenu_Customer"><i class="icon icon-th-list"></i> <span>Customer Manager</span> <span class="label">2</span></a>
					<ul>
						<li><a href="?view=Customer&action=1">임차인 관리</a></li>
						<li><a href="?view=Customer&action=2">임대인 관리</a></li>						
					</ul>
				</li>
				
				<li class="submenu"<?php echo(($page_id == "Realestate") ? " class='active'" : ""); ?>>
					<a href="#" id="submenu_Realestate"><i class="icon icon-th-list"></i> <span>Realestate Manager</span> <span class="label">2</span></a>
					<ul>
						<li><a href="?view=Realestate&action=list">매물 관리</a></li>
						<li><a href="?view=Realestate&action=form">메물 등록</a></li>						
					</ul>
				</li>
				
				<li class="submenu"<?php echo(($page_id == "Member") ? " class='active'" : ""); ?>>
					<a href="#" id="submenu_Member"><i class="icon icon-th-list"></i> <span>Member Manager</span> <span class="label">3</span></a>
					<ul>
						<li><a href="?view=Member&action=member">사용자 관리</a></li>
						<li><a href="?view=Member&action=group">사용자 그룹관리</a></li>
						<li><a href="?view=Member&action=auth">사용자 권한관리</a></li>
					</ul>
				</li>
				
				<li class="submenu"<?php echo(($page_id == "System") ? " class='active'" : ""); ?>>
					<a href="#" id="submenu_System"><i class="icon icon-th-list"></i> <span>System Manager</span> <span class="label">4</span></a>
					<ul>
						<li><a href="?view=System&action=address">주소정보 관리</a></li>
						<li><a href="?view=System&action=menu">메뉴정보 관리</a></li>						
						<li><a href="?view=System&action=code">공통코드 관리</a></li>
						<li><a href="?view=System&action=statictics">사용자 접속통계</a></li>
					</ul>
				</li>
			</ul>	
		</div>			