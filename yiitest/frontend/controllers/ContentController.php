<?php

namespace frontend\controllers;
use Yii;

class ContentController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$db=Yii::$app->db;
		$st=$db->createCommand("select *from content")->queryAll();
        return $this->render('index',[
			'data'=>$st;	
		]);
    }

}
