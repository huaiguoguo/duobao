<?php $this->renderpartial('/include/header');?><!--加载头部-->
    <div id="home_toptip"></div>

    <div class="home_info">
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <center><h2>马上上线。。。。。。。。。。。。。。。。。。。</h2></center>
    </div>
<center>
<h2>Error <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div></center>
<?php $this->renderpartial('/include/header');?><!--加载尾部-->
