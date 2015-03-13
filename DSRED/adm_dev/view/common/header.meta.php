<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta property="og:image" content="">
<meta property="og:title" content="<?php echo $page_title; ?>">
<meta property="og:url" content="">
<meta property="og:description" content="">
<title><?php echo("$page_title"); ?></title>
<!--[if lt IE 9]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->
<?php 
	PS_Style("default.css");
	PS_Style("jquery.bxslider.css");
	PS_Style("common.css");

	if (startWith($page_id, "statistics1") || startWith($page_id, "statistics2") || startWith($page_id, "statistics3") ||
			startWith($page_id, "statistics4") || startWith($page_id, "statistics5") || startWith($page_id, "statistics6")
	) {
		PS_Style("common.chart.css");
	}
?>