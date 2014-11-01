<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title></title>
<link href="<?php echo AdminAsset;?>/css/admin_style.css?v20130227" rel="stylesheet" />
<link rel="shortcut icon" href="<?php echo AdminAsset;?>/css/pager.css" type="image/x-icon">
<script>
//全局变量，是Global Variables不是Gay Video喔
var GV = {
	JS_ROOT : "<?php echo AdminAsset;?>/js/dev/",//js目录
	JS_VERSION : "20130227",//js版本号
	TOKEN : 'aa48adce03ae64a7',	//token ajax全局
	REGION_CONFIG : {},
	SCHOOL_CONFIG : {},
	URL : {
		LOGIN : '',	//后台登录地址
		IMAGE_RES: '<?php echo AdminAsset;?>/images',//图片目录
		REGION : 'http://phpwind.com/index.php?m=misc&c=webData&a=area',//地区
		SCHOOL : 'http://phpwind.com/index.php?m=misc&c=webData&a=school' //学校
	}
};
</script>
<script src="<?php echo AdminAsset;?>/submenu_config.js"></script>
<script src="<?php echo AdminAsset;?>/js/dev/wind.js?v20130227"></script>
<script src="<?php echo AdminAsset;?>/js/dev/jquery.js?v20130227"></script>
</head>
<body>
<div class="wrap J_check_wrap">
