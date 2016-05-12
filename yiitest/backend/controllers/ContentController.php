<?php

namespace backend\controllers;


class ContentController extends \yii\web\Controller
{
    public function actionIndex()
    {
		return $this->render('index');
    }

}
