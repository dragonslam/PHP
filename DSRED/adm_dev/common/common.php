<?php
// 시스템 관련 
$sys_doc_root	= $_SERVER['DOCUMENT_ROOT'];
$sys_doc_path	= $_SERVER['SCRIPT_FILENAME'];

// 사이트 관련
$site_isDebug	= true;
$site_isLogin	= ($_COOKIE['isLogin'] == "") ? false : $_COOKIE['isLogin'];
$site_UID		= ($_COOKIE['usr_id'] == "") ? "" : $_COOKIE['usr_id'];
$site_UMAIL		= ($_COOKIE['user_mail'] == "") ? false : $_COOKIE['user_mail'];
$site_domain	= $_SERVER['SERVER_NAME'];
$site_root		= "/DSRED/adm_dev";
$site_cdn_path	= "/DSRED/adm_dev";
$site_resource	= "/resource";
$site_res_path	= $site_root + "/resource";
$site_index		= "index.php";
$site_name		= "대성부동산";
$site_message	= "";
$site_test_id	= "test";
$site_excel_max_cnt	= "4000";

// 로그인 점검
if ($site_isLogin == true) {
	$site_isLogin = ($site_UID != "" && $site_UMAIL != "");
}

// 페이지 데이터
$page_Data["login"]		= array("m", false, "Login/login.php", "로그인");
$page_Data["main"]		= array("m", true, "Main/main.template.php", "업무시스템");

$page_Data["info"]		= array("s", true, "02.mad_1.info.php"	, "MAD?");

$page_url		= $_SERVER['REQUEST_URI'];
$page_file		= $_SERVER['SCRIPT_NAME'];
$page_reffer	= $_SERVER['HTTP_REFERER'];
$page_id		= ($_GET['action'] == "") ? "login" : $_GET['action'];
$page_type		= $page_Data[$page_id][0];
$page_auth		= $page_Data[$page_id][1];
$page_view		= $page_Data[$page_id][2];
$page_title		= $page_Data[$page_id][3];

$t_domain_type	= ($_GET['t'] == "") ? "" : $_GET['t'];
$t_domain_id	= ($_GET['d'] == "") ? "" : $_GET['d'];

//echo("<br/>$site_root$site_index");
//echo("<br/>$site_root$site_resource");

// //////////////////////////////////////////////////////////////////
// Process Info
$processApp		= get_post("processApp");
$processCmd		= get_post("processCmd");
$processSeq		= get_post("processSeq");
$processStatus	= 0;						// 프로세스 처리 상태. 0:유휴, 1:진행중, 2:완료(결과표시).
$processMessage	= "";
$processCallback= get_post("processCallback");
$processGotoUrl	= "?".$_SERVER['QUERY_STRING'];

?>