<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login_main">
  <div class="login_logo"><img src="/images//login/logo.png" /></div>
  <div class="login_box">

    <div class="login_box_l">
      <ul>
        <li><input name="username" type="text" class="input" /></li>
        <li><input name="password" type="password" class="input" /></li>
        <li><a href="#" class="fr">忘记密码</a><input name="" type="checkbox" value="" /> 记住我</li>
        <li><input name="" type="submit" value="登录" class="btn" /></li>
        <div class="clear"></div>
      </ul>
    </div>

    <div class="login_box_r">
    <p>还没有拉勾帐号?</p>
    <p><a href="/site/reg" class="blue">立即注册 <img src="/images//login/go.png" /></a></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>使用以下帐号直接登录:</p>
    <div class="clear10"></div>
    <p align="center"><a href="#"><img src="/images//login/sina.png" /></a> &nbsp;&nbsp; <a href="#"><img src="/images//login/qq.png" /></a></p>
    </div>

    <div class="clear"></div>
  </div>
</div>
