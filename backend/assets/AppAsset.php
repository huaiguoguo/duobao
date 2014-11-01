<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		"admin/css/index.css?2014-03-07-1",
		"admin/css/bootstrap_min.css?2014-03-07-1",
		"admin/css/bootstrap_responsive_min.css?2014-03-07-1",
		"admin/css/style.css?2014-03-07-1",
		"admin/css/themes.css?2014-03-07-1",
		"admin/css/font-awesome.css?2014-03-07-1",
	];
	public $js = [
		//"admin/js/jQuery.js?2014-03-07-1",
		//"admin/js/application.js?2014-03-07-1",
		//"admin/js/bootstrap_min.js?2014-03-07-1",
		//"admin/js/huishuo.js?v=2014-03-07-1",
	];
	public $depends = [
		//'yii\web\YiiAsset',
		//'yii\bootstrap\BootstrapAsset',
	];
}
