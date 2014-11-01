<?php //$this->beginContent("@app/views/layouts/main.php");?>


<?php //$this->endContent();?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content="" name="Description">
	<link rel="stylesheet" type="text/css" href="/admin/css/bootstrap_min.css?2014-03-07-1" media="all" />
	<link rel="stylesheet" type="text/css" href="/admin/css/bootstrap_responsive_min.css?2014-03-07-1" media="all" />
	<link rel="stylesheet" type="text/css" href="/admin/css/style.css?2014-03-07-1" media="all" />
	<link rel="stylesheet" type="text/css" href="/admin/css/themes.css?2014-03-07-1" media="all" />
	<link rel="stylesheet" type="text/css" href="/admin/css/font-awesome.css?2014-03-07-1" media="all" />
	<link rel="stylesheet" type="text/css" href="/admin/css/todc_bootstrap.css?2014-03-07-1" media="all" />
	<link rel="stylesheet" type="text/css" href="/admin/css/inside.css?2014-03-07-1" media="all" />
	<link rel="stylesheet" type="text/css" href="/admin/css/resource.css?2014-03-07-1" media="all" />
	<script type="text/javascript" src="/admin/js/jQuery.js?2014-03-07-1"></script>
	<script type="text/javascript" src="/admin/js/bootstrap_min.js?2014-03-07-1"></script>
	<script type="text/javascript" src="/admin/js/resource.js?2014-03-07-1"></script>
	<script type="text/javascript" src="/admin/js/inside.js?2014-03-07-1"></script>

	<script type="text/javascript" src="/admin/js/plugins/validation/jquery_form_min.js?2014-03-07-1"></script>
	<script type="text/javascript" src="/admin/js/plugins/validation/jquery_validate_min.js?2014-03-07-1"></script>
	<script type="text/javascript" src="/admin/js/plugins/validation/jquery_validate_methods.js?2014-03-07-1"></script>


	<title><?php if(isset($this->pagetitle)){echo $this->pagetitle;}?></title>
	<link rel="shortcut icon" href="/admin/image/favicon.ico" />
	<!--[if lte IE 9]><script src="/admin/js/watermark.js"></script><![endif]-->
	<!--[if IE 7]><link href="/admin/css/font_awesome_ie7.css" rel="stylesheet" /><![endif]-->
	<script src="http://g.tbcdn.cn/kissy/k/1.3.0/kissy-min.js" charset="utf-8"></script>
	<script src="/admin/js/help.js" charset="utf-8"></script>


	<script src="/admin/js/kindeditor/kindeditor-min.js?v=2014-02-25-10"></script>
	<script src="/admin/js/kindeditor/zh_CN.js?v=2014-02-25-10"></script>
	<script src="/admin/js/kindeditor/kindeditor.config-upfile.js?v=2014-02-25-10"></script>
	<script charset="utf-8" src="/admin/js/kindeditor/prettify.js"></script>
	<link href="/admin/js/kindeditor/default.css?v=2014-02-25-10" rel="stylesheet" />
	<link href="/css/pager.css" rel="stylesheet" />

</head>
<body>
	<style>
		#fallr-button-button1,#fallr-button-button2 {
			cursor:pointer !important;
		}
	</style>
	<div id="main">
		<div class="container-fluid">

			<div class="row-fluid">
				<div class="span12">

<?=$content;?>

				</div>
			</div>
		</div>
	</div>
</body>
</html>




