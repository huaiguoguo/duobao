<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html>

<head>

    <meta charset="UTF-8">
    <base target="mainFrame" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <? //Html::csrfMetaTags() ?>
    <?php $this->head() ?>
    <title><?= Html::encode($this->title) ?></title>
</head>

<script src="/admin/js/jQuery.js?2014-03-07-1"></script>
<script src="/admin/js/application.js?2014-011-01-1"></script>
<script src="/admin/js/bootstrap_min.js?2014-03-07-1"></script></body>

<script type="text/javascript">
    // if (window.top !== window.self) {
    //     document.write = '';
    //     window.top.location.href = window.self.location.href;
    //     setTimeout(function () {
    //         document.body.innerHTML = '';
    //     }, 0);
    // }
</script>
<body>
    <?php $this->beginBody() ?>
    <div id="navigation">
        <div class="container-fluid">
            <div>
                <a href="/wechat/main" target="_self" id="brand" style="background:url();"></a>
                <a href="/wechat/main" target="_self" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
            </div>
            <ul class='main-nav'>
                <li <?php if(Yii::$app->controller->id == 'site'):?> class='active' <?php endif;?>>
                    <a href="/site/index" target="_self">
                        <span>平台管理</span>
                    </a>
                </li>
                  <li <?php if(Yii::$app->controller->id == 'haha'):?> class='active' <?php endif;?>>
                    <a href="/backed/Haha/index" target="_self">
                    <span>订单管理</span>
                    </a>
                </li>


                <li>
                    <a href="javascript:void(0)" data-toggle="dropdown" class='dropdown-toggle' data-hover="dropdown">
                        <span>帮助中心</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)" target="_blank">在线客服</a></li>
                        <li><a href="/webabout/about">关于我们</a></li>
                        <li><a href="/webabout/help">常见问题</a></li>
                    </ul>
                </li>
            </ul>

            <div class="user">
                <ul class="icon-nav">
                    <li>
                        <a href="" target="_blank" title="打开首页"><i class="icon-home"></i></a>
                    </li>
                    <li class='dropdown'>
                        <a href="#" class='dropdown-toggle' data-toggle="dropdown" title="消息" ><i class="icon-envelope"></i>
                            <span class="label label-lightred">4</span>
                        </a>
                    </li>
                    <li class="dropdown sett" >
                        <a href="#" class='dropdown-toggle' data-toggle="dropdown" title="系统设置"><i class="icon-cog"></i></a>
                    </li>
                    <li class='dropdown colo'>
                        <a href="#" class='dropdown-toggle' data-toggle="dropdown" title="选择颜色"><i class="icon-tint"></i></a>
                        <ul class="dropdown-menu pull-right theme-colors">
                            <li class="subtitle">Predefined colors
                            </li>
                            <li>
                                <span class='red'></span>
                                <span class='orange'></span>
                                <span class='green'></span>
                                <span class="brown"></span>
                                <span class="blue"></span>
                                <span class='lime'></span>
                                <span class="teal"></span>
                                <span class="purple"></span>
                                <span class="pink"></span>
                                <span class="magenta"></span>
                                <span class="grey"></span>
                                <span class="darkblue"></span>
                                <span class="lightred"></span>
                                <span class="lightgrey"></span>
                                <span class="satblue"></span>
                                <span class="satgreen"></span>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/login/logout"  target="_self"  title="退出"><i class="icon-signout"></i> 退出</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="content">
        <div id="left">
            <?php  if($this->context->menulist): foreach($this->context->menulist as $key=>$value):?>
            <div class="subnav">
                <div class="subnav-title ">
                                <a href="javascript:void(0)" class='toggle-subnav'><i class="icon-angle-right"></i>
                                        <span><?=$value['menu_name'];?></span>
                                </a>

                </div>
                <ul class="subnav-menu" style="display: none">
                <?php if($value['menuchild']): foreach($value['menuchild'] as $kk=>$val):?>
                    <li class="">
                        <a href="<?=$val['url'];?>" ><?=$val['menu_name'];?></a>
                    </li>
                <?php endforeach;endif;?>

                </ul>

            </div>
             <?php endforeach;endif;?>
        </div>
        <div class="right">
            <div class="main">

            <iframe frameborder="0" id="mainFrame" name="mainFrame" src="/site/webinfo" style="background: url('http://stc.weimob.com/img/loading.gif') center no-repeat"><?=$context;?></iframe>


            </div>
        </div>
    </div>


<?php $this->endBody() ?>
</body>


    <script>
        $(document).ready(function(){
            var authu=false;
            if(authu){
                $("#myauthModal").modal("show");
            }
            // 绑定菜单提示语切换
            $('#menu-handle').click(function(){
                switchMenu(this);
            });
            // 设置皮肤色
            P.skn();
        });

        // 切换菜单提示语
        function switchMenu(obj){
            if('隐藏菜单' == $(obj).attr('title')){
                $(obj).attr('title', '显示菜单');
            }else{
                $(obj).attr('title', '隐藏菜单');
            }
        }
</script>

<script type="text/javascript">P.skn();</script>
<div style="display:none;">
<script type="text/javascript" src="http://stc.weimob.com/src/www/index1/huishuo.js?v=2014-08-28"></script>
</div>

</html>
<?php $this->endPage() ?>

