<?php
// 시스템 관련 
$sys_doc_root	= $_SERVER['DOCUMENT_ROOT'];
$sys_doc_path	= $_SERVER['SCRIPT_FILENAME'];

// 사이트 관련
$site_isDebug	= true;
$site_isLogin	= ($_COOKIE['isLogin'] == "") ? false : $_COOKIE['isLogin'];
$site_UID		= ($_COOKIE['usr_num'] == "") ? "" : $_COOKIE['usr_num'];
$site_UMAIL		= ($_COOKIE['user_mail'] == "") ? false : $_COOKIE['user_mail'];
$site_domain	= $_SERVER['SERVER_NAME'];
$site_root		= "/DSRED/adm_dev";
$site_cdn_path	= "/DSRED/adm_dev";
$site_resource	= "/resource";
$site_index		= "index.php";
$site_message	= "";
$site_test_id	= "test";
$site_excel_max_cnt	= "4000";

// 로그인 점검
if ($site_isLogin == true) {
	$site_isLogin = ($site_UID != "" && $site_UMAIL != "");
}

// 페이지 데이터
$page_Data	["main"]		= array("m", false, -100, "01.main.php", "MAD");
$page_Data	["info"]		= array("s", false, -100, "02.mad_1.info.php"		, "MAD?");
$page_Data	["faq"]			= array("s", false, -100, "02.mad_2.faq.php"		, "MAD - Faq");
$page_Data	["com"]			= array("s", false, -100, "02.mad_3.com.php"		, "MAD - Company");
$page_Data	["terms1"]		= array("s", false, -100, "02.mad_4.terms1.php"		, "MAD - 이용약관");
$page_Data	["terms2"]		= array("s", false, -100, "02.mad_5.terms2.php"		, "MAD - 개인정보 취급방침");
$page_Data	["tracking2"]	= array("s", true, 350, "03.mad_2.tracking.php"		, "MAD - Tracking Event");	// 이벤트 트레킹 등록
$page_Data	["tracking3"]	= array("s", true, 402, "03.mad_3.tracking.php"		, "MAD - Tracking Social");	// 소셜 트레킹 등록
$page_Data	["tracking1"]	= array("s", true, 454, "03.mad_1.tracking.php"		, "MAD - Tracking");			// 나의 트레킹 관리
$page_Data	["statistics1"]	= array("s", true, 506, "04.mad_1.statistics.php"	, "MAD - Statistics");		// 충성/관심고객 관리
$page_Data	["statistics2"]	= array("s", true, 558, "04.mad_2.statistics.php"	, "MAD - Statistics");		// 최근 SNS 트레킹 분석
$page_Data	["statistics3"]	= array("s", true, 610, "04.mad_3.statistics.php"	, "MAD - Statistics");		// 최근 SNS 유입 분석
$page_Data	["statistics4"]	= array("s", true, 659, "04.mad_4.statistics.php"	, "MAD - Statistics");		// 월별 데이터 : 전체
$page_Data	["statistics5"]	= array("s", true, 709, "04.mad_5.statistics.php"	, "MAD - Statistics");		// 일별 데이터 : 전체
$page_Data	["statistics6"]	= array("s", true, 761, "04.mad_6.statistics.php"	, "MAD - Statistics");		// 시간별 데이터
$page_Data	["statistics7"]	= array("s", true, 812, "04.mad_7.statistics.php"	, "MAD - Statistics");		// SNS 콘텐츠 리스트 - 최근한달
$page_Data	["statistics8"]	= array("s", true, 863, "04.mad_8.statistics.php"	, "MAD - Statistics");		// SNS 공유 리스트 - 최근한달
$page_Data	["statistics9"]	= array("s", true, 914, "04.mad_9.statistics.php"	, "MAD - Statistics");		// SNS 유입자 리스트 - 최근한달

$page_url		= $_SERVER['REQUEST_URI'];
$page_file		= $_SERVER['SCRIPT_NAME'];
$page_reffer	= $_SERVER['HTTP_REFERER'];
$page_id		= ($_GET['action'] == "") ? "main" : $_GET['action'];
$page_type		= $page_Data[$page_id	][0];
$page_auth		= $page_Data[$page_id	][1];
$page_marker	= $page_Data[$page_id	][2];
$page_name		= $page_Data[$page_id	][3];
$page_title		= $page_Data[$page_id	][4];

$t_domain_type	= ($_GET['t'] == "") ? "" : $_GET['t'];
$t_domain_id	= ($_GET['d'] == "") ? "" : $_GET['d'];

//echo("<br/>$site_root$site_index");
//echo("<br/>$site_root$site_resource");


?>