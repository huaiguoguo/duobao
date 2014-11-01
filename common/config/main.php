<?php


return [
	'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'components' => [
		'db' => require('db.php'),
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
	],
];
