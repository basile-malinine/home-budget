<?php

namespace app\controllers;

use app\models\Test\Test;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex(): string
    {

        return $this->render('index');

//        $model = new Test();
//        $model->googleTest();
//
//        return 'Ok';
    }
}