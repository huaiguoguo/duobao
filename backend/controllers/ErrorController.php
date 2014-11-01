<?php

class ErrorController extends BackedController
{
    public function actionIndex()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->renderpartial('index', $error);
        }
    }
}
