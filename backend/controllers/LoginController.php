<?php

class LoginController extends BackedController
{
	public $layout = '/layouts/main';


	public function init(){

	}

	public function actionIndex()
	{
		$this->pageTitle = 'FireCms系统';
		$this->renderpartial('index');
	}


	public function actionShowVerify()
	{
		$Adminusers=new Adminusers('login');
		$UserForm = Yii::app()->request->getParam('User');

		if(isset($UserForm)){
			$Adminusers->attributes=$UserForm;
			$MyAdminUserIdentity = new MyAdminUserIdentity($UserForm['username'],$UserForm['password']);
			$MyAdminUserIdentity->authenticate();

			if($Adminusers->validate() && $MyAdminUserIdentity->errorCode==0){
				//保持登陆;
				Yii::app()->Adminuser->login($MyAdminUserIdentity,1800);
				Yii::app()->Adminuser->authTimeout = 1800;

				if(strlen(Yii::app()->request->getParam('bkurl'))>1){
					$this->redirect(Yii::app()->request->getParam('bkurl'));
				}else{
					$this->redirect('/backed/default/index');
				}
			}else{
				$data['errorinfo'] = "用户名或密码错误";
				$this->renderpartial('error',$data);
			}
		}else{
				$data['errorinfo'] = "请输入用户名和密码";
				$this->renderpartial('error',$data);
		}
	}

	public function actionLogout()
	{
		Yii::app()->Adminuser->logout();
		$this->redirect('index');
	}

}
?>
