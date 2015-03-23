<style type="text/css">
/* debug , by deagonslam */
#pageDebug {background-color:#fff;}
#pageDebug table {border:1px solid #000;width:100%;border-spacing:2px;}
#pageDebug table .title {text-decoration:bold;color:#0000ff;font-size:11pt;padding:5px;}
#pageDebug table {border:1px solid #000;width:100%;border-spacing:0px;}
#pageDebug table th {text-decoration:bold;color:#333333;font-size:9pt;padding:3px;border-bottom:1px solid #999;}
#pageDebug table td {text-decoration:none;color:#333333;font-size:9pt;padding:3px;border-bottom:1px solid #999;}	
</style>
<?php
function _printDebub($title, $obj) {
	echo("<hl style='width:100%;'/>");
	echo("<table>");
	echo("<tr><th clospan='2' class='title'>$title</th></tr>");
	echo("<tr><th style='width:20%;'>Key</th><th style='width:80%;'>Value</th></tr>");
	while (list($key, $value) = each($obj)) {
		echo("<tr><th>$key</th><td>$value</td></tr>");
	}
	echo("</table><br/>");
}
function _printServerVar() {
	_printDebub("Server Variables", $_SERVER);
}
function _printPostVar() {
	_printDebub("HTTP Post Variables", $_POST);
}
function _printGetVar() {
	_printDebub("HTTP Get Variables", $_GET);
}
function _printCookieVar() {
	_printDebub("HTTP Cookie Variables", $_COOKIE);
}
function _printSessionVar() {
	_printDebub("HTTP Session Variables", $_SESSION);
}

echo("<div id='pageDebug'><br/>");
echo date('Y/m/d H:i:s');
_printServerVar();
_printSessionVar();
_printCookieVar();
_printPostVar();
_printGetVar();
echo("</div>");

?>