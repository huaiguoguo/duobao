<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title></title>
<link href="<?php echo AdminAsset;?>/css/admin_style.css?v20130702" rel="stylesheet" />
<script>
//全局变量，是Global Variables不是Gay Video喔
var GV = {
    JS_ROOT : "http://phpwind.com/res/js/dev/",                                                                                                 //js目录
    JS_VERSION : "20130702",                                                                                                        //js版本号
    TOKEN : '9543278692a3673f', //token ajax全局
    REGION_CONFIG : {},
    SCHOOL_CONFIG : {},
    URL : {
        LOGIN : '',                                                                                                                 //后台登录地址
        IMAGE_RES: 'http://phpwind.com/res/images',                                                                                                     //图片目录
        REGION : 'http://phpwind.com/index.php?m=misc&c=webData&a=area',                    //地区
        SCHOOL : 'http://phpwind.com/index.php?m=misc&c=webData&a=school'               //学校
    }
};
</script>
<script src="<?php echo AdminAsset;?>/js/dev/wind.js?v20130702"></script>
<script src="<?php echo AdminAsset;?>/js/dev/jquery.js?v20130702"></script>

</head>
<body>
<div class="wrap">
    <div id="error_tips">
        <h2>信息提示</h2>
        <div class="error_cont">
            <ul>
                                <li><?php echo $errorinfo;?></li>
                            </ul>
                        <div class="error_return"><a href="javascript:window.history.go(-1);" class="btn">返回</a></div>
                    </div>
    </div>
</div>
<script src="<?php echo AdminAsset;?>/js/dev/pages/admin/common/common.js?v20130702"></script>
</body>
</html>
