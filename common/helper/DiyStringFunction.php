<?php
namespace common\helper;


use Yii;
use yii\helpers\BaseJson;

class DiyStringFunction extends BaseJson{
	public static function Test($value='')
	{
		if(!empty($value)) return strlen($value);
	}
}
