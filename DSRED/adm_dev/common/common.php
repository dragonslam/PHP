<?php
session_start();

// 시스템 관련 
$sys_doc_root	= $_SERVER['DOCUMENT_ROOT'];
$sys_doc_path	= $_SERVER['SCRIPT_FILENAME'];

// 사이트 관련
$site_isDebug	= true;

//$site_isLogin	= ($_COOKIE['isLogin'] == "") ? false : $_COOKIE['isLogin'];
//$site_UID		= ($_COOKIE['usr_id'] == "") ? "" : $_COOKIE['usr_id'];
//$site_UMAIL		= ($_COOKIE['user_mail'] == "") ? false : $_COOKIE['user_mail'];
$site_isLogin	= ($_SESSION['isLogin'] == "" || $_SESSION['isLogin'] == false) ? false : $_SESSION['isLogin'];
$site_UID		= ($_SESSION['usr_id'] == "") ? "" : $_SESSION['usr_id'];
$site_UNAME		= ($_SESSION['usr_name'] == "") ? "" : $_SESSION['usr_name'];
$site_UMAIL		= ($_SESSION['user_mail'] == "") ? false : $_SESSION['user_mail'];
$site_UGROUP	= ($_SESSION['user_group'] == "") ? false : $_SESSION['user_group'];	// 권한 그룹 번호
$site_UTYPE		= ($_SESSION['user_type'] == "") ? false : $_SESSION['user_type'];		// 0: guest, 1: member, 2: admin

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
$page_Data["Message"]	= array("m", false, "page.message.php"	, "프로세스결과처리");
$page_Data["Empty"]		= array("m", false, "page.empty.php"	, "Empty.!");
$page_Data["Login"]		= array("m", false, "Login/login.php", "로그인");

$page_Data["Main"]		= array("m", true, "main.template.php", "업무시스템");
$page_Data["Member"]	= array("m", true, "Member/_template.php", "사용자관리");
$page_Data["Customer"]	= array("m", true, "Customer/_template.php", "고객관리");
$page_Data["Realestate"]= array("m", true, "Realestate/_template.php", "매물관리");
$page_Data["System"]	= array("m", true, "System/_template.php", "시스템관리");

$page_url		= $_SERVER['REQUEST_URI'];
$page_file		= $_SERVER['SCRIPT_NAME'];
$page_reffer	= $_SERVER['HTTP_REFERER'];
$page_id		= ($_GET['view'] == "") ? "Main" : $_GET['view'];
$page_action	= ($_GET['action'] == "") ? "" : $_GET['action'];
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
$processStatus	= 0;						// 프로세스 처리 상태. 0:수행전, 1:수행완료, 2:결과 처리, 오류 표시
$processMessage	= "";
$processCallback= get_post("processCallback");
$processGotoUrl	= ($_SERVER['QUERY_STRING'] == "") ? "" : "?".$_SERVER['QUERY_STRING'];
$processScript	= "";

?>