<?php $this->renderpartial('/include/header');?><!--加载头部-->
	<div id="home_toptip"></div>
	<h2 class="h_a">系统信息</h2>
	<div class="home_info">
		<ul>
			<li>
				<em>软件版本</em>
				<span>FireCMS v<?php echo Yii::getFireCmsVersion();?> <a href="javascript:alert('欢迎使用FireCMS')" target="_blank">查看最新版本</a></span>
			</li>
			<!--
			<li>
				<em>操作系统</em>
				<span>WINNT</span>
			</li>
			 -->
			<li>
				<em>PHP版本</em>
				<span>5.4.3</span>
			</li>
			<li>
				<em>MYSQL版本</em>
				<span>5.5.24-log</span>
			</li>
			<li>
				<em>服务器端信息</em>
				<span>Apache/2.2.22 (Win32) </span>
			</li>
			<li>
				<em>最大上传限制</em>
				<span>50M</span>
			</li>
			<li>
				<em>最大执行时间</em>
				<span>600 seconds</span>
			</li>
			<li>
				<em>邮件支持模式</em>
				<span>SMTP ( Server: localhost)</span>
			</li>
		</ul>
	</div>
	<h2 class="h_a">开发团队</h2>
	<div class="home_info" id="home_devteam">
		<ul>
			<li>
				<em>最大执行时间</em>
				<span>600 seconds &nbsp;&nbsp;&nbsp; 600 seconds</span>
			</li>
			<li>
				<em>邮件支持模式</em>
				<span>SMTP ( Server: localhost)</span>
			</li>
		</ul>
	</div>
<?php $this->renderpartial('/include/header');?><!--加载尾部-->
