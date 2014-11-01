<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login_main">
  <div class="login_logo"><img src="/images/login/logo.png" /></div>
  <div class="login_box">

    <div class="login_box_l">
      <ul>
        <li><a href="#" class="t1">找工作</a><a href="#" class="t2">招人</a></li>
        <li><input name="username" type="text" class="input" /></li>
        <li><input name="password" type="password" class="input" /></li>
        <li><input name="email" type="text" class="input" /></li>
        <li><input name="" type="checkbox" value="" /> 我已阅读并同意<a href="#" class="blue">《拉勾用户协议》</a></li>
        <li><input name="" type="submit" value="注册" class="btn" /></li>
        <div class="clear"></div>
      </ul>
    </div>

    <div class="login_box_r">
    <p>已有拉勾帐号</p>
    <p><a href="/site/login" class="blue">直接登录 <img src="/images/login/go.png" /></a></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>使用以下帐号直接登录:</p>
    <div class="clear10"></div>
    <p align="center"><a href="#"><img src="/images/login/sina.png" /></a> &nbsp;&nbsp; <a href="#"><img src="/images/login/qq.png" /></a></p>
    </div>

    <div class="clear"></div>
  </div>
</div>
