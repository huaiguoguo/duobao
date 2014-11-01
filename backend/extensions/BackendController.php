<?php
namespace backend\extensions;
use common\extensions\MyController;
use yii\web\Controller;
/**
 * Site controller
 */
class BackendController extends MyController{

	//public $layout = 'colum1';
	public $menulist = array(
		array(
			'menu_name'=>'系统管理',
			"menuchild"=>array(
				array('menu_name'=>'个人信息','url'=>'/site/webinfo'),
				array('menu_name'=>'分类管理','url'=>'/site/category'),
				array('menu_name'=>'内容管理','url'=>'/site/sitelist'),
				array('menu_name'=>'采集','url'=>'/site/Caiji'),
				),
			),
		array(
			'menu_name'=>'企业管理',
			"menuchild"=>array(
				array('menu_name'=>'企业','url'=>'/position/productlist'),
				),
			),
		array(
			'menu_name'=>'职位管理',
			"menuchild"=>array(
				array('menu_name'=>'分类','url'=>'/position/category'),
				array('menu_name'=>'职位','url'=>'/position/productlist'),
				),
			),
		array(
			'menu_name'=>'简历管理',
			"menuchild"=>array(
				array('menu_name'=>'简历列表','url'=>'/index.php?r=/position/productlist'),
				),
			),
		array(
			'menu_name'=>'订单管理',
			"menuchild"=>array(
				array('menu_name'=>'订单','url'=>'/order/orderlist'),
				),
			),
		);

	public function init()
	{
		parent::init();
		$this->layout = 'colum1';
	}

	public function display($view,$data=[])
	{
		if($view) return $this->renderPartial($view,$data);
		else return "false";
	}

}
