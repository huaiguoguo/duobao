<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>
<body>
  <?php $this->beginBody() ?>

  <div id="wrap">

    <!-- 头部开始 -->
    <div id="header">

      <div class="topbox">
        <div class="topboxm">
          <div class="logo"><a href="#"><img src="/images/logo.png" /></a></div>
          <div class="nav">
            <ul>
              <li><a href="#" class="hover">首页</a></li>
              <li><a href="#">搜公司</a></li>
              <li><a href="#">搜人才</a></li>
              <li><a href="#">发布职位</a></li>
              <li><a href="#">校园</a></li>
              <li><a href="#">帮助</a></li>
              <div class="clear"></div>
            </ul>
          </div>
          <?php if(!Yii::$app->user->isGuest):?>
          <div class="topr">
            <div class="topr_t"><img src="/images/cc/0.png" class="img" />胡石头</div>
            <div class="topr_m">
              <ul>
                <li><a href="#" class="t1">我的发布职位</a></li>
                <li><a href="#" class="t2">收到简历</a></li>
                <li><a href="#" class="t3">简历更新</a></li>
                <li><a href="#" class="t4">消息中心</a></li>
                <li><a href="#" class="t5">我的收藏</a></li>
                <li><a href="#" class="t6">充推币</a></li>
                <li><a href="#" class="t7">设置</a></li>
                <li class="wei"><a href="#" class="t8">退出</a></li>
              </ul>
            </div>
          </div>
        <?php else:?>
          <div class="toprs">
            <a href="/site/login">登录</a> |
            <a href="/site/reg">注册</a> |
            <a href="#"><img src="/images/tb2.png" /></a>
            <a href="#"><img src="/images/tb3.png" /></a>
          </div>
      <?php endif;?>


          <div class="clear"></div>
        </div>
      </div>

      <div class="tsear">
        <div class="tsearm">
          <form action="" method="get">
            <div class="select"><select id="tclass"><option value="0">城市</option><option value="1">北京</option><option value="2">上海</option></select></div>
            <div class="tinput_box">
              <input name="" type="text" id="keyword" class="input" value="请选输入关键字" onblur="if(this.value==''){this.value='请选输入关键字'}" onfocus="if(this.value=='请选输入关键字'){this.value=''}" />
              <div class="suggestlist" id="suggestlist" style="display: none;">
                <div class="suggestlist_item">
                  <div class="suggestlist_title">技术</div>
                  <ul class="clearfix">
                    <li><a href="#Java.html">Java</a></li>
                    <li><a href="#%E5%89%8D%E7%AB%AF.html">前端</a></li>
                    <li><a href="#PHP.html">PHP</a></li>
                    <li><a href="#Android.html">Android</a></li>
                    <li><a href="#iOS.html">iOS</a></li>
                    <li><a href="#%E6%B5%8B%E8%AF%95.html">测试</a></li>
                    <li><a href="#C%2B%2B.html">C++</a></li>
                    <li><a href="#%E8%BF%90%E7%BB%B4.html">运维</a></li>
                    <li><a href="#%E6%9E%B6%E6%9E%84.html">架构</a></li>
                    <li><a href="#Python.html">Python</a></li>
                    <li><a href="#%E5%A4%A7%E6%95%B0%E6%8D%AE.html">大数据</a></li>
                    <li><a href="#%E7%AE%97%E6%B3%95.html">算法</a></li>
                    <li><a href="#C%23.html">C#</a></li>
                    <li><a href="#%E5%90%8E%E7%AB%AF.html">后端</a></li>
                  </ul>
                </div>
                <div class="suggestlist_item">
                  <div class="suggestlist_title">产品</div>
                  <ul class="clearfix">
                    <li><a href="#%E4%BA%A7%E5%93%81%E7%BB%8F%E7%90%86.html">产品经理</a></li>
                    <li><a href="#%E4%BA%A7%E5%93%81%E5%8A%A9%E7%90%86.html">产品助理</a></li>
                    <li><a href="#%E4%BA%A7%E5%93%81%E4%B8%93%E5%91%98.html">产品专员</a></li>
                    <li><a href="#%E4%BA%A7%E5%93%81%E7%AD%96%E5%88%92.html">产品策划</a></li>
                    <li><a href="#%E4%BA%A7%E5%93%81%E6%80%BB%E7%9B%91.html">产品总监</a></li>
                  </ul>
                </div>
                <div class="suggestlist_item">
                  <div class="suggestlist_title">设计</div>
                  <ul class="clearfix">
                    <li><a href="#UI.html">UI</a></li>
                    <li><a href="#%E8%A7%86%E8%A7%89.html">视觉</a></li>
                    <li><a href="#%E4%BA%A4%E4%BA%92.html">交互</a></li>
                    <li><a href="#UE.html">UE</a></li>
                    <li><a href="#%E8%AE%BE%E8%AE%A1%E5%B8%88.html">设计师</a></li>
                    <li><a href="#%E5%8E%9F%E7%94%BB.html">原画</a></li>
                    <li><a href="#%E8%AE%BE%E8%AE%A1%E6%80%BB%E7%9B%91.html">设计总监</a></li>
                  </ul>
                </div>
                <div class="suggestlist_item">
                  <div class="suggestlist_title">运营</div>
                  <ul class="clearfix">
                    <li><a href="#%E8%BF%90%E8%90%A5.html">运营</a></li>
                    <li><a href="#%E4%B8%BB%E7%BC%96.html">主编</a></li>
                    <li><a href="#%E7%BC%96%E8%BE%91.html">编辑</a></li>
                    <li><a href="#%E7%AD%96%E5%88%92.html">策划</a></li>
                    <li><a href="#%E8%BF%90%E8%90%A5%E6%80%BB%E7%9B%91.html">运营总监</a></li>
                  </ul>
                </div>
                <div class="suggestlist_item">
                  <div class="suggestlist_title">市场</div>
                  <ul class="clearfix">
                    <li><a href="#%E9%94%80%E5%94%AE.html">销售</a></li>
                    <li><a href="#BD.html">BD</a></li>
                    <li><a href="#%E5%95%86%E5%8A%A1.html">商务</a></li>
                    <li><a href="#%E5%B8%82%E5%9C%BA.html">市场</a></li>
                  </ul>
                </div>
                <div class="suggestlist_item">
                  <div class="suggestlist_title">职能</div>
                  <ul class="clearfix">
                    <li><a href="#%E4%BA%BA%E5%8A%9B%E8%B5%84%E6%BA%90.html">人力资源</a></li>
                    <li><a href="#%E8%A1%8C%E6%94%BF.html">行政</a></li>
                    <li><a href="#%E4%BC%9A%E8%AE%A1.html">会计</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="select"><select id="tclass2"><option value="0">薪资</option><option value="1">5000-7000</option><option value="2">7000-10000</option></select></div>
            <input name="" type="submit" value="搜索" class="btn" />
          </form>
        </div>
        <div class="tsearf"><b>热门：</b><a href="#">产品经理</a>|<a href="#">运营</a>|<a href="#">JAVA</a>|<a href="#">PHP</a>|<a href="#">产品经理</a>|<a href="#">运营</a>|<a href="#">JAVA</a>|<a href="#">PHP</a>|<a href="#">产品经理</a>|<a href="#">运营</a>|<a href="#">JAVA</a></div>
      </div>

    </div>

    <!-- 头部结束 -->



    <?= $content ?>



    <!-- 底部开始 -->
    <div id="footer">
      <div class="footbox">
        <div class="footbox_l">
          <div class="flogo"><img src="/images/flogo.png" /></div>
          <div class="fcopy">©2014 上海某某网络技术有限公司  沪ICP备13010955号</div>
        </div>
        <div class="footbox_m"><h2>关于我们</h2><p>某某网，一个接地气的招聘社区，专注于做互联网行业「内推」「直招」类型的招聘。 <a href="#">了解更多 ...</a></p></div>
        <div class="footbox_r"><h2>合作伙伴</h2><p><a href="#">人人都是产品经理</a><a href="#">海丁网</a><a href="#">看准网</a><a href="#">市场部招聘</a><a href="#">微财富理财</a><a href="#">SAE</a><a href="#">第九课堂</a><a href="#">iT桔子</a><a href="#">Android开发网</a><a href="#">pmcaff</a><a href="#">冷笑话</a><br /><a href="#">查看更多</a></p></div>
        <div class="clear"></div>
      </div>
    </div>
    <!-- 底部结束 -->

  </div>


  <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>








