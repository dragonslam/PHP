<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Admin Main Template
//
//	Edit history
// 
// ========================================================
//	Date     Editer     Description
// ------------------------------------------------------------------------
//'
?>
<?php
// Template Common
function _template_print_Contents_Header() {
	global $page_id, $page_title;

	echo("<div id='content-header'><h1>".$page_title."</h1></div>");
	echo("<div id='breadcrumb'>");
	echo("<a href='#' title='Go to Home' class='tip-bottom'><i class='icon-home'></i> Home</a>");
	echo("<a href='#' class='tip-bottom'> ".$page_id."</a>");
	echo("<a href='#' class='current'> ".$page_title."</a></div>");
} 
?>
		<div id="header">
			<h1><a href="./?admin">DAESEUNG MANAGER</a></h1>
		</div>
		<!--div id="search">
			<input type="text" placeholder="Search here..."/><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
		</div-->
		<div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse" onclick='fnCommander("ADMIN_MANAG", "form", "<?php echo $site_UID; ?>", "", false, "", "?admin=15&view=ADMIN_MANAG" );'><a title="내 정보 관리" id="btnAdminProfile"><i class="icon icon-user"></i> <span class="text">Profile</span></a></li>
                <li class="btn btn-inverse"><a title="" id="btnSettings"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
                <li class="btn btn-inverse"><a title="관리자 로그아웃" id="btnLogout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>
		
		<div id="style-switcher">
			<i class="icon-arrow-left icon-white"></i>
			<span>Style:</span>
			<a href="#grey" style="background-color: #555555;border-color: #aaaaaa;"></a>
            <a href="#light-blue" style="background-color: #8399b0;"></a>
			<a href="#blue" style="background-color: #2D2F57;"></a>
			<a href="#red" style="background-color: #673232;"></a>
            <a href="#red-green" style="background-image: url('<?php echo $site_res_path; ?>/bootstrap/img/demo/red-green.png');background-repeat: no-repeat;"></a>
		</div>
		<?php
			@include 'main.menu.php'; 
		?>
		<div id="content">
			<form class="form-horizontal" name="mainForm" id="mainForm" method="post" onsubmit="return false;">
				<input type="hidden" name="processApp" id="processApp" value="<?php echo $processApp; ?>" />
				<input type="hidden" name="processCmd" id="processCmd" value="<?php echo $processCmd; ?>" />
				<input type="hidden" name="processSeq" id="processSeq" value="<?php echo $processSeq; ?>" />
				<input type="hidden" name="processCallback" id="processCallback" value="<?php echo $processCallback; ?>" />

			<?php
				if ($page_id == "Main") {					
					@include "Main/main.dashboard.php";
				}
				else {
					// 각 업무별 템플릿 로딩.
					@include $page_Data[$page_id][2];
				}
			?>				
			</form>		
		</div>