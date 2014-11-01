<?php

class UsermanageController  extends BackedController
{

    public function actionFrontIndex()
    {
         $data = array();
         $data['userlist'] = Users::model()->findAll();
         $this->renderpartial('frontindex',$data);
    }


    public function actionAddfrontuser()
    {
         $data = array();
        $servicelist    = $this->toArray(Area::model()->findAll());
        $data['servicelist']            = $servicelist;


         $this->renderpartial('addfrontuser',$data);
    }


    public function actionDoAddfrontuser()
    {
        $username = trim($this->getInput('username'));
        $password = trim($this->getInput('password'));
        $email = trim($this->getInput('email'));
        $area_id = intval($this->getInput('area_id'));
        if(!$username || !$password){
           $referer            = HostName_Backed."/Usermanage/frontindex";
            echo $this->statesJSON($this->StateFail,$message='用户名和密码不能为空',$referer);
            exit;
        }
        $Users = Users::model()->find("username = '$username'");
        if($Users){
           $referer            = HostName_Backed."/Usermanage/frontindex";
            echo $this->statesJSON($this->StateFail,$message='此用户名已存在，请更换用户名',$referer);
            exit;
        }
        $Users = new Users;
        $Users->username = $username;
        $Users->password = md5($password);
        $Users->email = $email;
        $Users->area_id = $area_id;
        $Users->addtime = time();
        $Users->save(false);
       $referer            = HostName_Backed."/Usermanage/frontindex";
        echo $this->statesJSON($this->StateSuccess,$message='操作成功',$referer);
    }


    public function actioneditfrontuser()
    {
         $data = array();
         $id = $this->getInput('id');
         $data['userinfo'] = Users::model()->findByPk($id);
        $servicelist    = $this->toArray(Area::model()->findAll());
        $data['servicelist']            = $servicelist;
         $this->renderpartial('editfrontuser',$data);
    }


    public function actionDoEditfrontuser()
    {
        $id = intval($this->getInput('id'));
        $username = trim($this->getInput('username'));
        $password = trim($this->getInput('password'));
        $email = trim($this->getInput('email'));
        $area_id = intval($this->getInput('area_id'));
        if(!$username){
           $referer            = HostName_Backed."/Usermanage/frontindex";
            echo $this->statesJSON($this->StateFail,$message='用户名不能为空',$referer);
            exit;
        }
        $Users = Users::model()->find("username = '$username and id <> $id'");
        if($Users){
           $referer            = HostName_Backed."/Usermanage/frontindex";
            echo $this->statesJSON($this->StateFail,$message='此用户名已存在，请更换用户名',$referer);
            exit;
        }
        $Users = Users::model()->findByPk($id);
        $Users->username = $username;
        if($password) $Users->password = md5($password);
        $Users->email = $email;
        $Users->area_id = $area_id;
        $Users->save(false);
       $referer            = HostName_Backed."/Usermanage/frontindex";
        echo $this->statesJSON($this->StateSuccess,$message='编辑成功',$referer);
    }


    public function actionBackIndex()
    {
         $data = array();
         $data['userlist'] = Adminusers::model()->findAll();
         $this->renderpartial('backindex',$data);
    }



    public function actionAddbackuser()
    {
         $data = array();
        $servicelist    = $this->toArray(Area::model()->findAll());
        $data['servicelist']            = $servicelist;


         $this->renderpartial('addbackuser',$data);
    }


    public function actionDoAddbackuser()
    {
        $username = trim($this->getInput('username'));
        $password = trim($this->getInput('password'));
        $email = trim($this->getInput('email'));
        $area_id = intval($this->getInput('area_id'));
        if(!$username || !$password){
           $referer            = HostName_Backed."/Usermanage/backindex";
            echo $this->statesJSON($this->StateFail,$message='用户名和密码不能为空',$referer);
            exit;
        }
        $adminusers = Adminusers::model()->find("username = '$username'");
        if($adminusers){
           $referer            = HostName_Backed."/Usermanage/backindex";
            echo $this->statesJSON($this->StateFail,$message='此用户名已存在，请更换用户名',$referer);
            exit;
        }
        $adminusers = new Adminusers;
        $adminusers->username = $username;
        $adminusers->password = md5($password);
        $adminusers->email = $email;
        $adminusers->area_id = $area_id;
        $adminusers->addtime = time();
        $adminusers->save(false);
       $referer            = HostName_Backed."/Usermanage/backindex";
        echo $this->statesJSON($this->StateSuccess,$message='操作成功',$referer);
    }



    public function actioneditbackuser()
    {
         $data = array();
         $id = $this->getInput('id');
         $data['userinfo'] = Adminusers::model()->findByPk($id);
        $servicelist    = $this->toArray(Area::model()->findAll());
        $data['servicelist']            = $servicelist;
         $this->renderpartial('editbackuser',$data);
    }


    public function actionDoEditbackuser()
    {
        $id = intval($this->getInput('id'));
        $username = trim($this->getInput('username'));
        $password = trim($this->getInput('password'));
        $email = trim($this->getInput('email'));
        $area_id = intval($this->getInput('area_id'));
        if(!$username){
           $referer            = HostName_Backed."/Usermanage/backindex";
            echo $this->statesJSON($this->StateFail,$message='用户名不能为空',$referer);
            exit;
        }
        $Adminusers = Adminusers::model()->find("username = '$username and id <> $id'");
        if($Adminusers){
           $referer            = HostName_Backed."/Usermanage/backindex";
            echo $this->statesJSON($this->StateFail,$message='此用户名已存在，请更换用户名',$referer);
            exit;
        }
        $Adminusers = Adminusers::model()->findByPk($id);
        $Adminusers->username = $username;
        if($password) $Adminusers->password = md5($password);
        $Adminusers->email = $email;
        $Adminusers->area_id = $area_id;
        $Adminusers->save(false);
       $referer            = HostName_Backed."/Usermanage/backindex";
        echo $this->statesJSON($this->StateSuccess,$message='编辑成功',$referer);
    }
}
